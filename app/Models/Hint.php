<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Question;

class Hint extends Model
{
    use HasFactory;
    
    protected $fillable = ['question_id', 'hint'];
    
    /**
     * Get the question that owns the hint.
     */
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
