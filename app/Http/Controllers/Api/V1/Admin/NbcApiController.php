<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNbcRequest;
use App\Http\Requests\UpdateNbcRequest;
use App\Http\Resources\Admin\NbcResource;
use App\Models\Nbc;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NbcApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('nbc_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new NbcResource(Nbc::all());
    }

    public function store(StoreNbcRequest $request)
    {
        $nbc = Nbc::create($request->all());

        return (new NbcResource($nbc))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Nbc $nbc)
    {
        abort_if(Gate::denies('nbc_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new NbcResource($nbc);
    }

    public function update(UpdateNbcRequest $request, Nbc $nbc)
    {
        $nbc->update($request->all());

        return (new NbcResource($nbc))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Nbc $nbc)
    {
        abort_if(Gate::denies('nbc_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $nbc->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
