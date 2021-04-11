<?php

namespace kchinkesh\LaravelModelObserver\App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use kchinkesh\LaravelModelObserver\App\Traits\ModelsObserver;

class Post extends Model
{
    use HasFactory,ModelsObserver;
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
