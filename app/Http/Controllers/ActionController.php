<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Action;
use Auth;

class ActionController extends Controller
{
    public function store(Request $request, Action $action){
        $input=$request['actions'];
        $input['user_id']=auth::id();
        $action->fill($input)->save();
        return redirect('/my-posts');
        
    }
    
    public function index(Action $action, Request $request){
        
        $keyword = $request->input('keyword');

        $query = Action::query();

        if(!empty($keyword)) {
            $query->where('todo', 'LIKE', "%{$keyword}%");
             $actions = $query->orderBy('updated_at', 'DESC')->paginate(2);
            
        }else{
            $actions=$action->getPaginateByLimit();
        }

        
        return view('posts.news', ['actions' => $actions, 'keyword' => $keyword]);
    }
  
    
    public function AchieveTodo(Action $action){
         $userId=auth::id();
        $AchieveTodo=$action->where('user_id', $userId)->where('isDone', true)->get();
         return view('posts.achievements')->with(['achieveTodos'=> $AchieveTodo]);
    
    }
    
     public function NotAchieveTodo(Action $action){
          $userId=auth::id();
        $NotAchieveTodo=$action->where('user_id', $userId)->where('isDone', NULL)->get();
         return view('posts.BucketLists')->with(['NotAchieveTodos'=> $NotAchieveTodo]);
    
    } 
    
  
   public function done(Action $action){
       $action['isDone']=true;
       $action->save();
        return redirect('/my-posts');
   } 
   
    public function show(Action $action){
        return view('posts.show')->with(['action'=> $action]);
    }
    
    public function newsShow(Action $action){
        return view('news.show')->with(['action'=> $action]);
    }
  
}