@extends('layouts.admin')
@section('content')
@can('add_gallery_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.add-galleries.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.addGallery.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'AddGallery', 'route' => 'admin.add-galleries.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.addGallery.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-AddGallery">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.addGallery.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.addGallery.fields.title') }}
                        </th>
                        <th>
                           Gallery Category
                        </th>
                        <th>
                            {{ trans('cruds.addGallery.fields.description') }}
                        </th>
                        <th>
                            {{ trans('cruds.addGallery.fields.upload_file') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($addGalleries as $key => $addGallery)
                        <tr data-entry-id="{{ $addGallery->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $addGallery->id ?? '' }}
                            </td>
                            <td>
                                {{ $addGallery->category->title ?? '' }}
                            </td>
                            <td>
                                {{ $addGallery->title ?? '' }}
                            </td>
                            <td>
                                {{ $addGallery->description ?? '' }}
                            </td>
                            <td>
                                @if($addGallery->upload_file)
                                    <a href="{{ $addGallery->upload_file->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endif
                            </td>
                            <td>
                                @can('add_gallery_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.add-galleries.show', $addGallery->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('add_gallery_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.add-galleries.edit', $addGallery->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('add_gallery_delete')
                                    <form action="{{ route('admin.add-galleries.destroy', $addGallery->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('add_gallery_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.add-galleries.massDestroy') }}",
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
  let table = $('.datatable-AddGallery:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection