<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    use HasFactory;
   protected $fillable = [
        'todo',
        'user_id',
        'isDone',
        'body',
        'title',
    ];
    
    public function likes()
    {
        return $this->hasmany(PostLike::class);
    }
    
    public function isLikedByAuthUser() :bool
    {
        $authUserId = \Auth::id();
        $likersArr = array();
        foreach($this->likes as $postLike){
            array_push($likersArr,$postLike->user_id);
        }
        
        if(in_array($authUserId,$likersArr)){
            return true;
        }else{
            return false;
        }
    }
    
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    
    public function getPaginateByLimit(int $limit_count = 2){
        return $this-> orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
     public function choices(){
        return $this->hasMany(Choice::class);
    }
    
}

