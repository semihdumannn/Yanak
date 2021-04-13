<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BackendController;
use App\Models\Menu;
use App\Models\Page;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class MenusController extends BackendController
{
    public function index()
    {
        $headers = Menu::status(1)->location('header')->with('page')->orderBy('order', 'asc')->get();
        $footers = Menu::status(1)->location('footer')->orderBy('order', 'asc')->get();
        $pages = Page::status(1)->get();


        return view('backend.menus.menus', compact('headers', 'footers', 'pages'));
    }

    public function store()
    {
        $arr = \request()->toArray();
        $arr['status'] = isset($arr['status']) ? 1 : 0;
        Menu::create($arr);
        $this->notification(true);
        return redirect()->route('menus.index');

    }


    public function destroy(Menu $menu)
    {
        if ($menu->delete() )
            $this->notification(true);
        else
            $this->notification(false);

        return redirect()->route('menus.index');

    }

    public function sortItem(Request $request)
    {

        try {
            $arr = $request->toArray()["data"];
            $location = $arr[0];
            unset($arr[0]);
            foreach ($arr as $key => $value){
                Menu::where('location',$location)->where('id',$key)->update(['order' => $value]);
            }

            return response()->json([
               'status' => 1,
               'message' => 'işlem Başarılı',
            ]);

        }catch (QueryException $exception){
            return response()->json([
               'status' => -1,
               'message' => $exception->getMessage()
            ]);
        }

    }
}
