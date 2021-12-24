<?php

namespace Tests\Feature;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BooksTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function books_can_be_fetched(){
        $book = Book::factory()->create();
        $response = $this->get('/api/books');
        // dd($response->getContent());
        $response->assertJson(
            [
                'success'=>true,
                'data' => 
                
                [
                    [
                        'id'=>Book::first()->id,
                        'name'=>Book::first()->name,
                        'authors'=>Book::first()->authers->toArray(),
                        'details'=>Book::first()->details,
                        'imgPath'=>Book::first()->imgPath,
                        'pdfUrl'=>Book::first()->pdfUrl,
                        'rate'=>Book::first()->rate,
                        'pagesCount'=>Book::first()->pagesCount,
                        'state'=>Book::first()->state
                    ]
                ],
                'message'=>"Books retrieved successfully."
            ]
        );
        $this->assertCount(1,Book::all());
    }
}
