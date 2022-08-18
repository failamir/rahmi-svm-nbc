<?php

namespace App\Http\Requests;

use App\Models\Svm;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSvmRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('svm_create');
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
