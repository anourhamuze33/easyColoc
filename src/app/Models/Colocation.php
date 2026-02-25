<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Colocation extends Model
{
    protected $fillable = ['name', 'role', 'Owner_id'];

    public function owner()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function members()
    {
        return $this->belongsToMany(
            User::class,
            'members',
            'colocation_id',
            'user_id'
        );
    }

    public function expenses()
    {
        return $this->hasMany(Exponse::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function invitations()
    {
        return $this->hasMany(Invitation::class);
    }
}
