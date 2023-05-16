<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Hint;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body'];
    public $table = 'questions';
    /**
     * Get the hints for the question.
     */
    public function hints()
    {
        return $this->hasMany(Hint::class);
    }
}
