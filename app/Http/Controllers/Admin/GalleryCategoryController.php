<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyGalleryCategoryRequest;
use App\Http\Requests\StoreGalleryCategoryRequest;
use App\Http\Requests\UpdateGalleryCategoryRequest;
use App\Models\GalleryCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GalleryCategoryController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('gallery_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $galleryCategories = GalleryCategory::all();

        return view('admin.galleryCategories.index', compact('galleryCategories'));
    }

    public function create()
    {
        abort_if(Gate::denies('gallery_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.galleryCategories.create');
    }

    public function store(StoreGalleryCategoryRequest $request)
    {
        $galleryCategory = GalleryCategory::create($request->all());

        return redirect()->route('admin.gallery-categories.index');
    }

    public function edit(GalleryCategory $galleryCategory)
    {
        abort_if(Gate::denies('gallery_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.galleryCategories.edit', compact('galleryCategory'));
    }

    public function update(UpdateGalleryCategoryRequest $request, GalleryCategory $galleryCategory)
    {
        $galleryCategory->update($request->all());

        return redirect()->route('admin.gallery-categories.index');
    }

    public function show(GalleryCategory $galleryCategory)
    {
        abort_if(Gate::denies('gallery_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.galleryCategories.show', compact('galleryCategory'));
    }

    public function destroy(GalleryCategory $galleryCategory)
    {
        abort_if(Gate::denies('gallery_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $galleryCategory->delete();

        return back();
    }

    public function massDestroy(MassDestroyGalleryCategoryRequest $request)
    {
        $galleryCategories = GalleryCategory::find(request('ids'));

        foreach ($galleryCategories as $galleryCategory) {
            $galleryCategory->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
