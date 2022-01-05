<?php

namespace Tests\Feature;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertCount;
use function PHPUnit\Framework\assertTrue;

class CategoryTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function list_of_cateigories_can_be_fetched(){
        $this->withExceptionHandling();
        Category::factory()->count(2)->create();

        $response = $this->get('/api/categories');

        assertCount(2,Category::all());
        // dd($response->getContent());

        $response->assertJson([
            'data'=>[
                [
                    'name'=>Category::first()->name,
                    'books'=>Category::first()->books->toArray()
                ],
                [
                    'name'=>Category::find(2)->name,
                    'books'=>Category::find(2)->books->toArray()
                ],
            ]
        ]);
    }
}
