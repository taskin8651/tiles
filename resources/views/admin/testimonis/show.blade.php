@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.testimoni.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.testimonis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.testimoni.fields.id') }}
                        </th>
                        <td>
                            {{ $testimoni->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.testimoni.fields.title') }}
                        </th>
                        <td>
                            {{ $testimoni->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.testimoni.fields.description') }}
                        </th>
                        <td>
                            {{ $testimoni->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.testimoni.fields.image') }}
                        </th>
                        <td>
                            {{ $testimoni->image }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.testimoni.fields.degination') }}
                        </th>
                        <td>
                            {{ $testimoni->degination }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.testimoni.fields.rate') }}
                        </th>
                        <td>
                            {{ App\Models\Testimoni::RATE_SELECT[$testimoni->rate] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.testimonis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection