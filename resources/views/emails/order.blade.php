@component('mail::message')
# {{$order->order_no}} nolu siparişiniz alınmıştır.Sizinle en kısa zamanda iletişime geçilecektir. <br>
# Sipariş detayınız aşağıdaki  gibidir. <br>
@component('mail::table')
|  Ürün Adı / Ürün Kodu     | Renk     | Kalınlık | Miktar  | Ücret  |
|:------:        |:-------  |:--------:| :------:|-------:|
@foreach($order->items as $orderItem)
| {{$orderItem->product->title.' '.$orderItem->product->code}}| {{$orderItem->color->name}}| {{\App\Models\Thick::find($orderItem->thick)->value}} | {{$orderItem->quantity}}| {{ $orderItem->price}} ₺ |
@endforeach
@endcomponent

## **Toplam Tutar :**  {{ $order->totalPrice}} ₺ <br><br>

Teşekkürler,<br>
{{ config('app.name') }}
@endcomponent
