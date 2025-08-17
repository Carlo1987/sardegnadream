<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Service;

class ServiceCategory extends Model
{
    protected $table = 'service_categories';
    protected $guarded = [];

    public function services()
    {
        return $this->hasMany(Service::class);
    }


}
