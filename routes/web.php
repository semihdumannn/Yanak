<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Auth::routes();
Route::get('test','HomeController@test');

// Route Erros
Route::get('/404',function (){
    return view('errors.404');
})->name('404');
//Route::post('/login/validate', 'Auth\LoginController@validate_api');
Route::get('/coming-soon','HomeController@comingSoon')->name('comingSoon');
Route::get('/','HomeController@index')->name('homepage');
Route::get('/iletisim','HomeController@contact')->name('contact');
Route::post('/iletisim','HomeController@contactForm')->name('contactForm');
Route::get('/urun/{product}','HomeController@product')->name('product');
Route::post('/urun/renk','HomeController@productColor')->name('product.color');
Route::get('/siparis','HomeController@order')->name('order');
Route::post('/siparis','HomeController@sendOrder')->name('order.send');



Route::get('/auth/login','AuthenticationController@login')->name('auth-logins');
Route::get('/auth/password-reset','AuthenticationController@forgot_password')->name('auth.password');
Route::get('/auth/password/reset/{token}', 'AuthenticationController@reset_password')->name('auth.reset_password');

Route::post('/login','Auth\LoginController@login')->name('login');
Route::post('/logout','Auth\LoginController@logout')->name('logout');
Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::post('/password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');



Route::prefix('/scms')->middleware('manager','auth')->group(function (){
    
    Route::get('/', 'DashboardController@dashboardAnalytics');

    Route::get('/user/{user}','Backend\UserController@edit')->name('user.edit');
    Route::put('/user/{user}','Backend\UserController@update')->name('user.update');
    Route::get('/settings','Backend\SettingsController@index')->name('settings.index');
    Route::post('/settings','Backend\SettingsController@update')->name('settings.update');
    Route::delete('/image/{image}','BackendController@imageDelete')->name('image.destroy');
    Route::resource('/forms','Backend\FormsController');
    Route::resource('/slider','Backend\SliderController');
    Route::resource('/pages','Backend\PagesController');
    Route::resource('/colors','Backend\ColorsController');
    Route::resource('/currencies','Backend\CurrenciesController');
    Route::resource('/thicks','Backend\ThicksController');
    Route::resource('/products','Backend\ProductsController');
    Route::get('/options/{product}','Backend\OptionsController@index')->name('options.index');
    Route::delete('/options/{option}','Backend\OptionsController@destroy')->name('options.destroy');
    Route::put('/options/{option}','Backend\OptionsController@update')->name('options.update');
    Route::post('/options','Backend\OptionsController@store')->name('options.store');
    Route::post('/image','BackendController@imageUpload')->name('image.store');
    Route::delete('/image/{image}','BackendController@imageDelete')->name('image.destroy');
    Route::resource('/orders','Backend\OrdersController');
    Route::post('/orders/get-row','Backend\OrdersController@getRow')->name('orders.getRow');
    Route::resource('/menus','Backend\MenusController');
    Route::post ('/menus-order','Backend\MenusController@sortItem')->name('menu.sort');
    Route::get('/invoice','BackendController@invoice');
    Route::get('/stocks','Backend\StocksController@index')->name('stocks.index');
    Route::put('/stocks/{option}','Backend\StocksController@update')->name('stocks.update');


// Route Dashboards
    Route::get('dashboard-analytics', 'DashboardController@dashboardAnalytics');
    Route::get('dashboard-ecommerce', 'DashboardController@dashboardEcommerce');

// Route Apps
    Route::get('app-email', 'EmailAppController@emailApp');
    Route::get('app-chat', 'ChatAppController@chatApp');
    Route::get('app-todo', 'ToDoAppController@todoApp');
    Route::get('app-calender', 'CalenderAppController@calenderApp');
    Route::get('app-ecommerce-shop', 'EcommerceAppController@ecommerce_shop');
    Route::get('app-ecommerce-details', 'EcommerceAppController@ecommerce_details');
    Route::get('app-ecommerce-wishlist', 'EcommerceAppController@ecommerce_wishlist');
    Route::get('app-ecommerce-checkout', 'EcommerceAppController@ecommerce_checkout');

// Users Pages
    Route::get('app-user-list', 'UserPagesController@user_list');
    Route::get('app-user-view', 'UserPagesController@user_view');
    Route::get('app-user-edit', 'UserPagesController@user_edit');

// Route Data List
    Route::resource('data-list-view','DataListController');
    Route::resource('data-thumb-view', 'DataThumbController');


// Route Content
    Route::get('content-grid', 'ContentController@grid');
    Route::get('content-typography', 'ContentController@typography');
    Route::get('content-text-utilities', 'ContentController@text_utilities');
    Route::get('content-syntax-highlighter', 'ContentController@syntax_highlighter');
    Route::get('content-helper-classes', 'ContentController@helper_classes');

// Route Color
   // Route::get('colors', 'ContentController@colors');

// Route Icons
    Route::get('icons-feather', 'IconsController@icons_feather');
    Route::get('icons-font-awesome', 'IconsController@icons_font_awesome');

// Route Cards
    Route::get('card-basic', 'CardsController@card_basic');
    Route::get('card-advance', 'CardsController@card_advance');
    Route::get('card-statistics', 'CardsController@card_statistics');
    Route::get('card-analytics', 'CardsController@card_analytics');
    Route::get('card-actions', 'CardsController@card_actions');

// Route Components
    Route::get('component-alert', 'ComponentsController@alert');
    Route::get('component-buttons', 'ComponentsController@buttons');
    Route::get('component-breadcrumbs', 'ComponentsController@breadcrumbs');
    Route::get('component-carousel', 'ComponentsController@carousel');
    Route::get('component-collapse', 'ComponentsController@collapse');
    Route::get('component-dropdowns', 'ComponentsController@dropdowns');
    Route::get('component-list-group', 'ComponentsController@list_group');
    Route::get('component-modals', 'ComponentsController@modals');
    Route::get('component-pagination', 'ComponentsController@pagination');
    Route::get('component-navs', 'ComponentsController@navs');
    Route::get('component-navbar', 'ComponentsController@navbar');
    Route::get('component-tabs', 'ComponentsController@tabs');
    Route::get('component-pills', 'ComponentsController@pills');
    Route::get('component-tooltips', 'ComponentsController@tooltips');
    Route::get('component-popovers', 'ComponentsController@popovers');
    Route::get('component-badges', 'ComponentsController@badges');
    Route::get('component-pill-badges', 'ComponentsController@pill_badges');
    Route::get('component-progress', 'ComponentsController@progress');
    Route::get('component-media-objects', 'ComponentsController@media_objects');
    Route::get('component-spinner', 'ComponentsController@spinner');
    Route::get('component-toast', 'ComponentsController@toast');

// Route Extra Components
    Route::get('ex-component-avatar', 'ExtraComponentsController@avatar');
    Route::get('ex-component-chips', 'ExtraComponentsController@chips');
    Route::get('ex-component-divider', 'ExtraComponentsController@divider');

// Route Forms
    Route::get('form-select', 'FormsController@select');
    Route::get('form-switch', 'FormsController@switch');
    Route::get('form-checkbox', 'FormsController@checkbox');
    Route::get('form-radio', 'FormsController@radio');
    Route::get('form-input', 'FormsController@input');
    Route::get('form-input-groups', 'FormsController@input_groups');
    Route::get('form-number-input', 'FormsController@number_input');
    Route::get('form-textarea', 'FormsController@textarea');
    Route::get('form-date-time-picker', 'FormsController@date_time_picker');
    Route::get('form-layout', 'FormsController@layouts');
    Route::get('form-wizard', 'FormsController@wizard');
    Route::get('form-validation', 'FormsController@validation');

// Route Tables
    Route::get('/table', 'TableController@table');
    Route::get('/table-datatable', 'TableController@datatable');
    Route::get('/table-ag-grid', 'TableController@ag_grid');

// Route Pages
    Route::get('/page-user-profile', 'PagesController@user_profile');
    Route::get('/page-faq', 'PagesController@faq');
    Route::get('/page-knowledge-base', 'PagesController@knowledge_base');
    Route::get('/page-kb-category', 'PagesController@kb_category');
    Route::get('/page-kb-question', 'PagesController@kb_question');
    Route::get('/page-search', 'PagesController@search');
    Route::get('/page-invoice', 'PagesController@invoice');
    Route::get('/page-account-settings', 'PagesController@account_settings');

// Route Authentication Pages
    Route::get('auth-login', 'AuthenticationController@login');
    Route::get('auth-register', 'AuthenticationController@register');
    Route::get('auth-forgot-password', 'AuthenticationController@forgot_password');
    Route::get('auth-reset-password', 'AuthenticationController@reset_password');
    Route::get('auth-lock-screen', 'AuthenticationController@lock_screen');

// Route Miscellaneous Pages
    Route::get('page-coming-soon', 'MiscellaneousController@coming_soon');
    Route::get('error-404', 'MiscellaneousController@error_404');
    Route::get('error-500', 'MiscellaneousController@error_500');
    Route::get('page-not-authorized', 'MiscellaneousController@not_authorized');
    Route::get('page-maintenance', 'MiscellaneousController@maintenance');

// Route Charts & Google Maps
    Route::get('chart-apex', 'ChartsController@apex');
    Route::get('chart-chartjs', 'ChartsController@chartjs');
    Route::get('chart-echarts', 'ChartsController@echarts');
    Route::get('maps-google', 'ChartsController@maps_google');

// Route Extension Components
    Route::get('ext-component-sweet-alerts', 'ExtensionController@sweet_alert');
    Route::get('ext-component-toastr', 'ExtensionController@toastr');
    Route::get('ext-component-noui-slider', 'ExtensionController@noui_slider');
    Route::get('ext-component-file-uploader', 'ExtensionController@file_uploader');
    Route::get('ext-component-quill-editor', 'ExtensionController@quill_editor');
    Route::get('ext-component-drag-drop', 'ExtensionController@drag_drop');
    Route::get('ext-component-tour', 'ExtensionController@tour');
    Route::get('ext-component-clipboard', 'ExtensionController@clipboard');
    Route::get('ext-component-plyr', 'ExtensionController@plyr');
    Route::get('ext-component-context-menu', 'ExtensionController@context_menu');
    Route::get('ext-component-swiper', 'ExtensionController@swiper');
    Route::get('ext-component-i18n', 'ExtensionController@i18n');


});

Route::get('/{link}','HomeController@page')->name('page');







