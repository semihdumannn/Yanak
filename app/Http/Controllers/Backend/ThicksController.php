<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BackendController;

use App\Models\Thick;
use Illuminate\Http\Request;

class ThicksController extends BackendController
{
    private  $redirect ;

    /**
     * ThicksController constructor.
     * @param $redirect
     */
    public function __construct()
    {
        $this->redirect = redirect()->route('thicks.index');
    }

    public function index()
    {
        $items = Thick::all();
        return view('backend.thicks.thicks',compact('items'));
    }

    public function store()
    {
        $data = \request()->toArray();
        $data['status'] = \request('status') ? 1 : 0;
        if ( Thick::create($data) )
            $this->notification(true);
        else
            $this->notification(false);

        return $this->redirect;

    }

    public function update(Thick $thick)
    {
        $data = \request()->toArray();
        $data['status'] = \request('status') ? 1 : 0;
        if ($thick->update($data) )
            $this->notification(true);
        else
            $this->notification(false);

        return $this->redirect;
    }

    public function destroy(Thick $thick)
    {
        if ($thick->delete())
            $this->notification(true);
        else
            $this->notification(false);
        return $this->redirect;
    }
}
