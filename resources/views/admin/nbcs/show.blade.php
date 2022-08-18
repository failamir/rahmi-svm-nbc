@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.nbc.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.nbcs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.nbc.fields.id') }}
                        </th>
                        <td>
                            {{ $nbc->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.nbc.fields.tweet') }}
                        </th>
                        <td>
                            {{ $nbc->tweet }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.nbc.fields.prediksi') }}
                        </th>
                        <td>
                            {{ $nbc->prediksi }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.nbc.fields.hasil') }}
                        </th>
                        <td>
                            {{ $nbc->hasil }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.nbcs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection