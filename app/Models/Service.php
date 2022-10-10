<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        "description",
        "fileToProvide",
        'cost',
        'timeLimit',
        'text',
        "observation",
    ];

    /**
     * Get the thematic that owns the Service
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function thematic()
    {
        return $this->belongsTo(Thematic::class);
    }
    public function structure()
    {
        return $this->belongsTo(Structure::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
