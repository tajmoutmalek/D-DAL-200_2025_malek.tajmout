<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            'title' => 'required|min:3',
            'start' => 'date_format:Y-m-d H:i:s|before:end',
            'end' => 'date_format:Y-m-d H:i:s|after:start',

        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Fill the Title field',
            'title.min' => 'The title needs at least 03 characters!',
            'start.data_format' => 'Fill the start date with a valid amount!',
            'start.before' => 'The start date/time must be less than the end date!',
            'end.data_format' => 'Fill the end date with a valid amount!',
            'end.after' => 'The start date/time must be more than the start date!',

        ];
    }
}
