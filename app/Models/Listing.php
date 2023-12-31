<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;
    protected $fillable = ['title','company' , 'location', 'website' , 'email' ,'description' , 'tags','user_id','logo'];

    public function scopeFilter ($query, array $filter)
    {
        if($filter['tags'] ?? false){
            $query->where('tags','like', '%'.request('tags').'%');
        }

        if($filter['search'] ?? false){
            $query->where('title','like', '%'.request('search').'%')
            ->orwhere('description','like', '%'.request('search').'%')
            ->orwhere('tags','like', '%'.request('search').'%')
            ->orwhere('location','like', '%'.request('search').'%')
            ;
        }
    } 
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}














