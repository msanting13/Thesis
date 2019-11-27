<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Category;
use App\ChoiceKey;

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
        Schema::defaultStringLength(191);
        
        //Inject Data on views
        view()->composer([
            'admin.questionnaire-landing',
            'admin.crud.edit-question',
        ], 
        function($view){
            $view->with('categories',Category::orderBy('name')->get());
            $view->with('choicesKeys',['A','B','C','D','E']);
        });
    }
}
