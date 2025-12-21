@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.addGallery.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.add-galleries.update", [$addGallery->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            
           <div class="form-group">
    <label class="required" for="gallery_category_id">{{ trans('cruds.gallery.fields.category') }}</label>
    <select class="form-control select2 {{ $errors->has('gallery_category_id') ? 'is-invalid' : '' }}" name="gallery_category_id" id="gallery_category_id" required>
        @foreach($categories as $id => $entry)
            <option value="{{ $id }}" {{ old('gallery_category_id', $addGallery->gallery_category_id ?? '') == $id ? 'selected' : '' }}>
                {{ $entry }}
            </option>
        @endforeach
    </select>
    @if($errors->has('gallery_category_id'))
        <div class="invalid-feedback">
            {{ $errors->first('gallery_category_id') }}
        </div>
    @endif
    <span class="help-block">{{ trans('cruds.gallery.fields.category_helper') }}</span>
</div>


            <div class="form-group">
                <label for="title">{{ trans('cruds.addGallery.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $addGallery->title) }}">
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.addGallery.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.addGallery.fields.description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{{ old('description', $addGallery->description) }}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.addGallery.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="upload_file">{{ trans('cruds.addGallery.fields.upload_file') }}</label>
                <div class="needsclick dropzone {{ $errors->has('upload_file') ? 'is-invalid' : '' }}" id="upload_file-dropzone">
                </div>
                @if($errors->has('upload_file'))
                    <div class="invalid-feedback">
                        {{ $errors->first('upload_file') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.addGallery.fields.upload_file_helper') }}</span>
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
    Dropzone.options.uploadFileDropzone = {
    url: '{{ route('admin.add-galleries.storeMedia') }}',
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
      $('form').find('input[name="upload_file"]').remove()
      $('form').append('<input type="hidden" name="upload_file" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="upload_file"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($addGallery) && $addGallery->upload_file)
      var file = {!! json_encode($addGallery->upload_file) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="upload_file" value="' + file.file_name + '">')
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