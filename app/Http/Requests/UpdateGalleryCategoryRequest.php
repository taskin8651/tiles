<?php

namespace App\Http\Requests;

use App\Models\GalleryCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateGalleryCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('gallery_category_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'nullable',
            ],
        ];
    }
}
