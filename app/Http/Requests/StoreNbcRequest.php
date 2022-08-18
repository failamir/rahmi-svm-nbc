<?php

namespace App\Http\Requests;

use App\Models\Nbc;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreNbcRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('nbc_create');
    }

    public function rules()
    {
        return [
            'tweet' => [
                'string',
                'nullable',
            ],
            'prediksi' => [
                'string',
                'nullable',
            ],
            'hasil' => [
                'string',
                'nullable',
            ],
        ];
    }
}
