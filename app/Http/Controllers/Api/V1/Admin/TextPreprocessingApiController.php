<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTextPreprocessingRequest;
use App\Http\Requests\UpdateTextPreprocessingRequest;
use App\Http\Resources\Admin\TextPreprocessingResource;
use App\Models\TextPreprocessing;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TextPreprocessingApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('text_preprocessing_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TextPreprocessingResource(TextPreprocessing::all());
    }

    public function store(StoreTextPreprocessingRequest $request)
    {
        $textPreprocessing = TextPreprocessing::create($request->all());

        return (new TextPreprocessingResource($textPreprocessing))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(TextPreprocessing $textPreprocessing)
    {
        abort_if(Gate::denies('text_preprocessing_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TextPreprocessingResource($textPreprocessing);
    }

    public function update(UpdateTextPreprocessingRequest $request, TextPreprocessing $textPreprocessing)
    {
        $textPreprocessing->update($request->all());

        return (new TextPreprocessingResource($textPreprocessing))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(TextPreprocessing $textPreprocessing)
    {
        abort_if(Gate::denies('text_preprocessing_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $textPreprocessing->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
