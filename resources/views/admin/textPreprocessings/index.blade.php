@extends('layouts.admin')
@section('content')
@can('text_preprocessing_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.text-preprocessings.process') }}">
                {{-- {{ trans('global.add') }} {{ trans('cruds.textPreprocessing.title_singular') }} --}}
                {{ 'Proses TextPreprocessing' }}
            </a>
            {{-- <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'TextPreprocessing', 'route' => 'admin.text-preprocessings.parseCsvImport']) --}}
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.textPreprocessing.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-TextPreprocessing">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        {{-- <th>
                            {{ trans('cruds.textPreprocessing.fields.id') }}
                        </th> --}}
                        <th>
                            {{ trans('cruds.textPreprocessing.fields.tweet') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($textPreprocessings as $key => $textPreprocessing)
                        <tr data-entry-id="{{ $textPreprocessing->id }}">
                            <td>

                            </td>
                            {{-- <td>
                                {{ $textPreprocessing->id ?? '' }}
                            </td> --}}
                            <td>
                                {{ $textPreprocessing->tweet ?? '' }}
                            </td>
                            <td>
                                @can('text_preprocessing_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.text-preprocessings.show', $textPreprocessing->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('text_preprocessing_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.text-preprocessings.edit', $textPreprocessing->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('text_preprocessing_delete')
                                    <form action="{{ route('admin.text-preprocessings.destroy', $textPreprocessing->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('text_preprocessing_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.text-preprocessings.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-TextPreprocessing:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection