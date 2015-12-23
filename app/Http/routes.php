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
Route::post('/dashboard/stadiums/fixtureStadiums', 'StadiumsController@fixtureStadium');
Route::post('/dashboard/stadiums/teamStadiums', 'StadiumsController@teamStadiums');
Route::get('/dashboard/santiago', 'SantiagoController@edit');
Route::get('/santiago-bernabeu', 'SantiagoController@show');
Route::post('/dashboard/santiago/{id}/redaguoti', 'SantiagoController@update');

Route::resource('/dashboard/leagues', 'LeaguesController');
Route::post('/dashboard/leagues/{id}/update', 'LeaguesController@update');
Route::post('/dashboard/leagues/fixtureLeague', 'LeaguesController@fixtureLeague');

Route::resource('/dashboard/seasons', 'SeasonsController');
Route::post('/dashboard/seasons/{id}/redaguoti', 'SeasonsController@update');


Route::resource('/dashboard/countries', 'CountriesController');
Route::post('/dashboard/countries/{id}/redaguoti', 'CountriesController@update');
Route::post('/dashboard/countries/playerCountry', 'CountriesController@playerCountry');

Route::resource('/dashboard/positions', 'PositionsController');
Route::post('/dashboard/positions/{id}/redaguoti', 'PositionsController@update');

Route::resource('/dashboard/players/statistics', 'PlayerStatisticsController');
Route::post('/dashboard/players/statistics/getPlayerStatisticsBySeason/{id}', 'PlayerStatisticsController@getPlayerStatisticsBySeason');


Route::resource('/dashboard/players', 'PlayersController');
Route::post('/dashboard/seasons/getPlayerBySeason/{id}', 'PlayersController@getPlayerBySeason');
Route::post('/dashboard/seasons/getPlayerBySeason2/{id}', 'PlayersController@getPlayerBySeason2');
Route::post('/dashboard/players/{id}/redaguoti', 'PlayersController@update');

Route::resource('/dashboard/teams', 'TeamsController');
Route::post('/dashboard/teams/{id}/update', 'TeamsController@update');
Route::post('/dashboard/teams/fixtureTeam', 'TeamsController@fixtureTeam');

Route::resource('/dashboard/fixtures', 'FixturesController');
Route::get('/dashboard/latestFixtures', 'FixturesController@latest');
Route::post('/dashboard/fixtures/{id}/redaguoti', 'FixturesController@update');

Route::get('/dashboard/about', 'AboutController@edit');
Route::post('/dashboard/about/{id}/redaguoti', 'AboutController@update');

Route::resource('/dashboard/category', 'CategoryController');
Route::post('/dashboard/posts/category/create', 'CategoryController@ajaxStore');
Route::post('/dashboard/category/{id}/redaguoti', 'CategoryController@update');
//Route::post('/dashboard/posts/category/getAllCategories', 'CategoryController@getAllCategories');
Route::post('/dashboard/posts/tag/create', 'TagController@store');

Route::post('/dashboard/posts/create/photos', 'PostsController@store');

Route::get('/dashboard/donate/editDonateText', 'DonateController@edit');
Route::resource('/dashboard/donate', 'DonateController');
Route::post('/dashboard/donate/{id}/redaguoti', 'DonateController@update');

Route::resource('/apklausa', 'PollController');
Route::post('/apklausa/rezultatai', 'PollController@results');
Route::post('/apklausa/getresults', 'PollController@getresults');

Route::resource('/comments', 'CommentController');
Route::post('/comments/{post_id}', 'CommentController@store');

Route::get('/irasai/{category}/{slug}', 'PostsController@show');

Route::get('/sudetis/{slug}', 'PlayersController@getPlayerBySeason');

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


