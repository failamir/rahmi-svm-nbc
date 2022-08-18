@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.nbc.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.nbcs.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="tweet">{{ trans('cruds.nbc.fields.tweet') }}</label>
                <input class="form-control {{ $errors->has('tweet') ? 'is-invalid' : '' }}" type="text" name="tweet" id="tweet" value="{{ old('tweet', '') }}">
                @if($errors->has('tweet'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tweet') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.nbc.fields.tweet_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="prediksi">{{ trans('cruds.nbc.fields.prediksi') }}</label>
                <input class="form-control {{ $errors->has('prediksi') ? 'is-invalid' : '' }}" type="text" name="prediksi" id="prediksi" value="{{ old('prediksi', '') }}">
                @if($errors->has('prediksi'))
                    <div class="invalid-feedback">
                        {{ $errors->first('prediksi') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.nbc.fields.prediksi_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="hasil">{{ trans('cruds.nbc.fields.hasil') }}</label>
                <input class="form-control {{ $errors->has('hasil') ? 'is-invalid' : '' }}" type="text" name="hasil" id="hasil" value="{{ old('hasil', '') }}">
                @if($errors->has('hasil'))
                    <div class="invalid-feedback">
                        {{ $errors->first('hasil') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.nbc.fields.hasil_helper') }}</span>
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