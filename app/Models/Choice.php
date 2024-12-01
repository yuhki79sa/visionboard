<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'action_id',
        'user_id',
        'choiceCategory_id',
    ];
    
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function action()
    {
        return $this->belongsTo(Action::class);
    }
    public function choice_category()
    {
        return $this->belongsTo(ChoiceCategory::class,'choiceCategory_id');
    }
}
