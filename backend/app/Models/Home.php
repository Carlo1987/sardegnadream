<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

use App\Models\HomeService;

class Home extends Model
{
    use SoftDeletes;  

    protected $guarded = [];

    public function services()
    {
        return $this->hasMany(HomeService::class);
    }
}
