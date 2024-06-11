<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    protected $fillable = [
        "location_name",
        "updated_by",
    ];

    public function updateBy() {
        return $this->belongsTo(User::class, "updated_by", "id");
    }

    public function reports() {
        return $this->hasMany(Report::class, "report_id", "id");
    }

    public function newReports() {
        return $this->hasMany(Report::class, "location_id", "id")->where("status", "BARU");
    }
}
