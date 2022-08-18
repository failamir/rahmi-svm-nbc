<?php

namespace App\Http\Requests;

use App\Models\Dataset;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyDatasetRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('dataset_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:datasets,id',
        ];
    }
}
