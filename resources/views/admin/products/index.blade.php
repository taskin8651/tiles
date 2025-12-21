@extends('layouts.admin')
@section('content')
@can('product_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.products.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.product.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'Product', 'route' => 'admin.products.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.product.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Product">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.product.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.category') }}
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.tag') }}
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.price') }}
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.short_description') }}
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.brand_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.size') }}
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.finish') }}
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.thickness') }}
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.usage_area') }}
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.description') }}
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.image') }}
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.image_1') }}
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.image_2') }}
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.image_3') }}
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.document') }}
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.video') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $key => $product)
                        <tr data-entry-id="{{ $product->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $product->id ?? '' }}
                            </td>
                            <td>
                                {{ $product->category->name ?? '' }}
                            </td>
                            <td>
                                {{ $product->tag->name ?? '' }}
                            </td>
                            <td>
                                {{ $product->title ?? '' }}
                            </td>
                            <td>
                                {{ $product->price ?? '' }}
                            </td>
                            <td>
                                {{ $product->short_description ?? '' }}
                            </td>
                            <td>
                                {{ $product->brand_name ?? '' }}
                            </td>
                            <td>
                                {{ $product->size ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Product::FINISH_SELECT[$product->finish] ?? '' }}
                            </td>
                            <td>
                                {{ $product->thickness ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Product::USAGE_AREA_SELECT[$product->usage_area] ?? '' }}
                            </td>
                            <td>
                                {{ $product->description ?? '' }}
                            </td>
                            <td>
                                @if($product->image)
                                    <a href="{{ $product->image->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $product->image->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                @if($product->image_1)
                                    <a href="{{ $product->image_1->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $product->image_1->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                @if($product->image_2)
                                    <a href="{{ $product->image_2->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $product->image_2->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                @if($product->image_3)
                                    <a href="{{ $product->image_3->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $product->image_3->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                @if($product->document)
                                    <a href="{{ $product->document->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endif
                            </td>
                            <td>
                                @if($product->video)
                                    <a href="{{ $product->video->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endif
                            </td>
                            <td>
                                @can('product_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.products.show', $product->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('product_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.products.edit', $product->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('product_delete')
                                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('product_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.products.massDestroy') }}",
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
  let table = $('.datatable-Product:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection