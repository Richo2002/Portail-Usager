<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        "code",
        "description",
        "actif",
    ];

    public function structures()
    {
        return $this->hasMany(Structure::class);
    }
}
