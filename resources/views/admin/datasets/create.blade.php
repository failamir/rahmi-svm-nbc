@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.dataset.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.datasets.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="tweet">{{ trans('cruds.dataset.fields.tweet') }}</label>
                <input class="form-control {{ $errors->has('tweet') ? 'is-invalid' : '' }}" type="text" name="tweet" id="tweet" value="{{ old('tweet', '') }}">
                @if($errors->has('tweet'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tweet') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataset.fields.tweet_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sentimen">{{ trans('cruds.dataset.fields.sentimen') }}</label>
                <input class="form-control {{ $errors->has('sentimen') ? 'is-invalid' : '' }}" type="text" name="sentimen" id="sentimen" value="{{ old('sentimen', '') }}">
                @if($errors->has('sentimen'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sentimen') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataset.fields.sentimen_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dataset">{{ trans('cruds.dataset.fields.dataset') }}</label>
                <div class="needsclick dropzone {{ $errors->has('dataset') ? 'is-invalid' : '' }}" id="dataset-dropzone">
                </div>
                @if($errors->has('dataset'))
                    <div class="invalid-feedback">
                        {{ $errors->first('dataset') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataset.fields.dataset_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.datasetDropzone = {
    url: '{{ route('admin.datasets.storeMedia') }}',
    maxFilesize: 200, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 200
    },
    success: function (file, response) {
      $('form').find('input[name="dataset"]').remove()
      $('form').append('<input type="hidden" name="dataset" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="dataset"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($dataset) && $dataset->dataset)
      var file = {!! json_encode($dataset->dataset) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="dataset" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@endsection