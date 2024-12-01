<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Action;

class PopularController extends Controller
{
    public function index(Action $action, Request $request){
        
         $keyword = $request->input('keyword');

        $query = Action::query();

        if(!empty($keyword)) {
            $query->where('todo', 'LIKE', "%{$keyword}%");
             $actions = $query->withCount('likes')->orderBy('likes_count', 'desc')->paginate(2);
             
            
        }else{
            $actions=Action::withCount('likes')->orderBy('likes_count', 'desc')->paginate(2);
        }

        
        return view('posts.popularities', ['actions' => $actions, 'keyword' => $keyword]);
    }
}
