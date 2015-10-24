<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class createHeaderFixtureRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'league_id'=>'required',
            'home_team_id'=>'required',
            'away_team_id'=>'required',
            'fixture_date'=>'required'
        ];
    }
}
