<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyNbcRequest;
use App\Http\Requests\StoreNbcRequest;
use App\Http\Requests\UpdateNbcRequest;
use App\Models\Nbc;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NbcController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('nbc_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $nbcs = Nbc::all();

        return view('admin.nbcs.index', compact('nbcs'));
    }

    public function create()
    {
        abort_if(Gate::denies('nbc_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.nbcs.create');
    }

    public function store(StoreNbcRequest $request)
    {
        $nbc = Nbc::create($request->all());

        return redirect()->route('admin.nbcs.index');
    }

    public function edit(Nbc $nbc)
    {
        abort_if(Gate::denies('nbc_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.nbcs.edit', compact('nbc'));
    }

    public function update(UpdateNbcRequest $request, Nbc $nbc)
    {
        $nbc->update($request->all());

        return redirect()->route('admin.nbcs.index');
    }

    public function show(Nbc $nbc)
    {
        abort_if(Gate::denies('nbc_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.nbcs.show', compact('nbc'));
    }

    public function destroy(Nbc $nbc)
    {
        abort_if(Gate::denies('nbc_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $nbc->delete();

        return back();
    }

    public function massDestroy(MassDestroyNbcRequest $request)
    {
        Nbc::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
