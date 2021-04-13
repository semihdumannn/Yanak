<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BackendController;
use App\Models\Color;
use App\Models\Order;
use App\Models\Thick;
use App\Repositories\OrderRepository;
use App\Repositories\ProductRepository;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class OrdersController extends BackendController
{
    private $repo;
    private $productRepository;

    /**
     * OrderController constructor.
     * @param $repo
     * @param $productRepository
     */
    public function __construct(OrderRepository $repo, ProductRepository $productRepository)
    {

        $this->repo = $repo;
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $orders = $this->repo->all();


        $pageConfigs = [
            'pageHeader' => false,
            'contentLayout' => "content-left-sidebar",
            'bodyClass' => 'email-application',
        ];

        return view('backend.orders.index', compact('orders', 'pageConfigs'));
    }

    public function create()
    {
        $products = $this->productRepository->getAllWithOptions();
        $colors = Color::status(1)->get();
        $thicks = Thick::status(1)->get();
        return view('backend.orders.create', compact('products', 'colors', 'thicks'));
    }

    public function getRow()
    {
        $products = $this->productRepository->getAllWithOptions();
        $colors = Color::status(1)->get();
        $thicks = Thick::status(1)->get();
        return response()->view('backend.orders.orderProductRow', ['products' => $products, 'colors' => $colors, 'thicks' => $thicks])->content();

    }

    public function store()
    {
        //dd(\request()->all());
        $totalPrice = 0;
        foreach (\request()->price as $price)
        {
            $totalPrice+= (float)explode('₺',$price)[0];
        }
        $data = [
            'order_no' => 'YNKSP-' . date('Y') . '-' . time(),
            'name' => request('name'),
            'phone' => request('phone'),
            'email' => request('email'),
            'company' => request('company'),
            'address' => request('address'),
            'totalPrice' => $totalPrice
        ];
        $order = Order::create($data);
        try {
            $this->repo->createItem($order->id,\request()->toArray(),\request('product'));
            $this->notification(true);
        }catch (\Exception $exception)
        {
            dd($exception);
        }

        return redirect()->route('orders.index');
    }
}
