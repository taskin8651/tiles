@extends('layouts.admin')
@section('content')
<!-- Dropzone CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- Dropzone JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.testimoni.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.testimonis.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">{{ trans('cruds.testimoni.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', '') }}">
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.testimoni.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.testimoni.fields.description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{{ old('description') }}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.testimoni.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
    <label for="image">{{ trans('cruds.testimoni.fields.image') }}</label>
    <div class="needsclick dropzone {{ $errors->has('image') ? 'is-invalid' : '' }}" id="image-dropzone">
    </div>
    @if($errors->has('image'))
        <div class="invalid-feedback">
            {{ $errors->first('image') }}
        </div>
    @endif
    <span class="help-block">{{ trans('cruds.testimoni.fields.image_helper') }}</span>
</div>
            <div class="form-group">
                <label for="degination">{{ trans('cruds.testimoni.fields.degination') }}</label>
                <input class="form-control {{ $errors->has('degination') ? 'is-invalid' : '' }}" type="text" name="degination" id="degination" value="{{ old('degination', '') }}">
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
                        <option value="{{ $key }}" {{ old('rate', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
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


<script>
    Dropzone.options.imageDropzone = {
        url: '{{ route('admin.testimonis.storeMedia') }}', // route for storing media
        maxFilesize: 20, // MB
        acceptedFiles: '.jpeg,.jpg,.png,.gif',
        maxFiles: 1,
        addRemoveLinks: true,
        headers: {
          'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        params: {
          size: 20,
          width: 4096,
          height: 4096
        },
        success: function (file, response) {
          $('form').find('input[name="image"]').remove()
          $('form').append('<input type="hidden" name="image" value="' + response.name + '">')
        },
        removedfile: function (file) {
          file.previewElement.remove()
          if (file.status !== 'error') {
            $('form').find('input[name="image"]').remove()
            this.options.maxFiles = this.options.maxFiles + 1
          }
        },
        init: function () {
@if(isset($testimoni) && $testimoni->image_file)
          var file = {!! json_encode($testimoni->image_file) !!}
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview ?? file.url)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="image" value="' + file.file_name + '">')
          this.options.maxFiles = this.options.maxFiles - 1
@endif
        },
        error: function (file, response) {
            if ($.type(response) === 'string') {
                var message = response
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