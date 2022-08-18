<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroySvmRequest;
use App\Http\Requests\StoreSvmRequest;
use App\Http\Requests\UpdateSvmRequest;
use App\Models\Svm;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SvmController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('svm_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $svms = Svm::all();

        return view('admin.svms.index', compact('svms'));
    }

    public function create()
    {
        abort_if(Gate::denies('svm_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.svms.create');
    }

    public function store(StoreSvmRequest $request)
    {
        $svm = Svm::create($request->all());

        return redirect()->route('admin.svms.index');
    }

    public function edit(Svm $svm)
    {
        abort_if(Gate::denies('svm_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.svms.edit', compact('svm'));
    }

    public function update(UpdateSvmRequest $request, Svm $svm)
    {
        $svm->update($request->all());

        return redirect()->route('admin.svms.index');
    }

    public function show(Svm $svm)
    {
        abort_if(Gate::denies('svm_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.svms.show', compact('svm'));
    }

    public function destroy(Svm $svm)
    {
        abort_if(Gate::denies('svm_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $svm->delete();

        return back();
    }

    public function massDestroy(MassDestroySvmRequest $request)
    {
        Svm::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
