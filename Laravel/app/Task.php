<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['title','body','user_id']; // title, body에만 값을 넣도록 지정함

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
