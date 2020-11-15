<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'comment',
        'user_id',
        'like',
    ];

    public function likes()
    {
        return $this->hasMany(like::class);
    }


    public function is_liked_by_auth_user()
    {
        $id = auth()->user()->id;

        $likers = array();
        foreach($this->likes as $like) {
            array_push($likers, $like->user_id);
        }

        if (in_array($id, $likers)) {
            return true;
        } else {
            return false;
        }
    }

    public function is_auth_user()
    {
        $id = auth()->user()->id;

        if($this->user_id === $id){
            return true;
        } else {
            return false;
        }
    }
}
