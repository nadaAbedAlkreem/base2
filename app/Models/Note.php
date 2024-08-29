<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;


class Note extends Model
{
    use HasFactory  , SoftDeletes;
    protected $fillable = [
        'note',
        'user_id',       
    ];


    // protected static function boot() 
    // {
    //     parant::boot(); 
    //     static::addGlobalScope('filter_user' , function(Builder  $builder){
    //     $builder->where('user_type' ,2) ; 
    //     });
    // }

    public function users()
    {
        return $this->belongsTo(User::class , 'user_id', 'id');
    }






}
