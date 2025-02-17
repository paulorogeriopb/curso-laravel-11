<?php

namespace Database\Seeders;

use App\Models\Classe;
use Faker\Provider\Lorem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClasseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!Classe::where('name', 'Aula 1')->first()) {
            Classe::create([
                'name' => "Aula 1",
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt eveniet asperiores totam quas velit repellendus optio. Aliquid enim aspernatur asperiores soluta tempora ratione aliquam deserunt, consequatur quos voluptatibus. Repudiandae, iusto!',
                'order_classe' => 1,
                'course_id' => 1,
            ]);
        }

        if (!Classe::where('name', 'Aula 2')->first()) {
            Classe::create([
                'name' => "Aula 2",
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt eveniet asperiores totam quas velit repellendus optio. Aliquid enim aspernatur asperiores soluta tempora ratione aliquam deserunt, consequatur quos voluptatibus. Repudiandae, iusto!',
                'order_classe' => 2,
                'course_id' => 1,
            ]);
        }
        if (!Classe::where('name', 'Aula 1B')->first()) {
            Classe::create([
                'name' => "Aula 1B",
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt eveniet asperiores totam quas velit repellendus optio. Aliquid enim aspernatur asperiores soluta tempora ratione aliquam deserunt, consequatur quos voluptatibus. Repudiandae, iusto!',
                'order_classe' => 1,
                'course_id' => 2,
            ]);
        }
    }
}
