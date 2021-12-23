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

        public function author()
        {
           
            return $this->hasManyThrough(
            '\App\Models\Author',
            '\App\Models\BookAuthor',
            'book_id',
            'id',
            'id',
            'author_id'
            );
            
        }

        protected $hidden = [
            'created_at',
            'updated_at'
        ];
}
