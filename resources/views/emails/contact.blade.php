@component('mail::message')
# İletişim form mesajı içeriği aşağıdaki gibidir.
<br>
@component('mail::table')
| Bilgiler                                   |
| ---------------|:-------------------------:|
| **Adı**            | {{$form->name}}       |
| **E-mail**         | {{$form->email}}      |
| **Mesaj**          | {{$form->message}}    |
| **Gönderim Zamanı**| {{ $form->created_at }}    |
@endcomponent
<br>
Teşekkürler,<br>
{{ config('app.name') }}
@endcomponent
