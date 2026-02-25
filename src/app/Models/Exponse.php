<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exponse extends Model
{
    protected $fillable = ['colocation_id','payer_id','category_id','title','amount','date','amount_for_one'];
    public function colocation()
    {
        return $this->belongsTo(Colocation::class);
    }
    
    public function payer()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
