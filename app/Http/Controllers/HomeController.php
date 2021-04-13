<?php

namespace App\Http\Controllers;

use App\Events\OrderShippedEvent;
use App\Events\SendContactMailEvent;
use App\Models\Color;
use App\Models\ContactForm;
use App\Models\Page;
use App\Models\Product;
use App\Models\Slider;
use App\Models\Thick;
use App\Repositories\OrderRepository;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index()
    {

        $sliders = Slider::status(1)->orderBy('order', 'asc')->get();
        $products = Product::take(1)->get();
        return view('frontend.index', compact('sliders', 'products'));
    }

    public function comingSoon()
    {
        return view('coming_soon');
    }


    public function contact()
    {
        return view('frontend.contact');
    }

    public function contactForm()
    {
        $response = [];
        try {
            $data = \request()->toArray();//array_merge(\request()->all(), ['type' => \request('type')]);
            $form = ContactForm::create($data);
            if (\request('type') == 1) {
                event(new SendContactMailEvent($form));
            }
            $response = [
                'status' => 1,
                'message' => 'Mesajınız gönderilmiştir.'
            ];
        } catch (\Exception $exception) {
            $response = [
                'status' => 0,
                'message' => $exception->getMessage()
            ];
        }
        $form->update(['status' => $response['status'], 'log' => json_encode($response)]);

        return response($response);

    }

    public function product()
    {

    }

    public function page($link)
    {
        //$product = new Product();
        //$productRepo = new ProductRepository($product);
        try {
            $product = Product::where('link', $link)->get()->first();

            if (!empty($product)) {
                $colors = Color::status(1)->get();
                $imageArray = [];
                foreach ($product->options()->first()->images as $image) {
                    array_push($imageArray, $image->path);
//                    if ($option->images()->count() > 0) {
//                        foreach ($option->images as $image) {
//                            array_push($imageArray[$option->color->id], $image->path);
//                        }
//                    }
                }
                return view('frontend.product', compact('product', 'colors', 'imageArray'));
            }

            $staticPage = Page::where('link', $link)->first();
            switch ($staticPage->link) {
                case  'anasayfa' :
                    return $this->index();
                    break;
//            case 'hakkimizda':
//                return $this->about();
//                break;
                case 'iletisim':
                    return $this->contact();
                    break;
                default:
                    return view('frontend.pages', compact('staticPage'));
            }
        } catch (\Exception $exception) {
            dd($exception);
            abort(404);
        }


    }

    public function order()
    {
        $colors = Color::status(1)->get();
        $thicks = Thick::status(1)->get();
        $products = Product::all();
        return view('frontend.order', compact('colors','products','thicks'));
    }

    public function sendOrder()
    {
        $orderRepo = new OrderRepository();

        try {
            $order = $orderRepo->create(\request());

            //$order->products()->attach((int)\request('product'));

            $data = [
                'color' => \request('color'),
                'thick' => \request('thick'),
                'quantity' => \request('quantity')
            ];
           // $product = Product::findOrFail(\request('product'));

            $orderRepo->createItem($order->id, $data, \request('product'));

            event(new OrderShippedEvent($order));

            return response()->json([
                'status' => 1,
                'message' => 'Teşekkürler...Siparişiniz alınmıştır.En kısa zamnda iletişime geçeceğiz'
            ]);

        } catch (\Exception $exception) {

            return response()->json([
                'status' => -1,
                'message' => $exception->getMessage()
            ]);
        }
    }

    public function  test()
    {
       dump(\App\User::find(1)->profile);
    }

}
