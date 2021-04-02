<?php

namespace Kchinkesh\laravel-model-observer\src\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class ModelAction extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'model_actions';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];


    protected $fillable = [
        'id',
        'user_id',
        'model',
        'action',
        'message',
        'ip_address',
        'models'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'models' => 'array',
    ];

    /**
     * Get the user record associated with this log
     */
    public function user()
    {
        return $this->hasOne(User::class,'id');
    }
}
