<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BackendController;
use App\Models\Color;
use App\Models\Option;
use App\Models\Product;
use App\Models\Thick;
use App\Repositories\ImageRepository;
use Illuminate\Http\Request;

class OptionsController extends BackendController
{
    public function index(Product $product)
    {
        $options = $product->options;
        $colors = Color::status(1)->order('asc')->get();
        $thicks = Thick::all();
        return view('backend.products.options', compact('options', 'colors', 'thicks', 'product'));
    }

    public function store()
    {
        $imageRepo = new ImageRepository();
        $arr = \request()->except('file');
        $arr['status'] = isset($arr['status']) ? 1 : 0;
        $option = Option::create($arr);
        if (\request()->hasFile('file')) {
            foreach (\request()->file('file') as $file) {
                $upload = $imageRepo->upload($file);

                $imageRepo->create([
                    'imageable_id' => $option->id,
                    'imageable_type' => Option::class,
                    'path' => $upload['path'] . $upload['name'],
                    'features' => $upload['features']
                ]);
            }
        }
        return redirect()->route('options.index',\request('product_id'));
    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}
