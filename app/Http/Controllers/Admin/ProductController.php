<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyProductRequest;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductsTag;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('product_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::with(['category', 'tag', 'media'])->get();

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        abort_if(Gate::denies('product_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = ProductCategory::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tags = ProductsTag::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.products.create', compact('categories', 'tags'));
    }

    public function store(StoreProductRequest $request)
    {
        $product = Product::create($request->all());

        if ($request->input('image', false)) {
            $product->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($request->input('image_1', false)) {
            $product->addMedia(storage_path('tmp/uploads/' . basename($request->input('image_1'))))->toMediaCollection('image_1');
        }

        if ($request->input('image_2', false)) {
            $product->addMedia(storage_path('tmp/uploads/' . basename($request->input('image_2'))))->toMediaCollection('image_2');
        }

        if ($request->input('image_3', false)) {
            $product->addMedia(storage_path('tmp/uploads/' . basename($request->input('image_3'))))->toMediaCollection('image_3');
        }

        if ($request->input('document', false)) {
            $product->addMedia(storage_path('tmp/uploads/' . basename($request->input('document'))))->toMediaCollection('document');
        }

        if ($request->input('video', false)) {
            $product->addMedia(storage_path('tmp/uploads/' . basename($request->input('video'))))->toMediaCollection('video');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $product->id]);
        }

        return redirect()->route('admin.products.index');
    }

    public function edit(Product $product)
    {
        abort_if(Gate::denies('product_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = ProductCategory::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tags = ProductsTag::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $product->load('category', 'tag');

        return view('admin.products.edit', compact('categories', 'product', 'tags'));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->all());

        if ($request->input('image', false)) {
            if (! $product->image || $request->input('image') !== $product->image->file_name) {
                if ($product->image) {
                    $product->image->delete();
                }
                $product->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($product->image) {
            $product->image->delete();
        }

        if ($request->input('image_1', false)) {
            if (! $product->image_1 || $request->input('image_1') !== $product->image_1->file_name) {
                if ($product->image_1) {
                    $product->image_1->delete();
                }
                $product->addMedia(storage_path('tmp/uploads/' . basename($request->input('image_1'))))->toMediaCollection('image_1');
            }
        } elseif ($product->image_1) {
            $product->image_1->delete();
        }

        if ($request->input('image_2', false)) {
            if (! $product->image_2 || $request->input('image_2') !== $product->image_2->file_name) {
                if ($product->image_2) {
                    $product->image_2->delete();
                }
                $product->addMedia(storage_path('tmp/uploads/' . basename($request->input('image_2'))))->toMediaCollection('image_2');
            }
        } elseif ($product->image_2) {
            $product->image_2->delete();
        }

        if ($request->input('image_3', false)) {
            if (! $product->image_3 || $request->input('image_3') !== $product->image_3->file_name) {
                if ($product->image_3) {
                    $product->image_3->delete();
                }
                $product->addMedia(storage_path('tmp/uploads/' . basename($request->input('image_3'))))->toMediaCollection('image_3');
            }
        } elseif ($product->image_3) {
            $product->image_3->delete();
        }

        if ($request->input('document', false)) {
            if (! $product->document || $request->input('document') !== $product->document->file_name) {
                if ($product->document) {
                    $product->document->delete();
                }
                $product->addMedia(storage_path('tmp/uploads/' . basename($request->input('document'))))->toMediaCollection('document');
            }
        } elseif ($product->document) {
            $product->document->delete();
        }

        if ($request->input('video', false)) {
            if (! $product->video || $request->input('video') !== $product->video->file_name) {
                if ($product->video) {
                    $product->video->delete();
                }
                $product->addMedia(storage_path('tmp/uploads/' . basename($request->input('video'))))->toMediaCollection('video');
            }
        } elseif ($product->video) {
            $product->video->delete();
        }

        return redirect()->route('admin.products.index');
    }

    public function show(Product $product)
    {
        abort_if(Gate::denies('product_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $product->load('category', 'tag');

        return view('admin.products.show', compact('product'));
    }

    public function destroy(Product $product)
    {
        abort_if(Gate::denies('product_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $product->delete();

        return back();
    }

    public function massDestroy(MassDestroyProductRequest $request)
    {
        $products = Product::find(request('ids'));

        foreach ($products as $product) {
            $product->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('product_create') && Gate::denies('product_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Product();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
