@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.testimoni.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.testimonis.update", [$testimoni->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="title">{{ trans('cruds.testimoni.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $testimoni->title) }}">
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.testimoni.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.testimoni.fields.description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{{ old('description', $testimoni->description) }}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.testimoni.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="image">{{ trans('cruds.testimoni.fields.image') }}</label>
                <input class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}" type="text" name="image" id="image" value="{{ old('image', $testimoni->image) }}">
                @if($errors->has('image'))
                    <div class="invalid-feedback">
                        {{ $errors->first('image') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.testimoni.fields.image_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="degination">{{ trans('cruds.testimoni.fields.degination') }}</label>
                <input class="form-control {{ $errors->has('degination') ? 'is-invalid' : '' }}" type="text" name="degination" id="degination" value="{{ old('degination', $testimoni->degination) }}">
                @if($errors->has('degination'))
                    <div class="invalid-feedback">
                        {{ $errors->first('degination') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.testimoni.fields.degination_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.testimoni.fields.rate') }}</label>
                <select class="form-control {{ $errors->has('rate') ? 'is-invalid' : '' }}" name="rate" id="rate">
                    <option value disabled {{ old('rate', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Testimoni::RATE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('rate', $testimoni->rate) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('rate'))
                    <div class="invalid-feedback">
                        {{ $errors->first('rate') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.testimoni.fields.rate_helper') }}</span>
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