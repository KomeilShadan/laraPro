<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

	protected $fillable = ['item'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function tags()
    {
    	return $this->belongsToMany(Tag::class);
    }
}
