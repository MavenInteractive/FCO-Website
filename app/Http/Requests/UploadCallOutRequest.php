<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Input;

class UploadCallOutRequest extends Request
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
            // add checking if photo is string (for base64)
            'photo' => is_string(Input::get('photo')) ? 'string' : 'mimes:jpeg,bmp,png,jpg,PNG' ,
            'video' => 'mimes:mp4,avi,mpeg,flv,webm,'
        ];
    }
}
