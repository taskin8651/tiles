<?php

namespace App\Http\Requests;

use App\Models\ProductsTag;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreProductsTagRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('products_tag_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
        ];
    }
}
