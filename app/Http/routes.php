<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
 */

Route::get('/', 'HomeController@index');
Route::get('/company_list', 'UserController@company_list');
Route::get('/create_company', 'UserController@create_company_form');
Route::post('/save_company_profile', 'UserController@save_comapnay_profile_data');
Route::get('account_list/{id?}/', 'ChartOfAcController@chart_of_account');


Route::get('app_admin', 'Admin\AdminController@admin_login');
Route::post('admin_login', 'Admin\AdminController@admin_login_query');
Route::get('admin_logout', 'Admin\AdminController@admin_logout');
Route::get('admin_dashboard', 'Admin\AdminController@admin_dashboard');

Route::get('add_standing', 'Admin\SettingsController@add_standing');
Route::post('save_standing', 'Admin\SettingsController@save_standing');
Route::get('standing_list', 'Admin\SettingsController@standing_list');
Route::get('edit_standing/{standingId}', 'Admin\SettingsController@edit_standing');
Route::post('update_standing/{standingId}', 'Admin\SettingsController@update_standing');
Route::get('active_standing/{standingId}', 'Admin\SettingsController@active_standing');
Route::get('inactive_standing/{standingId}', 'Admin\SettingsController@inactive_standing');
Route::get('delete_standing/{standingId}', 'Admin\SettingsController@delete_standing');

Route::get('add_team', 'Admin\SettingsController@add_team');
Route::post('save_team', 'Admin\SettingsController@save_team');
Route::get('team_list', 'Admin\SettingsController@team_list');
Route::post('get_team_list_ajax', 'Admin\SettingsController@get_team_list_ajax');
Route::get('delete_team/{teamId}', 'Admin\SettingsController@delete_team');

Route::get('add_stadium', 'Admin\SettingsController@add_stadium');
Route::post('save_stadium', 'Admin\SettingsController@save_stadium');
Route::get('stadium_list', 'Admin\SettingsController@stadium_list');
Route::post('get_stadium_list_ajax', 'Admin\SettingsController@get_stadium_list_ajax');
Route::get('delete_stadium/{stadiumId}', 'Admin\SettingsController@delete_stadium');

//schedule start
Route::get('add_schedule', 'Admin\ScheduleController@add_schedule');
Route::get('get_team_name_by_standing/{standingId}', 'Admin\ScheduleController@get_team_name_by_standing');
Route::post('save_schedule', 'Admin\ScheduleController@save_schedule');
Route::get('schedule_list/{category}', 'Admin\ScheduleController@schedule_list');
Route::post('get_schedule_list_ajax/{matchType}/{category}', 'Admin\ScheduleController@get_schedule_list_ajax');
Route::post('schedule_list_dashboard/', 'Admin\ScheduleController@schedule_list_dashboard');
Route::post('save_schedule_result_ajax/', 'Admin\ScheduleController@save_schedule_result_ajax');
Route::get('edit_schedule/{catId}/{scheduleId}', 'Admin\ScheduleController@edit_schedule');
Route::post('update_schedule/', 'Admin\ScheduleController@update_schedule');
Route::get('delete_schedule/{catId}/{scheduleId}', 'Admin\ScheduleController@delete_schedule');

//news start
Route::get('add_news', 'Admin\NewsController@add_news');
Route::post('save_news', 'Admin\NewsController@save_news');
Route::get('news_list', 'Admin\NewsController@news_list');
Route::post('news_list_ajax', 'Admin\NewsController@news_list_ajax');
Route::get('delete_news/{newsId}', 'Admin\NewsController@delete_news');