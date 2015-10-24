<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Category;
use App\Poll;
use Carbon\Carbon;
use DB;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
       $this->composeNavigation();
       $this->composeFixtures();
       $this->composeLatestFixtures();
       $this->composeCalendar();
       $this->composeStatistics();
       $this->composePolls();
       //$this->composeUser();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    private function composeNavigation()
    {
         view()->composer('partials.nav', function($view){
            $view->with('categoryPosts', Category::all());
        });
    }

    private function composeUser()
    {
         view()->share('user', $auth->user);
    }

    private function composeFixtures()
    {
        

        view()->composer('layout', function($view){

            $fixtures = DB::table('fixtures')
            ->leftJoin('stadiums', 'stadiums.id', '=', 'fixtures.stadium_id')
            ->leftJoin('leagues', 'leagues.id', '=', 'fixtures.league_id')
            ->leftJoin('teams AS team1', 'team1.id', '=', 'fixtures.team_1_id')
            ->leftJoin('teams AS team2', 'team2.id', '=', 'fixtures.team_2_id')
            ->select(
                'stadiums.title AS stadium_title', 
                'leagues.title AS league_title',  
                'fixtures.fixture_date AS fixture_date', 
                'team1.title AS team1_title',
                'team2.title AS team2_title',
                'team1.logo_path AS team1_logo_path',
                'team1.logo_name AS team1_logo_name',
                'team2.logo_path AS team2_logo_path',
                'team2.logo_name AS team2_logo_name',
                'fixtures.team_1_score AS team_1_score', 
                'fixtures.team_2_score AS team_2_score'
            )
            ->where('fixtures.fixture_date', '>=', Carbon::now()->subHours(2))
            ->orderBy('fixtures.fixture_date', 'ASC')
            ->first();

            if($fixtures == NULL){
            $fixtures = DB::table('fixtures')
            ->leftJoin('stadiums', 'stadiums.id', '=', 'fixtures.stadium_id')
            ->leftJoin('leagues', 'leagues.id', '=', 'fixtures.league_id')
            ->leftJoin('teams AS team1', 'team1.id', '=', 'fixtures.team_1_id')
            ->leftJoin('teams AS team2', 'team2.id', '=', 'fixtures.team_2_id')
            ->select(
                'stadiums.title AS stadium_title', 
                'leagues.title AS league_title',  
                'fixtures.fixture_date AS fixture_date', 
                'team1.title AS team1_title',
                'team2.title AS team2_title',
                'team1.logo_path AS team1_logo_path',
                'team1.logo_name AS team1_logo_name',
                'team2.logo_path AS team2_logo_path',
                'team2.logo_name AS team2_logo_name',
                'fixtures.team_1_score AS team_1_score', 
                'fixtures.team_2_score AS team_2_score'
            )
            ->where('fixtures.fixture_date', '<', Carbon::now()->addHours(2))
            ->orderBy('fixtures.fixture_date', 'DESC')
            ->first();  
            }


            $view->with('fixtures', $fixtures);
        });
//return view('layout', 
 //           compact('fixtures', $fixtures));
   
       //view()->share('fixtures', $auth->user);
    }

    private function composeLatestFixtures()
    {
         view()->composer('layout', function($view){

            $latestFixtures = DB::table('fixtures')
            ->leftJoin('stadiums', 'stadiums.id', '=', 'fixtures.stadium_id')
            ->leftJoin('leagues', 'leagues.id', '=', 'fixtures.league_id')
            ->leftJoin('teams AS team1', 'team1.id', '=', 'fixtures.team_1_id')
            ->leftJoin('teams AS team2', 'team2.id', '=', 'fixtures.team_2_id')
            ->select(
                'stadiums.title AS stadium_title', 
                'leagues.title AS league_title',  
                'leagues.logo_path AS league_logo_path',
                'leagues.logo_name AS league_logo_name',
                'fixtures.fixture_date AS fixture_date', 
                'team1.title AS team1_title',
                'team2.title AS team2_title',
                'team1.logo_path AS team1_logo_path',
                'team1.logo_name AS team1_logo_name',
                'team2.logo_path AS team2_logo_path',
                'team2.logo_name AS team2_logo_name',
                'fixtures.team_1_score AS team1_score', 
                'fixtures.team_2_score AS team2_score'
            )
            ->where('fixtures.fixture_date', '<=', Carbon::now())
            ->orderBy('fixtures.fixture_date', 'DESC')
            ->first();

            $view->with('latestFixtures', $latestFixtures);
        });
    }

    private function composeCalendar()
    {
        view()->composer('layout', function($view){

            $calendar_items = DB::table('fixtures')
            ->leftJoin('stadiums', 'stadiums.id', '=', 'fixtures.stadium_id')
            ->leftJoin('leagues', 'leagues.id', '=', 'fixtures.league_id')
            ->leftJoin('teams AS team1', 'team1.id', '=', 'fixtures.team_1_id')
            ->leftJoin('teams AS team2', 'team2.id', '=', 'fixtures.team_2_id')
            ->select(
                'stadiums.title AS stadium_title', 
                'leagues.title AS league_title',  
                'leagues.logo_path AS league_logo_path',
                'leagues.logo_name AS league_logo_name',
                'fixtures.fixture_date AS fixture_date', 
                'team1.title AS team1_title',
                'team2.title AS team2_title',
                'team1.logo_path AS team1_logo_path',
                'team1.logo_name AS team1_logo_name',
                'team2.logo_path AS team2_logo_path',
                'team2.logo_name AS team2_logo_name',
                'fixtures.team_1_score AS team1_score', 
                'fixtures.team_2_score AS team2_score'
            )
            ->where('fixtures.fixture_date', '>=', Carbon::now())
            ->orderBy('fixtures.fixture_date', 'ASC')
            ->skip(0)->take(3)->get();

            $view->with('calendar_items', $calendar_items);
        
        });
    }

    private function composeStatistics()
    {
        view()->composer('layout', function($view){

            $statistics = DB::table('player_statistics')
            ->leftJoin('players', 'players.id', '=', 'player_statistics.player_id')
            ->select(
                'players.name AS player_name', 
                'players.lastname AS player_lastname',  
                'player_statistics.goals AS player_goals',
                'player_statistics.assists AS player_assists'
            )
            ->orderBy('player_statistics.goals', 'DESC')
            ->skip(0)->take(5)->get();

            $view->with('statistics', $statistics);
        });
    }

    private function composePolls()
    {
        view()->composer('layout', function($view){

            $polls = Poll::latest()->skip(0)->take(1)->get();

            $view->with('polls', $polls);
        });
    }
}
