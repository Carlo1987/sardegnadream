<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\ServiceCategory;

class Service extends Model
{
    protected $guarded = [];

    public function service_category()
    {
        return $this->belongsTo(ServiceCategory::class);
    }
}
