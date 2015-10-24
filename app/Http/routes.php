<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');

Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::get('/', 'HomeController@home');

Route::get('/dashboard', 'DashboardController@index');

Route::resource('/dashboard/posts', 'PostsController');
Route::post('/posts/getpostcomments/{id}', 'PostsController@getPostsComments');

Route::resource('/dashboard/stadiums', 'StadiumsController');

Route::resource('/dashboard/leagues', 'LeaguesController');
Route::post('/dashboard/leagues/{id}/update', 'LeaguesController@update');
Route::post('/dashboard/leagues/fixtureLeague', 'LeaguesController@fixtureLeague');

Route::resource('/dashboard/seasons', 'SeasonsController');

Route::resource('/dashboard/countries', 'CountriesController');

Route::resource('/dashboard/positions', 'PositionsController');

Route::resource('/dashboard/players', 'PlayersController');

Route::resource('/dashboard/players/statistics', 'PlayerStatisticsController');

Route::resource('/dashboard/teams', 'TeamsController');
Route::post('/dashboard/teams/{id}/update', 'TeamsController@update');

Route::resource('/dashboard/fixtures', 'FixturesController');

Route::post('/dashboard/posts/category/create', 'CategoryController@store');
//Route::post('/dashboard/posts/category/getAllCategories', 'CategoryController@getAllCategories');
Route::post('/dashboard/posts/tag/create', 'TagController@store');

Route::post('/dashboard/posts/create/photos', 'PostsController@store');

Route::resource('/apklausa', 'PollController');
Route::post('/apklausa/rezultatai', 'PollController@results');
Route::post('/apklausa/getresults', 'PollController@getresults');

Route::resource('/comments', 'CommentController');
Route::post('/comments/{post_id}', 'CommentController@store');

Route::get('/irasai/{category}/{slug}', 'PostsController@show');

Route::get('/naujienos/visos', 'PostsController@getAllCategoriesPosts');

Route::get('/kategorija/{slug}', 'PostsController@getCategoriesSlug');

Route::get('/gaires/{slug}', 'TagController@getPostByTagSlug');

Route::get('/cookie-policy', 'HomeController@cookies');

Route::post('/paieska', 'SearchController@store');
Route::post('/paieska-ajax', 'SearchController@ajaxSearch');

Route::get('/forumas', 'ForumController@index');

Route::get('/forumas/iraso-pavadinimas', 'ForumController@getForumPost');
Route::get('/forumas/iraso-pavadinimas/irasas', 'ForumController@getForumPostDetail');

Route::get('/vartotojas/{id}/redaguoti', 'UserController@edit');
Route::post('/vartotojas/redaguoti/{id}', 'UserController@update');


