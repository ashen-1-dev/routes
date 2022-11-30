<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Region extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'district_id'];

    public function cities(): HasMany
    {
        return $this->hasMany(City::class);
    }

    public function district(): HasOne
    {
        return $this->hasOne(District::class);
    }

    public function routes(): MorphMany
    {
        return $this->morphMany(Route::class, 'routeable');
    }
}
