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
Route::get('/my/blog', function () {
   return "hello";
});

Auth::routes();

Route::prefix('admin')->group(function(){
    Route::get('/auth/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/auth/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
});

Route::group(['middleware' => 'auth:admin'], function(){
    Route::prefix('admin')->group(function(){
        Route::get('/dashboard', 'AdminDashboardController@index')->name('admin.dashboard');

        //Category
        Route::get('/category','CategoryController@index')->name('category');
        Route::post('/post/category','CategoryController@addCategory')->name('add.category');

        Route::get('/category/edit','CategoryController@editCategory')->name('edit.category');
        Route::patch('/category/update/{id}','CategoryController@updateCategory')->name('update.category');
        Route::delete('/category/delete/{id}','CategoryController@deleteCategory')->name('delete.category');

        //Questionnaire
        Route::get('/manage/questionnaire','QuestionnaireController@index')->name('questionnaire');
        //Save Questions
        Route::post('/post/question','QuestionnaireController@postQuestion')->name('post.question');
        //Edit Questions
        Route::get('/question/edit','QuestionnaireController@editQuestion')->name('edit.question');
        Route::patch('/question/update/{id}','QuestionnaireController@updateQuestion')->name('update.question');
        //Delete Questions
        Route::delete('/question/delete/{id}','QuestionnaireController@deleteQuestion')->name('delete.question');

        //Examinee
        Route::get('/manage/examinee','ExamineeController@index')->name('examinee');
        Route::post('/manage/examinee/data','ExamineeController@examineeData')->name('examinee.data');
        Route::post('/post/examinee','ExamineeController@postExaminee')->name('post.examinee');
        Route::get('/examinee/edit','ExamineeController@editExaminee')->name('edit.examinee');
        Route::patch('/examinee/update/{id}','ExamineeController@updateExaminee')->name('update.examinee');
        Route::delete('/examinee/delete/{id}','ExamineeController@deleteExaminee')->name('delete.examinee');

        Route::resource('/settings/school-year','SchoolYearController');

        // Send text message
        Route::get('/message/send' , 'SMSController@sendForm');
        Route::post('/message/send' , 'SMSController@send');
    });
});

Route::get('/home', 'HomeController@index')->name('home');
