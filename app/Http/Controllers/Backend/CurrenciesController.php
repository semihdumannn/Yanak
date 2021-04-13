<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BackendController;
use App\Models\Currency;
use Illuminate\Http\Request;

class CurrenciesController extends BackendController
{
    public function index()
    {

        $currencies = Currency::order('asc')->get();

        return view('backend.currency.currencies', compact('currencies'));
    }

    public function store()
    {
        if (Currency::create($this->convertRequest()))
            $this->notification(true);
        else
            $this->notification(false);

        return redirect()->route('currencies.index');
    }

    public function update(Currency $currency)
    {
        try {
            $currency->update($this->convertRequest());
            $this->notification(true);
        } catch (\Exception $exception) {
            $this->notification(false);
        }
        return redirect()->route('currencies.index');
    }

    public function destroy(Currency $currency)
    {
        try {
            $currency->delete();
            $this->notification(true);
        } catch (\Exception $exception) {
            $this->notification(false);
        }
        return redirect()->route('currencies.index');
    }

    public function convertRequest(): array
    {
        return [
            'name' => \request('name'),
            'symbol' => \request('symbol'),
            'order' => \request('order'),
            'status' => \request()->has('status') ? 1 : 0
        ];
    }
}
