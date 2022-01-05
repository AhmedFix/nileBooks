<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(mt_rand(3, 6)),
            'details'=> $this->faker->text(255),
            'imgPath'=> $this->faker->imageUrl(),
            'pdfUrl' => $this->faker->sentence(), 
            'rate' => $this->faker->numberBetween(1, 10),
            'pagesCount' => $this->faker->numberBetween(1, 300), 
            'state' => $this->faker->boolean(),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function($book){
            $auther = Author::create([
                'name'=>$this->faker->name(),
            ]);

            $category = Category::factory()->create();

            $book->categories()->attach($category->id);

            $book->authers()->attach($auther->id);
        });

    }
}
