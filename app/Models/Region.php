<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    


    //une region peux avoir plusieurs annonce
    public function ads()
    {
        return $this->hasMany(Ad::class);
    }
}
