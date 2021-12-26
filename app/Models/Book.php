<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 
        'details',
        'auth', 
        'imgPath',
        'pdfUrl', 
        'rate',
        'pagesCount', 
        'state'
        ]; 

        protected $hidden = [
            'created_at',
            'updated_at'
        ];

    public function authers(){
        return $this->belongsToMany(Author::class);
    }
}
