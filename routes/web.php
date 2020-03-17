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

Auth::routes();

Route::prefix('admin')->group(function(){
    Route::get('/auth/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/auth/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
});

Route::group(['middleware' => 'auth:admin'], function(){
    Route::prefix('admin')->group(function(){
        Route::get('/examinee/result/sample', 'ExamineeResultController@index');
        Route::get('/dashboard', 'AdminDashboardController@index')->name('admin.dashboard');

        //Category
        Route::get('/category','CategoryController@index')->name('category');
        Route::post('/post/category','CategoryController@addCategory')->name('add.category');

        Route::get('/category/edit','CategoryController@editCategory')->name('edit.category');
        Route::patch('/category/update/{id}','CategoryController@updateCategory')->name('update.category');
        Route::delete('/category/delete/{id}','CategoryController@deleteCategory')->name('delete.category');

        //Questionnaire
        Route::get('/manage/questionnaire','QuestionnaireController@index')->name('questionnaire');
        //Create Questionnaire
        Route::get('/manage/questionnaire/create/{id}','QuestionnaireController@create')->name('create.questionnaire');
        //Save Questions
        Route::post('/post/question/{type_id}','QuestionnaireController@postQuestion')->name('post.question');
        //Edit Questions
        Route::get('/question/{question}/edit','QuestionnaireController@editQuestion')->name('edit.question');
        Route::patch('/question/update/{id}','QuestionnaireController@updateQuestion')->name('update.question');
        //Delete Questions
        Route::delete('/question/delete/{id}','QuestionnaireController@deleteQuestion')->name('delete.question');

        //QuestionTypes
        Route::get('manage/question-type','QuestionTypeController@index')->name('question-type.index');
        Route::get('manage/question-type/{id}/edit','QuestionTypeController@edit')->name('question-type.edit');
        Route::patch('manage/question-type/{id}','QuestionTypeController@update')->name('question-type.update');

        //Examinee
        Route::get('/manage/examinee','ExamineeController@index')->name('examinee');
        Route::post('/manage/examinee/data','ExamineeController@examineeData')->name('examinee.data');
        Route::post('/post/examinee','ExamineeController@postExaminee')->name('post.examinee');
        Route::get('/examinee/edit','ExamineeController@editExaminee')->name('edit.examinee');
        Route::patch('/examinee/update/{id}','ExamineeController@updateExaminee')->name('update.examinee');
        Route::delete('/examinee/delete/{id}','ExamineeController@deleteExaminee')->name('delete.examinee');
        Route::get('/examinee/profile/{id}','ExamineeController@examineeProfile')->name('examinee.profile');

        Route::resource('manage/colleges','DepartmentsController');
        Route::resource('manage/programs','CoursesController');
        Route::post('/manage/courses/data','CoursesController@coursesData')->name('course.data');

        Route::resource('/settings/school-year','SchoolYearController');
        Route::post('/settings/school-year/close/{school_year}','SchoolYearController@schoolyearClose')->name('schoolyear.close');
        Route::post('/settings/school-year/data','SchoolYearController@schoolyearData')->name('schoolyear.data');

        Route::get('settings/account','Auth\AdminAccountSettingController@editAccount')->name('admin.edit.account');
        Route::post('settings/account/profile/update','Auth\AdminAccountSettingController@updateProfile')->name('admin.update.profile');
        Route::post('settings/account/password/change','Auth\AdminAccountSettingController@changePassword')->name('admin.change.password');
    });
});

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/message/send' , 'SMSController@send');
Route::get('logout', 'Auth\LoginController@logout');

