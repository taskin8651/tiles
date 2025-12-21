<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyAddGalleryRequest;
use App\Http\Requests\StoreAddGalleryRequest;
use App\Http\Requests\UpdateAddGalleryRequest;
use App\Models\AddGallery;
use App\Models\GalleryCategory;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class AddGalleryController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('add_gallery_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addGalleries = AddGallery::with(['media'])->get();

        return view('admin.addGalleries.index', compact('addGalleries'));
    }
public function create()
{
    abort_if(Gate::denies('add_gallery_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    // Pluck categories for select input
    $categories = GalleryCategory::pluck('title', 'id');

    return view('admin.addGalleries.create', compact('categories'));
}


    public function store(StoreAddGalleryRequest $request)
    {
        $addGallery = AddGallery::create($request->all());

        if ($request->input('upload_file', false)) {
            $addGallery->addMedia(storage_path('tmp/uploads/' . basename($request->input('upload_file'))))->toMediaCollection('upload_file');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $addGallery->id]);
        }

        return redirect()->route('admin.add-galleries.index');
    }

   public function edit(AddGallery $addGallery)
{
    abort_if(Gate::denies('add_gallery_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    // Pluck categories for select input
    $categories = GalleryCategory::pluck('title', 'id');

    return view('admin.addGalleries.edit', compact('addGallery', 'categories'));
}

    public function update(UpdateAddGalleryRequest $request, AddGallery $addGallery)
    {
        $addGallery->update($request->all());

        if ($request->input('upload_file', false)) {
            if (! $addGallery->upload_file || $request->input('upload_file') !== $addGallery->upload_file->file_name) {
                if ($addGallery->upload_file) {
                    $addGallery->upload_file->delete();
                }
                $addGallery->addMedia(storage_path('tmp/uploads/' . basename($request->input('upload_file'))))->toMediaCollection('upload_file');
            }
        } elseif ($addGallery->upload_file) {
            $addGallery->upload_file->delete();
        }

        return redirect()->route('admin.add-galleries.index');
    }

    public function show(AddGallery $addGallery)
    {
        abort_if(Gate::denies('add_gallery_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.addGalleries.show', compact('addGallery'));
    }

    public function destroy(AddGallery $addGallery)
    {
        abort_if(Gate::denies('add_gallery_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addGallery->delete();

        return back();
    }

    public function massDestroy(MassDestroyAddGalleryRequest $request)
    {
        $addGalleries = AddGallery::find(request('ids'));

        foreach ($addGalleries as $addGallery) {
            $addGallery->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('add_gallery_create') && Gate::denies('add_gallery_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new AddGallery();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
