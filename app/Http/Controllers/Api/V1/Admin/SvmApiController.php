<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSvmRequest;
use App\Http\Requests\UpdateSvmRequest;
use App\Http\Resources\Admin\SvmResource;
use App\Models\Svm;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SvmApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('svm_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SvmResource(Svm::all());
    }

    public function store(StoreSvmRequest $request)
    {
        $svm = Svm::create($request->all());

        return (new SvmResource($svm))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Svm $svm)
    {
        abort_if(Gate::denies('svm_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SvmResource($svm);
    }

    public function update(UpdateSvmRequest $request, Svm $svm)
    {
        $svm->update($request->all());

        return (new SvmResource($svm))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Svm $svm)
    {
        abort_if(Gate::denies('svm_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $svm->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
