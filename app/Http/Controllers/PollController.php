<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\PollResult;
use Auth;
use DB;
use App\Http\Controllers\Controller;

class PollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function results(Request $request)
    {
        $poll_results = new PollResult(array(
             'poll_id' => $request->get('poll_id'),
             'poll_answer_id'  => $request->get('answer_id'),
             'user_id'  => Auth::user()->id
            ));

        $poll_results->save();

        //flash()->success('','Atsakymas priimtas!');

        /*$results = DB::table('poll_answers')
            ->select(array('poll_answers.answer', DB::raw('COUNT(poll_results.id) as answer_count')))
            ->leftJoin('poll_results', 'poll_answers.id', '=','poll_results.poll_answer_id')
            ->where ('poll_answers.poll_id', '=', 2)
            ->groupBy ('poll_answers.id')->get();



        $sum = 0;
        foreach ($results as $result) {
            $sum += $result->answer_count;
        }

        //return response()->json($results);
        return response()->json(array('results'=>$results,'sum'=>$sum));*/
        return $this->getresults();
    }

    public function getresults()
    {
        $user = Auth::user();
        $poll_id = 2;
        $poll = DB::table('polls')->where ('id', '=', $poll_id)->first();

        $poll_results = DB::table('poll_answers')
            ->select(array('poll_answers.id','poll_answers.answer', DB::raw('COUNT(poll_results.id) as answer_count')))
            ->leftJoin('poll_results', 'poll_answers.id', '=','poll_results.poll_answer_id')
            ->where ('poll_answers.poll_id', '=', $poll_id)
            ->groupBy ('poll_answers.id')->get();

        $sum = 0;
        foreach ($poll_results as $result) {
            $sum += $result->answer_count;
        }

        if ($user) {
            $voted_data = DB::table('poll_results')
                ->select(array(DB::raw('COUNT(id) as voted_count')))
                ->where('poll_id', '=', $poll_id)
                ->where('user_id', '=', $user->id)
                ->first();

            if ($voted_data->voted_count > 0) {
                $voted = true;
            }else{
                $voted = false;
            }
            $response = array("answer_sum" => $sum, "voted" => $voted, "poll" => $poll, "poll_results" => $poll_results);
        }else{
            $response = array("answer_sum" => $sum, "voted" => true, "poll" => $poll, "poll_results" => $poll_results);
        }


        return response()->json($response);
    }
}
