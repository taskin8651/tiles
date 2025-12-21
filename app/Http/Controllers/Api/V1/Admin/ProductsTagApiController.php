<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductsTagRequest;
use App\Http\Requests\UpdateProductsTagRequest;
use App\Http\Resources\Admin\ProductsTagResource;
use App\Models\ProductsTag;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductsTagApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('products_tag_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProductsTagResource(ProductsTag::all());
    }

    public function store(StoreProductsTagRequest $request)
    {
        $productsTag = ProductsTag::create($request->all());

        return (new ProductsTagResource($productsTag))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ProductsTag $productsTag)
    {
        abort_if(Gate::denies('products_tag_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProductsTagResource($productsTag);
    }

    public function update(UpdateProductsTagRequest $request, ProductsTag $productsTag)
    {
        $productsTag->update($request->all());

        return (new ProductsTagResource($productsTag))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ProductsTag $productsTag)
    {
        abort_if(Gate::denies('products_tag_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productsTag->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
