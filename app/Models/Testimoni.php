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

class Testimoni extends Model implements HasMedia
{
    use SoftDeletes, Auditable, HasFactory, InteractsWithMedia;

    public $table = 'testimonis';

    public const RATE_SELECT = [
        '1' => '1',
        '2' => '2',
        '3' => '3',
        '4' => '4',
        '5' => '5',
    ];

    protected $appends = [
        'image', // Now accessor matches
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title',
        'description',
        'degination',
        'rate',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * Format date
     */
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    /**
     * Media conversions
     */
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->fit('crop', 50, 50)
            ->nonQueued();

        $this->addMediaConversion('preview')
            ->fit('crop', 120, 120)
            ->nonQueued();
    }

    /**
     * Accessor for image
     */
    public function getImageAttribute()
    {
        $file = $this->getMedia('image')->last(); // 'image' collection
        if ($file) {
            return (object) [
                'url'       => $file->getUrl(),
                'thumbnail' => $file->getUrl('thumb'),
                'preview'   => $file->getUrl('preview'),
                'name'      => $file->file_name,
            ];
        }

        return null;
    }
}
