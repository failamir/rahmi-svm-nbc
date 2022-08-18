@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.textPreprocessing.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.text-preprocessings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.textPreprocessing.fields.id') }}
                        </th>
                        <td>
                            {{ $textPreprocessing->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.textPreprocessing.fields.tweet') }}
                        </th>
                        <td>
                            {{ $textPreprocessing->tweet }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.text-preprocessings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection