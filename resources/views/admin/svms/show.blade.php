@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.svm.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.svms.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.svm.fields.id') }}
                        </th>
                        <td>
                            {{ $svm->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.svm.fields.tweet') }}
                        </th>
                        <td>
                            {{ $svm->tweet }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.svm.fields.prediksi') }}
                        </th>
                        <td>
                            {{ $svm->prediksi }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.svm.fields.hasil') }}
                        </th>
                        <td>
                            {{ $svm->hasil }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.svms.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection