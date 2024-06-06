<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Map extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "path",
        "updated_by",
    ];

    public function updateBy() {
        return $this->belongsTo(User::class, "updated_by", "id");
    }
}
