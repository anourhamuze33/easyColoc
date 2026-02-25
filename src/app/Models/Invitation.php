<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    public function colocation()
    {
        return $this->belongsTo(Colocation::class);
    }
    
    public function invited()
    {
        return $this->belongsTo(User::class);
    }
}
