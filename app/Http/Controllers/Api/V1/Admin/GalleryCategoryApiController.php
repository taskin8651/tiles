<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGalleryCategoryRequest;
use App\Http\Requests\UpdateGalleryCategoryRequest;
use App\Http\Resources\Admin\GalleryCategoryResource;
use App\Models\GalleryCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GalleryCategoryApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('gallery_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GalleryCategoryResource(GalleryCategory::all());
    }

    public function store(StoreGalleryCategoryRequest $request)
    {
        $galleryCategory = GalleryCategory::create($request->all());

        return (new GalleryCategoryResource($galleryCategory))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(GalleryCategory $galleryCategory)
    {
        abort_if(Gate::denies('gallery_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GalleryCategoryResource($galleryCategory);
    }

    public function update(UpdateGalleryCategoryRequest $request, GalleryCategory $galleryCategory)
    {
        $galleryCategory->update($request->all());

        return (new GalleryCategoryResource($galleryCategory))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(GalleryCategory $galleryCategory)
    {
        abort_if(Gate::denies('gallery_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $galleryCategory->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
