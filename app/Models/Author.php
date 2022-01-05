<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    protected $fillable = ['name']; 
        protected $hidden = [
            'created_at',
            'updated_at',
            'pivot'
    ];

<<<<<<< HEAD
    // public function books(){
    //     return $this->belongs(Book::class);
    // }
=======
    public function books(){
        return $this->belongsToMany(Book::class);
    }
>>>>>>> 65a2b16 (new update)
}
