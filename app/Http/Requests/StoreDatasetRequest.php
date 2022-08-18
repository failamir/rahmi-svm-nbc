<?php

namespace App\Http\Requests;

use App\Models\Dataset;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDatasetRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('dataset_create');
    }

    public function rules()
    {
        return [
            'tweet' => [
                'string',
                'nullable',
            ],
            'sentimen' => [
                'string',
                'nullable',
            ],
        ];
    }
}
