@component('mail::message')
    # {{$order->orderNo}} nolu sipariş alınmıştır.
    # Siparişin detayınız aşağıdaki  gibidir.

    ## Sipariş veren kişi bilgileri

    - **Adı : ** {{$order->name}}
    - **Telefon : ** {{$order->phone}}
    - **E-mail : ** {{$order->email}}
    - **Şirket : ** {{$order->company}}
    - **Adres : ** {{$order->address}}

    |  Ürün Adı      | Renk     | Kalınlık | Miktar  | Ücret  |
    | ---------------|:--------:| :--------| :------:|-------:|
    @foreach($order->items as $oderItem)
        | {{$oderItem->product->name}} / {{$orderItem->product->code}}| {{$orderItem->color->name}}| {{\App\Models\Thick::find($orderItem->thick)->value}} | {{$orderItem->quantity}}| {{ $orderItem->price.' ₺'}} |
    @endforeach
    | | |  | Toplam Tutar  | {{ $order->totalPrice}} ₺ |

    Teşekkürler,<br>
    {{ config('app.name') }}
@endcomponent
