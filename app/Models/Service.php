<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Service extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'icon',
        'image_path',
        'active',
        'sort_order',
        'meta_title',
        'meta_description',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($service) {
            if (empty($service->slug)) {
                $base = Str::slug($service->title);
                $slug = $base;
                $i = 2;
                while (static::where('slug', $slug)->exists()) {
                    $slug = $base.'-'.$i++;
                }
                $service->slug = $slug;
            }
        });

        static::updating(function ($service) {
            if (empty($service->slug)) {
                $base = Str::slug($service->title);
                $slug = $base;
                $i = 2;
                while (static::where('slug', $slug)->whereKeyNot($service->getKey())->exists()) {
                    $slug = $base.'-'.$i++;
                }
                $service->slug = $slug;
            }
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
