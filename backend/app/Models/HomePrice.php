<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Home;

class HomePrice extends Model
{
    protected $guarded = [];

    public function home()
    {
        return $this->belongsTo(Home::class);
    }
}
