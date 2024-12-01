<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Action;
use App\Models\ChoiceCategory;
use App\Models\Choice;
use Illuminate\Support\Facades\Auth;

class ChoiceController extends Controller
{
    public function create(Action $action){
        $choiceCategories=ChoiceCategory::All();
        // ユーザーが前回選んだ choiceCategory_id を取得（例: 最新の選択を取得）
        $previousChoice = Choice::where('user_id', Auth::id())
                                ->where('action_id', $action->id)
                                ->latest()
                                ->first();
    
        return view('choices.create', [
            'action' => $action,
            'choiceCategories' => $choiceCategories,
            'selectedCategory' => $previousChoice ? $previousChoice->choiceCategory_id : null,
        ]);
    
    }
    
  public function store(Request $request)
    {
        // フォームデータをバリデーション
        $validated = $request->validate([
            'choice.user_id' => 'required|exists:users,id',
            'choice.action_id' => 'required|exists:actions,id',
            'choice.choiceCategory_id' => 'required|exists:choiceCategories,id',
        ]);
    
        // 既存のデータを確認
        $choice = Choice::where('user_id', $validated['choice']['user_id'])
                        ->where('action_id', $validated['choice']['action_id'])
                        ->first();
    
        if ($choice) {
            // データが存在する場合は更新
            $choice->update([
                'choiceCategory_id' => $validated['choice']['choiceCategory_id'],
            ]);
        } else {
            // データが存在しない場合は新規作成
            Choice::create($validated['choice']);
        }
    
        // 成功後にリダイレクト
        return redirect()->route('news')->with('success', '選択が保存されました！');
    }
}
