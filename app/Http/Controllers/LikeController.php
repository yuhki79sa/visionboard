<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostLike;
use App\Models\Action;

class LikeController extends Controller
{
    public function likePost(Request $request){
        $user_id = \Auth::id();
        $action_id = $request->action_id;
        $alreadyLiked = PostLike::where('user_id', $user_id)->where('action_id', $action_id)->first();
        
        if(!$alreadyLiked){
            $like = new PostLike();
            $like -> action_id = $action_id;
            $like -> user_id = $user_id;
            $like ->save();
        }
        else{PostLike::where('action_id', $action_id)
            ->where('user_id', $user_id)->delete();
        }
        
        $action = Action::where('id', $action_id)->first();
        $likesCount = $action->likes->count();
        $param = ['likescount' => $likesCount];
        return response()-> json($param);
    }
}
