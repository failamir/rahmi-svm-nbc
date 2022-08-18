@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.dataset.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.datasets.update", [$dataset->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="tweet">{{ trans('cruds.dataset.fields.tweet') }}</label>
                <input class="form-control {{ $errors->has('tweet') ? 'is-invalid' : '' }}" type="text" name="tweet" id="tweet" value="{{ old('tweet', $dataset->tweet) }}">
                @if($errors->has('tweet'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tweet') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataset.fields.tweet_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sentimen">{{ trans('cruds.dataset.fields.sentimen') }}</label>
                <input class="form-control {{ $errors->has('sentimen') ? 'is-invalid' : '' }}" type="text" name="sentimen" id="sentimen" value="{{ old('sentimen', $dataset->sentimen) }}">
                @if($errors->has('sentimen'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sentimen') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataset.fields.sentimen_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection