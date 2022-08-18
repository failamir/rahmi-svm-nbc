<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyTextPreprocessingRequest;
use App\Http\Requests\StoreTextPreprocessingRequest;
use App\Http\Requests\UpdateTextPreprocessingRequest;
use App\Models\TextPreprocessing;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TextPreprocessingController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('text_preprocessing_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $textPreprocessings = TextPreprocessing::all();

        return view('admin.textPreprocessings.index', compact('textPreprocessings'));
    }

    public function create()
    {
        abort_if(Gate::denies('text_preprocessing_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.textPreprocessings.create');
    }

    public function store(StoreTextPreprocessingRequest $request)
    {
        $textPreprocessing = TextPreprocessing::create($request->all());

        return redirect()->route('admin.text-preprocessings.index');
    }

    public function edit(TextPreprocessing $textPreprocessing)
    {
        abort_if(Gate::denies('text_preprocessing_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.textPreprocessings.edit', compact('textPreprocessing'));
    }

    public function update(UpdateTextPreprocessingRequest $request, TextPreprocessing $textPreprocessing)
    {
        $textPreprocessing->update($request->all());

        return redirect()->route('admin.text-preprocessings.index');
    }

    public function show(TextPreprocessing $textPreprocessing)
    {
        abort_if(Gate::denies('text_preprocessing_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.textPreprocessings.show', compact('textPreprocessing'));
    }

    public function destroy(TextPreprocessing $textPreprocessing)
    {
        abort_if(Gate::denies('text_preprocessing_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $textPreprocessing->delete();

        return back();
    }

    public function massDestroy(MassDestroyTextPreprocessingRequest $request)
    {
        TextPreprocessing::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
