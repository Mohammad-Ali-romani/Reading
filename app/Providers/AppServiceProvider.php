<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Setting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Composer;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

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
        // this is view composer
        view()->composer(['front.layouts.navbar','front.layouts.sidebar'],function($view){
            $view->with('items',Category::all());
        });
        view()->composer('front.layouts.footer',function($view){
            $view->with('setting',Setting::first());
        });
        // paginator ...
        Paginator::useBootstrap();
        // if blade
        Blade::if('active', function($id,$id_cate) {
            if(isset($id_cate)){

                return $id == $id_cate;
            }else{
                return false;
            }
        });
        Blade::if('checked', function($id,$id_item) {
            return $id == $id_item;
        });
        Blade::if('activeNav',function($title,$item){
            if($title === $item){
                return true;
            }
            return false;
        });
        Blade::if('whatsapp', function ($whatsapp) {
            return $whatsapp != "none";
        });
        Blade::if('facebook', function ($facebook) {
            return $facebook != "none";
        });
        Blade::if('instagram', function ($instagram) {
            return $instagram != "none";
        });
        Blade::if('allSetting',function($whatsapp,$facebook,$instagram){
            return $whatsapp != 'none' || $facebook != 'none' || $instagram != 'none';
        });
    }
}
