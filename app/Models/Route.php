<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Route extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function routeable(): MorphTo
    {
        return $this->morphTo();
    }

}
