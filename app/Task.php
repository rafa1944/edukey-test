<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['name'];

    public function User()
    {
    	return $this->belongsTo(User::class);
    }
}
