<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Input;

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
            'fighter_a' => 'required|max:75',
            'fighter_b' => 'required|max:75',
            'match_type' => 'required',
            'category_id' => 'required',
            'details_date' => 'required',
            'details_time' => date("Y-m-d") == Input::get('details_date') ? 'passed_current_time|required' : 'required',
            'details_venue' => 'required',
            'broadcast_url' => 'required',
            'ticket_url' => 'required',
            'uploadPhoto' => 'required',
            'uploadVid' => 'required',
        ];
    }

    /**
     * Get the validation rules custom messages that apply to the request.
     *
     * @return array
     */
    public function messages() {
        return [
            'fighter_a.required' => 'Fighter A is required.',
            'fighter_b.required' => 'Fighter B is required.',
            'match_type.required' => 'Match Type is required.',
            'category_id.required' => 'Fight Style is required.',
            'details_date.required' => 'Fight Date is required.',
            'details_time.required' => 'Fight Time is required',
            'details_venue.required' => 'Fight Venue is required.',
            'broadcast_url.required' => 'Broadcasting URL is required.',
            'ticket_url.required' => 'Ticketing URL is required.',
            'uploadPhoto.required' => 'Call Out Image is required.',
            'uploadVid.required' => 'Call Out Video is required.',
        ];
    }
}
