<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Action;

class CommentController extends Controller
{
    public function store(Request $request, $actionId, Comment $comment){
        $this->validate($request, [
            'body' => 'required'
            ]);
            
            $comment->body=$request->body;
            $comment->URL=$request->URL;
            $comment->action_id=$actionId;
            $comment->save();
            return redirect()
                   ->action([ActionController::class, 'show'],['action'=>$actionId]);
     
    }
    
}

