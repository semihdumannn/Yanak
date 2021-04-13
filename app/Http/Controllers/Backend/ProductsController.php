<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BackendController;
use App\Models\Color;
use App\Models\Currency;
use App\Models\Image;
use App\Models\Product;
use App\Repositories\ImageRepository;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductsController extends BackendController
{
    private $repo;
    private $imageRepo;

    /**
     * ProductsController constructor.
     * @param $repo
     */
    public function __construct(ProductRepository $repo)
    {
        $this->repo = $repo;
    }

    public function index()
    {
        $products = $this->repo->getAll();
        return view('backend.products.products', compact('products'));
    }

    public function create()
    {
        return view('backend.products.create');
    }

    public function edit(Product $product)
    {
        return view('backend.products.edit', compact('product'));
    }

    public function store()
    {
        try {

            $product = $this->repo->create(\request());

//            if (\request()->has('file')) {
//                foreach (\request()->file('file') as $file) {
//                    $upload = $this->imageRepo->upload($file);
//
//                    $this->imageRepo->create([
//                        'imageable_id' => $product->id,
//                        'imageable_type' => Product::class,
//                        'path' => $upload['path'] . $upload['name'],
//                        'features' => $upload['features']
//                    ]);
//                }
//            }
            $this->notification(true);
        } catch (\Exception $exception) {
            $this->notification(false, $exception->getMessage());
        }
        return redirect()->route('products.index');

    }

    public function update(Product $product)
    {
        try {
             $this->repo->update(\request(),$product);
            $this->notification(true);
        } catch (\Exception $exception) {
            Log::info($exception->getMessage());
            $this->notification(false, $exception->getMessage());
        }
        return redirect()->route('products.index');
    }

    public function destroy(Product $product)
    {
        try {
            $product->delete();
            $this->notification(true);

        }catch (\Exception $exception){
            $this->notification(false,$exception->getMessage());
        }
        return redirect()->route('products.index');

    }

}
