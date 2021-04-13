<?php


namespace App\Repositories;


use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProductRepository
{
    private $model;

    /**
     * ProductRepository constructor.
     * @param Product $model
     */
    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return Product::all();
    }

    public function getAllWithOptions()
    {
        return Product::all()->map(function ($product){
           return $this->format($product);
        });
    }

    public function getLink($link)
    {

        $product = Product::where('link', $link)->firstOrFail();

        return $this->format($product);
    }

    public function format(Product $product)
    {
        return Response::json([
            'id' => $product->id,
            'title' => $product->title,
            'link' => $product->link,
            'content' => $product->content,
            'code' => $product->code,
            'price' => $product->price,
            'width' => $product->width,
            'height' => $product->height,
//            'thick' => $product->thick,
//            'stock' => $product->stock,
            'status' => $product->status,
            'options' => $product->options()->with('color','thick','images')->get(),
//            'color' => [
//                'id' => $product->color->id,
//                'name' => $product->color->name,
//                'hexCode' => $product->hexCode
//            ],
//            'currency' => [
//                'id' => $product->currency->id,
//                'name' => $product->currency->name,
//                'symbol' => $product->currency->symbol
//            ],
//            'images' => $product->images,
            'created_at' => $product->created_at,
            'updated_at' => $product->updated_at,
        ])->getData();
    }

    public function create(Request $request)
    {
        $data = $this->convertRequest($request);

        $this->validator($data)->validate();

        return Product::create($data);
    }

    public function update(Request $request, Product $product)
    {
        if ($product->title != $request->title and ($product->link == $request->link or empty($request->link))) {
            $request->link = Str::slug($request->title) . '-' . time();
        }
        if ($product->link == $request->link and empty($request->link)) {
            $request->link = $product->link;
        }

        $data = $this->convertRequest($request);

        $this->validator($data)->validate();

        $product->update($data);
    }

    public function convertRequest(Request $request): array
    {
        return [
            'title' => $request->title,
            'link' => !empty($request->link) ? $request->link : Str::slug($request->title) . '-' . time(),
            'content' => $request->input('content'),
            'code' => $request->code,
            'price' => $request->price,
//            'currency_id' => $request->currency_id,
//            'color_id' => $request->color_id,
            'width' => $request->width,
            'height' => $request->height,
//            'thick' => $request->thick,
//            'stock' => $request->stock,
            'status' => $request->has('status') ? 1 : 0
        ];

    }

    public function validator(array $data)
    {
        return Validator::make($data, [
            'title' => ['required', 'string', 'max:191'],
            'link' => ['required', 'string', 'max:191'],
            'code' => ['required', 'string', 'max:191'],
            'price' => ['required'],
//            'width' => ['integer'],
//            'height' => ['integer'],
//            'thick' => ['integer'],
//            'stock' => ['required']
        ]);
    }


}