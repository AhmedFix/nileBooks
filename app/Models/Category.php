<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    
    protected $fillable = ['name'];
    
    public function book()
        {
            return $this->hasManyThrough(
                '\App\Models\Book',
                '\App\Models\CategoryBook',
                'category_id',
                'id',
                'id',
                'book_id'
    
            );
        }
    protected $hidden =[
        'laravel_through_key',
        'created_at',
        'updated_at'
    ];
}
