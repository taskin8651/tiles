<?php

namespace App\Models;

use App\Traits\Auditable;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Product extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, Auditable, HasFactory;

    public $table = 'products';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $appends = [
        'image',
        'image_1',
        'image_2',
        'image_3',
        'document',
        'video',
    ];

    public const USAGE_AREA_SELECT = [
        'Indoor'  => 'Indoor',
        'Outdoor' => 'Outdoor',
        'both'    => 'Indoor/Outdoor',
    ];

    public const FINISH_SELECT = [
        'glossy'   => 'Glossy',
        'matte'    => 'Matte',
        'rustic'   => 'Rustic',
        'polished' => 'Polished',
    ];

     public const SIZE_SELECT = [
        '300x300' => '300 x 300 mm',
        '300x600' => '300 x 600 mm',
        '600x600' => '600 x 600 mm',
        '600x1200' => '600 x 1200 mm',
        '800x800' => '800 x 800 mm',
    ];

    protected $fillable = [
        'category_id',
        'tag_id',
        'title',
        'price',
        'short_description',
        'brand_name',
        'size',
        'finish',
        'thickness',
        'usage_area',
        'description',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    public function tag()
    {
        return $this->belongsTo(ProductsTag::class, 'tag_id');
    }

    public function getImageAttribute()
    {
        $file = $this->getMedia('image')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function getImage1Attribute()
    {
        $file = $this->getMedia('image_1')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function getImage2Attribute()
    {
        $file = $this->getMedia('image_2')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function getImage3Attribute()
    {
        $file = $this->getMedia('image_3')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function getDocumentAttribute()
    {
        return $this->getMedia('document')->last();
    }

    public function getVideoAttribute()
    {
        return $this->getMedia('video')->last();
    }
}
