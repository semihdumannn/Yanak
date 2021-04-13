<?php

namespace App\Providers;

use App\Models\Menu;
use App\Models\Page;
use App\Repositories\CompanyRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\View;
use Laravel\Passport\Passport;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Carbon::setLocale('tr');

        Schema::defaultStringLength(191);
        Passport::routes();

        $repo = new CompanyRepository();
        if (count($repo->all()[0]) > 0)
            config()->set('system', $repo->all()[0]);


        $pages = Page::orderBy('order', 'asc')->where('status', 1)->take(6)->get();

        $footerMenu = Menu::location('footer')->status(1)->orderBy('order','asc')->get();
        $headerMenu = Menu::location('header')->status(1)->orderBy('order','asc')->get();



        View::composer(['particular.footer'], function ($view) use ($footerMenu) {
            $view->with('pages', $footerMenu);
        });
        View::composer(['particular.header'],function ($view) use($headerMenu){
           $view->with('pages',$headerMenu);
        });


//        $connect_web = simplexml_load_file('http://www.tcmb.gov.tr/kurlar/today.xml');
//        $currencyData = [];
//        $currencyData['dolar'] = $connect_web->Currency[0]->BanknoteSelling;
//        $currencyData['euro'] = $connect_web->Currency[3]->BanknoteSelling;
//        $currencyData['sterlin'] = $connect_web->Currency[4]->BanknoteSelling;
//
//        View::composer(['frontend.product'],function ($view) use($currencyData){
//           $view->with('currencyData',$currencyData);
//        });

    }
}
