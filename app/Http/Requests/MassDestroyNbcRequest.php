<?php

namespace App\Http\Requests;

use App\Models\Nbc;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyNbcRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('nbc_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:nbcs,id',
        ];
    }
}
