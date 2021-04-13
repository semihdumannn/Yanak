<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BackendController;
use App\Models\Slider;
use App\Repositories\ImageRepository;
use Illuminate\Http\Request;

class SliderController extends BackendController
{
    private $repository;


    /**
     * SliderController constructor.
     * @param $repository ;
     */
    public function __construct(ImageRepository $repo)
    {
        $this->repository = $repo;
    }

    public function index()
    {
        $sliders = Slider::orderBy('order')->with('image')->get();
        return view('backend.sliders.sliders', compact('sliders'));
    }

    public function create()
    {
        return view('backend.sliders.create');
    }

    public function edit(Slider $slider)
    {
        return view('backend.sliders.edit',compact('slider'));
    }

    public function store()
    {
        $slider = Slider::create([
            'name' => \request('name'),
            'order' => \request('order'),
            'status' => \request('status') == 'on' ? 1 : 0
        ]);

        $uploadResult = $this->repository->upload(\request()->file('image',1440,960));

        $insert = [
            'imageable_type' => Slider::class,
            'imageable_id' => $slider->id,
            'path' => $uploadResult['path'] . $uploadResult['name'],
            'features' => json_encode([
                'html' => \request('html'),
                'size' => \request()->file('image')->getSize(),
                'mimeType' => \request()->file('image')->getMimeType(),
                'extension' => \request()->file('image')->getClientOriginalExtension(),
            ])
        ];
        if ($this->repository->create($insert)) {
            session()->flash('result', 'success');
            session()->flash('message', 'İşlem Başarılı');
        } else {
            session()->flash('result', 'error');
            session()->flash('message', 'Hata oluştu');
        }

        return redirect()->route('slider.index');
    }

    public function update(Slider $slider)
    {
        $arr = \request()->toArray();
        $arr = [
            'name' => $arr['name'],
            'order' =>$arr['order'],
            'status' =>isset( $arr['status']) ? 1 : 0
        ];
        $slider->update($arr);
        if (\request()->file('image'))
        {
            if (file_exists($slider->image->path))
                unlink($slider->image->path);
            $result = $this->repository->upload(\request()->file('image'));

            $update = [
                'imageable_type' => Slider::class,
                'imageable_id' => $slider->id,
                'path' => $result['path'] . $result['name'],
                'features' => json_encode([
                    'html' => \request('html'),
                    'size' => \request()->file('image')->getSize(),
                    'mimeType' => \request()->file('image')->getMimeType(),
                    'extension' => \request()->file('image')->getClientOriginalExtension(),
                ])
            ];
            $slider->image()->update($update);
        }

        $this->notification(true);
        return redirect()->route('slider.index');
    }

    public function destroy(Slider $slider)
    {
        if (file_exists(public_path($slider->image->path)))
            unlink($slider->image->path);
        $slider->image()->delete();
        if ($slider->delete())
            $this->notification(true);
       return redirect()->route('slider.index');
    }
}
