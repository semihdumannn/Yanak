<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Option;
use App\Repositories\ImageRepository;
use Illuminate\Http\Request;
use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Party;
use LaravelDaily\Invoices\Classes\InvoiceItem;

class BackendController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function success()
    {
        session()->flash('result', 'success');
        session()->flash('message', 'İşlem Başarılı');
    }

    public function error()
    {
        session()->flash('result', 'error');
        session()->flash('message', 'Hata oluştu');
    }

    public function notification(bool $result = false,$message='')
    {
        if ($result)
        {
            session()->flash('result', 'success');
            session()->flash('message', 'İşlem Başarılı');
        }
        else{
            session()->flash('result', 'error');
            session()->flash('message',!empty($message) ? $message : 'Hata oluştu');
        }
    }

    public function imageDelete(Image $image)
    {
        $imageRepo = new ImageRepository();
        try {
            $imageRepo->destroy($image);
            $this->notification(true);
        }catch (\Exception $exception){
            $this->notification(false,$exception->getMessage());
        }
        return redirect()->back();
    }

    public function imageUpload()
    {

        $imageRepo = new ImageRepository();
        try {
            if (\request()->hasFile('file')) {
                foreach (\request()->file('file') as $file) {
                    $upload = $imageRepo->upload($file);
                    $imageRepo->create([
                        'imageable_id' =>\request('id'),
                        'imageable_type' => Option::class,
                        'path' => $upload['path'] . $upload['name'],
                        'features' => $upload['features']
                    ]);
                }
            }

            $this->notification(true);

        }catch (\Exception $exception){
            $this->notification(false,$exception->getMessage());
        }
        return redirect()->back();
    }

    public function invoice()
    {

        $order = \App\Models\Order::find(1);

        $client = new Party([
            'name'          => config('system.title'),
            'phone'         => config('system.phone'),
            'custom_fields' => [
                'adres'        => config('system.address'),
//                'business id' => '365#GG',
            ],
        ]);
        $customer = new Party([
            'name'          => $order->name,
            'address'       => $order->address,
            'code'          => $order->order_no,
            'custom_fields' => [
                'telefon' => $order->phone,
            ],
        ]);
        $items = [];
        foreach ($order->items as $item){
            array_push( $items,(new InvoiceItem())->title($item->product->code.'-'.$item->product->title)->pricePerUnit(floatval($item->product->price))->subTotalPrice(floatval($item->price) )->quantity($item->quantity));
        }



        $invoice = Invoice::make($order->order_no.' Nolu  Sipariş')
            ->series('BIG')
            ->sequence(667)
            ->serialNumberFormat('{SEQUENCE}/{SERIES}')
            ->seller($client)
            ->buyer($customer)
            ->date($order->created_at)
            ->dateFormat('m/d/Y')
//            ->payUntilDays(14)
            ->currencySymbol('₺')
            ->currencyCode('TR')
            ->currencyFormat('{SYMBOL}{VALUE}')
            ->currencyThousandsSeparator('.')
            ->currencyDecimalPoint(',')
            ->filename($client->name . ' ' . $customer->name)
            ->addItems($items)
            ->logo(public_path('vendor/invoices/sample-logo.png'))
            // You can additionally save generated invoice to configured disk
            ->save('public');

        $link = $invoice->url();
        // Then send email to party with link

        // And return invoice itself to browser or have a different view
        return $invoice->stream();

    }





}
