<?php

namespace Kchinkesh\Laravel-model-observer\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

/**
 * Observable trait
 *
 * @package App\Traits
 */
trait ModelsObserver
{

    public static function bootModelsObserver()
    {
        static::saved(function (Model $model) {
            // create or update?
            if( $model->wasRecentlyCreated ) {
                static::logChange( $model, 'CREATED' );
            } else {
                if( !$model->getChanges() ) {
                    return;
                }
                static::logChange( $model, 'UPDATED' );
            }
        });

        static::deleted(function (Model $model) {
            static::logChange( $model, 'DELETED' );
        });
    }

    /**
     * String to describe the model being updated / deleted / created
     *
     * Override this in your own model to customise - see below for example
     *
     * @return string
     */
    public static function logSubject(Model $model): string {
        return static::logImplodeAssoc($model->attributesToArray());
    }

    /**
     * Format an assoc array as a key/value string for logging
     * @return string
     */
    public static function logImplodeAssoc(array $attrs): string {
        $l = '';
        foreach( $attrs as $k => $v ) {
            $l .= "{ $k => $v } ";
        }
        return $l;
    }

    /* Retrieve the current login user id */
    public static function activeUserId(){
        return Auth::guard(static::activeUserGuard())->id();
    }

    /* Retrieve the current login user guard */
    public static function activeUserGuard(){
        foreach(array_keys(config('auth.guards')) as $guard){
            if(auth()->guard($guard)->check()){
                return $guard;
            }
        }
    }

    /**
     * String to describe the model being updated / deleted / created
     * @return string
     */
    public static function logChange( Model $model, string $action ) {
        UserAction::create([
            'id'            => UserAction::max('id')+1,
            'user_id'       => static::activeUserId(),
            'model'         => static::class,
            'action'        => $action,
            'message'       => static::logSubject($model),
            'ip_address'    => request()->ip(),
            'models'  => [
                    'new'     => $action !== 'DELETED' ? $model->getAttributes() : null,
                    'old'     => $action !== 'CREATED' ? $model->getOriginal()   : null,
                    'changed' => $action === 'UPDATED' ? $model->getChanges()    : null,
                ]
        ]);
    }

}