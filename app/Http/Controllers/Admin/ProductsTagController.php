<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyProductsTagRequest;
use App\Http\Requests\StoreProductsTagRequest;
use App\Http\Requests\UpdateProductsTagRequest;
use App\Models\ProductsTag;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductsTagController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('products_tag_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productsTags = ProductsTag::all();

        return view('admin.productsTags.index', compact('productsTags'));
    }

    public function create()
    {
        abort_if(Gate::denies('products_tag_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.productsTags.create');
    }

    public function store(StoreProductsTagRequest $request)
    {
        $productsTag = ProductsTag::create($request->all());

        return redirect()->route('admin.products-tags.index');
    }

    public function edit(ProductsTag $productsTag)
    {
        abort_if(Gate::denies('products_tag_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.productsTags.edit', compact('productsTag'));
    }

    public function update(UpdateProductsTagRequest $request, ProductsTag $productsTag)
    {
        $productsTag->update($request->all());

        return redirect()->route('admin.products-tags.index');
    }

    public function show(ProductsTag $productsTag)
    {
        abort_if(Gate::denies('products_tag_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.productsTags.show', compact('productsTag'));
    }

    public function destroy(ProductsTag $productsTag)
    {
        abort_if(Gate::denies('products_tag_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productsTag->delete();

        return back();
    }

    public function massDestroy(MassDestroyProductsTagRequest $request)
    {
        $productsTags = ProductsTag::find(request('ids'));

        foreach ($productsTags as $productsTag) {
            $productsTag->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
