<?php

namespace App\Models;

use App\Models\Concerns\HasGeoLocation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasGeoLocation, SoftDeletes;

    protected $fillable = [
        'destination_id', 'business_id', 'title', 'slug', 'description',
        'cover_image', 'starts_at', 'ends_at',
    ];

    protected $hidden = ['location'];

    protected function casts(): array
    {
        return [
            'starts_at' => 'datetime',
            'ends_at' => 'datetime',
        ];
    }

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }

    public function business()
    {
        return $this->belongsTo(Business::class);
    }

    public function scopeUpcoming($query)
    {
        return $query->where('starts_at', '>=', now())->orderBy('starts_at');
    }
}
