<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
    protected $fillable = ['province_id', 'name', 'code'];

    // 'boundary' es una columna geography(polygon) — sin cast automático, ver
    // docs/GEO_MARIADB.md. Se lee/escribe con expresiones raw cuando haga falta.
    protected $hidden = ['boundary'];

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function localities()
    {
        return $this->hasMany(Locality::class);
    }

    public function businesses()
    {
        return $this->hasMany(Business::class);
    }
}
