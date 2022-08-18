<?php

namespace App\Http\Requests;

use App\Models\TextPreprocessing;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTextPreprocessingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('text_preprocessing_create');
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
