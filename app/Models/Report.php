<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $fillable = [
        "title",
        "description",
        "user_id",
        "approved_by",
        "location_id",
    ];

    public function user() {
        return $this->belongsTo(User::class, "user_id", "id");
    }

    public function location() {
        return $this->belongsTo(Location::class, "location_id", "id");
    }

    public function approvedBy() {
        return $this->belongsTo(User::class, "approved_by", "id");
    }
}
