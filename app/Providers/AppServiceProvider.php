<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Category;
use App\QuestionType;
use App\SchoolYear;
use App\Department;
use App\Course;

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
            'admin.crud.questionnaire-forms.question-form',
            'admin.questionnaire-forms.question-form',
            'admin.questionnaire-forms.fill-in-the-blank-form',
            'template.modal',
            'admin.questionnaire-forms.multiple-choice-form',
            'admin.crud.questionnaire-forms.edit-multiple-choice-question',
            'admin.crud.questionnaire-forms.edit-fill-in-the-blank-question',
            'admin.examinee',
            'admin.courses',
            'admin.crud.edit-courses',
            'admin.crud.edit-examinee',
        ], 
        function($view){
            $view->with('quesiontypes',QuestionType::get());
            $view->with('categories',Category::orderBy('name')->get());
            $view->with('choicesKeys',['A','B','C','D','E']);
            $view->with('activeSchoolYear',SchoolYear::where('is_open', true)->get());
            $view->with('departments',Department::get());
            $view->with('courses',Course::get());
        });
    }
}
