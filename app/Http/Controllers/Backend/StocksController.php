<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BackendController;

use App\Models\Option;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class StocksController extends BackendController
{
    private  $productRepo;

    /**
     * StocksController constructor.
     * @param $productRepo
     */
    public function __construct(ProductRepository $productRepo)
    {
        $this->productRepo = $productRepo;
    }

    public function index()
    {
        $products = $this->productRepo->getAllWithOptions();

       return view('backend.stocks.stocks',compact('products'));
    }

    public function update(Option $option)
    {
        if ($option->update(\request()->except('_token','_method')))
            $this->notification(true);
        else
            $this->notification(false);

        return redirect()->route('stocks.index');
    }
}
