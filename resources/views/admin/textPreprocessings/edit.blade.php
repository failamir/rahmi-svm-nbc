@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.textPreprocessing.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.text-preprocessings.update", [$textPreprocessing->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="tweet">{{ trans('cruds.textPreprocessing.fields.tweet') }}</label>
                <input class="form-control {{ $errors->has('tweet') ? 'is-invalid' : '' }}" type="text" name="tweet" id="tweet" value="{{ old('tweet', $textPreprocessing->tweet) }}">
                @if($errors->has('tweet'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tweet') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.textPreprocessing.fields.tweet_helper') }}</span>
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