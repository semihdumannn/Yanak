<?php


namespace App\Repositories;


use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class OrderRepository
{
    public function create(Request $request): Order
    {
        $data = $this->convertToInsertData($request->all());

        $this->validator($data)->validate();

        return $order = Order::create($data);
    }

    public function all()
    {
        return Order::orderBy('updated_at', 'desc')->get()->map(function ($order) {
            return $this->format($order);
        });

    }

    public function format(Order $order)
    {
        return Response::json([
            'order_no' => $order->order_no,
            'name' => $order->name,
            'phone' => $order->phone,
            'email' => $order->email,
            'address' => $order->address,
            'totalPrice' => $order->totalPrice,
            'status' => $order->status,
            'statusText' => $this->statusText($order->status),
            'items' => $order->items()->with('product','color','thick')->get(),
            //'products' => $order->items()->with('images')->get(),
            'created_at' => $order->created_at,
            'updated_at' => $order->updated_at,
        ])->getData();
    }

    public function createItem($id, $data, $products)
    {
        foreach ($products as $key => $product){
            OrderItem::create([
                'product_id' => $product,
                'order_id' => $id,
                'color_id' => $data['color'][$key],
                'thick' => $data['thick'][$key],
                'quantity' => $data['quantity'][$key],
                'price' => Product::findOrFail($product)->price * $data['quantity'][$key]
            ]);
        }
    }

    public function convertToInsertData($request)
    {
        return [
            'order_no' => 'YNKSP-'.date('Y').'-'.time(),
            'name' => $request['name'],
            'phone' => $request['phone'],
            'email' => $request['email'],
            'company' => $request['company'],
            'address' => $request['address'],
            'totalPrice' => $this->sumPrice($request['quantity'], $request['product'])
        ];
    }

    public function statusText($status)
    {
        switch ($status) {
            case 1:
                return  '<span class="bullet bullet-success mr-1"></span> Sipariş Alındı';//'Sipariş Alındı';
                break;
            case 2:
                return  '<span class="bullet bullet-primary mr-1"></span> Kargoya Verildi'; //'Kargoya Verildi';
                break;
            case 3:
                return '<span class="bullet bullet-warning mr-1"></span> Teslim Edildi'; //'Teslim Edildi';
                break;
            case 4:
                return '<span class="bullet bullet-dark mr-1"></span> Stoktan Düşüldü'; //'Stoktan Düşüldü';
                break;
            case -1:
                return '<span class="bullet bullet-danger mr-1"></span> İptal Edildi'; //'İptal Edildi';
                break;
        }
    }

    public function sumPrice($quantities, $products): float
    {
        $total = 0;

        foreach ($products as $key => $product){
            $price = Product::findOrFail($product)->price;
            $total += ($quantities[$key] * $price);
        }
        return floatval($total);
    }

    public function validator($data)
    {

        return Validator::make($data,
            [
                'name' => ['required', 'string', 'max:191'],
                'phone' => ['required', 'alpha_num', 'max:20'],
                'email' => ['nullable', 'email', 'max:191'],
                'address' => ['required', 'string'],
                'totalPrice' => ['required', 'alpha_num']
            ]);
    }
}