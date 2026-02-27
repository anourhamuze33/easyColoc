<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Settelment extends Model
{
    protected $fillable = ['colocation_id', 'from_user_id', 'to_user_id', 'amount', 'paid_at', 'exponse_id', 'is_payed'];
    public function colocation()
    {
        return $this->belongsTo(Colocation::class);
    }

    public function fromUser()
    {
        return $this->belongsTo(User::class, 'from_user_id');
    }

    public function toUser()
    {
        return $this->belongsTo(User::class, 'to_user_id');
    }
    public function exponse()
    {
        return $this->belongsTo(Exponse::class);
    }
}
