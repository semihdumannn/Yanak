@extends('layouts.master')

@section('title','Sipariş Ver')

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="text-block">
                        <div class="detail-line"></div>
                        <h5>Sipariş Ver</h5>
                        <h4>Bilgileri doldurarak sipariş veriniz</h4>
                    </div>
                </div>
            </div><!--end of row-->

            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <form class="project-planner"
{{--                          method="POST"--}}
{{--                          action="{{route('order.send')}}"--}}
                          >
                        @csrf
                        <h5>Sipariş Özeti:</h5>
                        <div class="options">
                            <!--<div class="planner-option">
                                <span>Web Development</span>
                                <i class="pe-7s-check"></i>
                                <input class="validate-required" type="checkbox" name="service[]" value="">
                            </div>

                            <div class="planner-option">
                                <span>SEO Management</span>
                                <i class="pe-7s-check"></i>
                                <input type="checkbox" name="service[]" value="">
                            </div>

                            <div class="planner-option">
                                <span>Copywriting</span>
                                <i class="pe-7s-check"></i>
                                <input type="checkbox" name="service[]" value="">
                            </div>-->
                        </div><!--end of selectable options-->

                        <div class="row">
                            <div class="col-12">
                                <table class="table table-responsive">
                                    <thead>
                                    <th>İsim</th>
                                    <th>Renk</th>
                                    <th>Kalınlık</th>
                                    <th>Adet (Rulo)</th>
                                    <th>Ücret</th>
                                    <th></th>
                                    </thead>
                                    <tbody id="rowContent">
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><strong>Toplam :</strong> <span id="total"></span> ₺</td>
                                        <td><a class="btn btn-primary add" onclick="addRow();">Ekle</a></td>
                                    </tr>
                                    </tfoot>

                                </table>
                            </div>
                        </div>

                        <hr>
                        <div class="col-sm-12">

                            <input class="input-standard validate-required" type="text" name="name" placeholder="Ad Soyad"
                                   required>
                            <input class="input-standard validate-required" type="text" name="phone"
                                   placeholder="Telefon Numaranız" required>
                            <br>
                            <input class="input-standard"  type="text" name="email"
                                   placeholder="E-mail Adresiniz">
                            <input class="input-standard"  type="text" name="company"
                                   placeholder="Şirket Adınız">
                            <textarea class="input-standard validate-required" name="address" id="address" cols="4"
                                      rows="4" placeholder="Adresiniz" required></textarea>
                        </div>
                        <hr>
                        <div class="col-sm-12 text-center">
{{--                            <input type="submit" class="btn" value="Gönder">--}}
                            <a onclick="formPost()" class="btn">Gönder</a>
                        </div>

                    </form>
                </div>
            </div><!--end of row-->

        </div><!--end of container-->
    </section>
@stop


@section('page-script')
    <script !src="">
        const order = JSON.parse(localStorage.getItem('order'));
        const colors = JSON.parse(JSON.stringify(@json($colors)));
        const thicks = JSON.parse(JSON.stringify(@json($thicks)));
        const products = JSON.parse(JSON.stringify(@json($products)));

        const price = order.price;

        function convert(colors,color){
            let html ='';
            Object.keys(colors).forEach(function (item) {
                html += '<option value="'+colors[item].id+'"';
                colors[item].name === color ? html+='selected' : null;
                html+=' >'+colors[item].name+'</option>';
            });


            return html;
        }

        function addPRoductOption(products) {
           let html ='';
            Object.keys(products).forEach(function (item) {
                html += '<option value="'+products[item].id+'"';
                html+=' >'+products[item].title+'</option>';
            });
            return html;

        }

        function addThicks(thicks,thick) {
            let html ='';
            Object.keys(thicks).forEach(function (item) {
                html += '<option value="'+thicks[item].id+'"';
                thicks[item].value === thick ? html+='selected' : null;
                html+=' >'+thicks[item].value+'</option>';
            });
            return html;
        }

        function filter(e,id) {
            const colorOptions = $('.color option');
            if(e.value == 4)
            {
                console.log(id);
               $('#price_'+id).html(products[1].price+' ₺');
               // $('#quantity_'+id).data('price',products[1].price);
               document.getElementById('quantity_'+id).dataset.price = products[1].price;

               $.each(colorOptions,function (index,item) {
                   if (item.value != 6 && item.value != 7){
                       $(item).hide();
                   }
                   else {
                       $(item).attr('selected',true);
                   }
               });

                changeTotal($('#quantity_'+id).val(),id,products[1].price);

            } else{

                $('#price_'+id).html(order.price+' ₺');
                document.getElementById('quantity_'+id).dataset.price = order.price;
                console.log($('#quantity_'+id).data('price'));
               $.each(colorOptions,function (index,item) {
                    if (item.value == 6 || item.value == 7){
                        $(item).hide();
                    }else{
                        $(item).show();
                        $(item).attr('selected',true);
                    }
               });
                changeTotal($('#quantity_'+id).val(),id,order.price);
            }
            $('#prdocut_'+id).val(e.value);
        }
        // <input class="input-standard" style="width: 100% !important;" type="text" name="title" value="${order.title}" disabled>
        function addRow() {

            const id = new Date().getTime();
            $('#rowContent').append(`
                    <tr id="${id}">
                        <td>
                            <select class="form-control" name="product[]" id="selectProduct" onchange="filter(this,${id});">
                                ${addPRoductOption(products)}
                            </select>
                        </td>
                        <td>
                            <select class="form-control color" name="color[]">
                             ${convert(colors,order.color)}
                            </select>
                        </td>
                        <td>
                           <select name="thick[]" class="form-control">
                              ${addThicks(thicks,0)}
                            </select>
                        </td>
                        <td>
                            <input class="input-standard quantity"  name="quantity[]"  onkeyup="changeTotal(this.value,${id},this.dataset.price)" data-price="${order.price}"  id="quantity_${id}" type="text" value="1">
                        </td>
                        <td id="price_${id}" class="price">
                           ${order.price} ₺
                        </td>
                        <td>
                            <a class="btn btn-primary" onclick="removeRow(${id})">Sil</a>
                        </td>
                    </tr>
            `);
            let total = parseFloat($('#total').html(),2);
            total = parseFloat(total,2)+ parseFloat(order.price,2);
            $('#total').html(total);
        }

        function removeRow(id) {
            let price = $('#'+id+' .price').html();
           // console.log(price.split('₺')[0]);
            price = parseFloat(price.split('₺')[0],2);
            let total  =  parseFloat($('#total').html(),2);
            total = total -price;
            $('#total').html(total);
            $('#'+id+'').remove();
        }

        function changeTotal(val,id,price){

            if(!!val)
            {
                // const order = JSON.parse(localStorage.getItem('order'));
                // const price = parseFloat(order.price);
                // const subTotal = parseFloat(price) * parseFloat(val);
                 $('#price_'+id).html(parseFloat(price) * parseFloat(val)+' ₺');

                var selector = document.querySelectorAll('.price');
                const priceArray =  Array.prototype.map.call(selector, function(node) {
                    return node.textContent.split("₺")[0];
                });
                let total = 0;
                priceArray.forEach(function (item) {
                    total = total + parseFloat(item);
                });
                $('#total').html(total);

            }
        }

        function formPost(){
            const thisForm = $('.project-planner');
           const formData =  thisForm.serialize();

           $.ajax({
              headers : {
                'X-CSRF-TOKEN' : window.csrfToken
              },
               type : 'POST',
               url : '/siparis',
               data : formData,
               success: function (response) {


                    if(response.status === 1)
                    {
                        thisForm.append('<div class="form-success" style="display: none;">' + response.message + '</div>');
                        thisForm.find('.form-success').fadeIn(1000);
                        setTimeout(function() {
                            thisForm.find('.form-success').fadeOut(500);
                            //localStorage.removeItem('order');
                            //window.location.href = '/';
                        }, 3000);



                    }else{
                        thisForm.append('<div class="form-error" style="display: none;">' + response.message + '</div>');
                        thisForm.find('.form-error').fadeIn(1000);
                        setTimeout(function() {
                            thisForm.find('.form-error').fadeOut(500);
                        }, 5000);
                    }
               },
               error:function (err) {
                    console.log(err);
               }

           });
        }

        $(window).load(function () {

            const id = new Date().getTime();
            $('#rowContent').append(`
                    <tr id="${id}">
                        <td>
                            <input class="input-standard" style="width: 100% !important;" type="text" name="title" value="${order.title}" disabled>
                        </td>
                        <td>
                            <select class="form-control" name="color[]">
                             ${convert(colors,order.color)}
                            </select>
                        </td>
                        <td>
                           <select name="thick[]" class="form-control">
                              ${addThicks(thicks, order.thick)}
                            </select>
                        </td>
                        <td>
                            <input class="input-standard orderQ"  name="quantity[]" onkeyup="changeTotal(this.value,${id},${order.price})"  type="text" value="${order.quantity}">
                        </td>
                        <td id="price_${id}" class="price">
                           ${ parseFloat(order.price*order.quantity,2)} ₺
                        </td>
                        <input type="hidden" name="product[]" value="${order.id}" id="product_${id}" />
                    </tr>
            `);
            $('#total').html(parseFloat(order.price*order.quantity));
        });
    </script>
@stop