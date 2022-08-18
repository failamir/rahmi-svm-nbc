@extends('layouts.admin')
@section('content')
@can('svm_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.svms.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.svm.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'Svm', 'route' => 'admin.svms.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.svm.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Svm">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.svm.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.svm.fields.tweet') }}
                        </th>
                        <th>
                            {{ trans('cruds.svm.fields.prediksi') }}
                        </th>
                        <th>
                            {{ trans('cruds.svm.fields.hasil') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($svms as $key => $svm)
                        <tr data-entry-id="{{ $svm->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $svm->id ?? '' }}
                            </td>
                            <td>
                                {{ $svm->tweet ?? '' }}
                            </td>
                            <td>
                                {{ $svm->prediksi ?? '' }}
                            </td>
                            <td>
                                {{ $svm->hasil ?? '' }}
                            </td>
                            <td>
                                @can('svm_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.svms.show', $svm->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('svm_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.svms.edit', $svm->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('svm_delete')
                                    <form action="{{ route('admin.svms.destroy', $svm->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('svm_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.svms.massDestroy') }}",
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
  let table = $('.datatable-Svm:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection