<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->name()
        ];
    }

    public function configure()
    {
       
        return $this->afterCreating(function($category) {
            $book = Book::create([
                'name' => $this->faker->sentence(mt_rand(3, 6)),
                'details'=> $this->faker->text(255),
                'imgPath'=> $this->faker->imageUrl(),
                'pdfUrl' => $this->faker->sentence(), 
                'rate' => $this->faker->numberBetween(1, 10),
                'pagesCount' => $this->faker->numberBetween(1, 300), 
                'state' => $this->faker->boolean(),
            ]);
            $category->books()->attach($book->id);
        });
    }
}
