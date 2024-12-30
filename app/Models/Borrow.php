<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Borrow extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_id', 
        'nama', 
        'nim', 
        'borrowed_at', 
        'due_date', 
    ];

    public function book()
    {
        return $this->belongsTo(Book::class); 
    }
}