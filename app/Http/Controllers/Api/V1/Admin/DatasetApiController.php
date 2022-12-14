<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDatasetRequest;
use App\Http\Requests\UpdateDatasetRequest;
use App\Http\Resources\Admin\DatasetResource;
use App\Models\Dataset;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DatasetApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('dataset_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DatasetResource(Dataset::all());
    }

    public function store(StoreDatasetRequest $request)
    {
        $dataset = Dataset::create($request->all());

        return (new DatasetResource($dataset))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Dataset $dataset)
    {
        abort_if(Gate::denies('dataset_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DatasetResource($dataset);
    }

    public function update(UpdateDatasetRequest $request, Dataset $dataset)
    {
        $dataset->update($request->all());

        return (new DatasetResource($dataset))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Dataset $dataset)
    {
        abort_if(Gate::denies('dataset_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dataset->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
