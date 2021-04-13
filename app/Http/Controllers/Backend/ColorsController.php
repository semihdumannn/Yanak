<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BackendController;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorsController extends BackendController
{
    private $color;

    /**
     * ColorsController constructor.
     * @param $color
     */
    public function __construct(Color $color)
    {
        $this->color = $color;
    }

    public function index()
    {

        $colors = Color::order('asc')->get();

        return view('backend.colors.colors',compact('colors') );
    }

    public function store()
    {
        if ($this->color->create( $this->convertRequest()))
            $this->notification(true);
        else
            $this->notification(false);

        return redirect()->route('colors.index');
    }

    public function update(Color $color)
    {
        try
        {
            $color->update($this->convertRequest());
            $this->notification(true);
        }catch (\Exception $exception)
        {
            $this->notification(false);
        }
        return redirect()->route('colors.index');
    }

    public function destroy(Color $color)
    {
        try {
            $color->delete();
            $this->notification(true);
        }catch (\Exception $exception){
            $this->notification(false);
        }
        return redirect()->route('colors.index');
    }

    public function convertRequest() :array
    {
        return [
          'name' => \request('name'),
          'hexCode' => \request('hexCode'),
          'order' => \request('order'),
          'status' => \request()->has('status') ? 1 : 0
        ];
    }
}
