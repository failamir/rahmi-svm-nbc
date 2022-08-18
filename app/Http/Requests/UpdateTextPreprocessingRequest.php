<?php

namespace App\Http\Requests;

use App\Models\TextPreprocessing;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTextPreprocessingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('text_preprocessing_edit');
    }

    public function rules()
    {
        return [
            'tweet' => [
                'string',
                'nullable',
            ],
        ];
    }
}
