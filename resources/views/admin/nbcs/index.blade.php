@extends('layouts.admin')
@section('content')
@can('nbc_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.nbcs.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.nbc.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'Nbc', 'route' => 'admin.nbcs.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.nbc.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Nbc">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.nbc.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.nbc.fields.tweet') }}
                        </th>
                        <th>
                            {{ trans('cruds.nbc.fields.prediksi') }}
                        </th>
                        <th>
                            {{ trans('cruds.nbc.fields.hasil') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($nbcs as $key => $nbc)
                        <tr data-entry-id="{{ $nbc->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $nbc->id ?? '' }}
                            </td>
                            <td>
                                {{ $nbc->tweet ?? '' }}
                            </td>
                            <td>
                                {{ $nbc->prediksi ?? '' }}
                            </td>
                            <td>
                                {{ $nbc->hasil ?? '' }}
                            </td>
                            <td>
                                @can('nbc_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.nbcs.show', $nbc->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('nbc_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.nbcs.edit', $nbc->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('nbc_delete')
                                    <form action="{{ route('admin.nbcs.destroy', $nbc->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('nbc_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.nbcs.massDestroy') }}",
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
  let table = $('.datatable-Nbc:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection