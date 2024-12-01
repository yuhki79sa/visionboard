<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChoiceCategory extends Model
{
    use HasFactory;
    
      protected $table = 'choiceCategories';
    
   public function choices()
    {
        return $this->hasMany(Choice::class);
    }
}
