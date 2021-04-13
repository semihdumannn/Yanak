<div class="row" id="{{time()}}">
    <div class="col-md-3 col-sm-6 col-xs-6">
        <label for="title">Ürün Seç</label>
        <div class="form-label-group position-relative has-icon-left">
            <select name="product[]" class="form-control" id="product_{{time()}}" onchange="updatePrice('{{time()}}');">
                @foreach($products as $product)
                    <option value="{{$product->id}}" data-price="{{$product->price}}">{{$product->code.'-'.$product->title}}</option>
                @endforeach
            </select>

        </div>
    </div>
    <div class="col-md-2 col-sm-6 col-xs-6">
        <label for="link">Renk</label>
        <div class="form-label-group position-relative has-icon-left">
            <select name="color[]" class="form-control" id="color_{{time()}}">
                @foreach($colors as $color)
                    <option value="{{$color->id}}">{{$color->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-2 col-sm-6 col-xs-6">
        <label for="link">Kalınlık</label>
        <div class="form-label-group position-relative has-icon-left">
            <select name="thick[]" class="form-control">
                @foreach($thicks as $thick)
                    <option value="{{$thick->id}}">{{$thick->value}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-2 col-sm-6 col-xs-6">
        <label for="width">Adet ( Rulo )</label>
        <div class="form-label-group position-relative has-icon-left">
            <input type="text" class="form-control" name="quantity[]" id="stock_{{time()}}" value="1" onkeyup="updateTotalPrice('{{time()}}',this.value)" placeholder="Stok">
            <div class="form-control-position">
                <i class="feather icon-tag"></i>
            </div>
        </div>
    </div>
    <div class="col-md-2 col-sm-6 col-xs-6">
        <label for="height">Fiyat</label>
        <div class="form-label-group position-relative has-icon-left">
            <input type="text" class="form-control" name="price[]" id="price_{{time()}}" value="{{$products[0]->price * 1}} ₺"
                   placeholder="Fiyat">
            <div class="form-control-position">
                <i class="feather icon-tag"></i>
            </div>
        </div>
    </div>
    <div class="col-md-1 col-sm-12 col-xs-12">
        <label>Sil</label>
        <div class="form-label-group position-relative has-icon-left">
            <a onclick="removeRow('{{time()}}')" class="btn btn-danger">
                <i class="feather icon-trash-2"></i>
            </a>
        </div>
    </div>


</div>