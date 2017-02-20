<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateCallOutRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'fighter_a' => 'required',
            'fighter_b' => 'required',
            'match_type' => 'required',
            'category_id' => 'required',
            'details_date' => 'required',
            'details_time' => 'required',
            'details_venue' => 'required',
            'broadcast_url' => 'required',
            'ticket_url' => 'required',
            'uploadPhoto' => 'required',
            'uploadVid' => 'required',
        ];
    }
}
