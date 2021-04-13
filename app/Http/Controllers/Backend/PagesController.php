<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BackendController;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PagesController extends BackendController
{
    public function index()
    {
        $pages = Page::orderBy('order', 'asc')->get();
        return view('backend.pages.pages', compact('pages'));
    }

    public function create()
    {
        return view('backend.pages.create');
    }

    public function edit(Page $page)
    {
        return view('backend.pages.edit', compact('page'));
    }

    public function store()
    {
        $arr = \request()->toArray();
        $arr['link'] = !empty(\request('link')) ? \request('link') : Str::slug(\request('title'));
        $arr['status'] = !empty(\request('status')) ? 1 : 0;
        if (Page::create($arr))
            $this->notification(true);
        else
            $this->notification(false);
        return redirect()->route('pages.index');

    }

    public function update(Page $page)
    {
        $arr = \request()->toArray();
        $arr['link'] = !empty(\request('link')) ? \request('link') : Str::slug(\request('title'));
        $arr['status'] = !empty(\request('status')) ? 1 : 0;
        if ($page->update($arr))
            $this->notification(true);
        else
            $this->notification(false);

        return redirect()->route('pages.index');
    }

    public function destroy(Page $page)
    {
        if( $page->delete())
            $this->notification(true);
        else
            $this->notification(false);
        return redirect()->route('pages.index');
    }
}
