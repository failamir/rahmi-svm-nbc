<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyDatasetRequest;
use App\Http\Requests\StoreDatasetRequest;
use App\Http\Requests\UpdateDatasetRequest;
use App\Models\Dataset;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DatasetController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('dataset_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $datasets = Dataset::all();

        return view('admin.datasets.index', compact('datasets'));
    }

    public function create()
    {
        abort_if(Gate::denies('dataset_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.datasets.create');
    }

    public function store(StoreDatasetRequest $request)
    {
        $dataset = Dataset::create($request->all());

        return redirect()->route('admin.datasets.index');
    }

    public function edit(Dataset $dataset)
    {
        abort_if(Gate::denies('dataset_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.datasets.edit', compact('dataset'));
    }

    public function update(UpdateDatasetRequest $request, Dataset $dataset)
    {
        $dataset->update($request->all());

        return redirect()->route('admin.datasets.index');
    }

    public function show(Dataset $dataset)
    {
        abort_if(Gate::denies('dataset_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.datasets.show', compact('dataset'));
    }

    public function destroy(Dataset $dataset)
    {
        abort_if(Gate::denies('dataset_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dataset->delete();

        return back();
    }

    public function massDestroy(MassDestroyDatasetRequest $request)
    {
        Dataset::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
