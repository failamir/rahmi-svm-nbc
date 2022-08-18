@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.dataset.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.datasets.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.dataset.fields.id') }}
                        </th>
                        <td>
                            {{ $dataset->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dataset.fields.tweet') }}
                        </th>
                        <td>
                            {{ $dataset->tweet }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dataset.fields.sentimen') }}
                        </th>
                        <td>
                            {{ $dataset->sentimen }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dataset.fields.dataset') }}
                        </th>
                        <td>
                            @if($dataset->dataset)
                                <a href="{{ $dataset->dataset->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.datasets.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection