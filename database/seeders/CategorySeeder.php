<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Cinema;

//use App\Models\City;
use App\Models\Movie;
use App\Models\section;
use App\Models\Ticket;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Category::factory()->create(
            ['name' => 'family']
        )->each(function (Category $category1) {

            $cate1 = Category::factory()->create([
                'name' => 'اجتماعی',
                'parent_id' => $category1->id,
            ]);

            $movies = Movie::factory(5)->create([
                'category_id' => $cate1->id,
            ]);

            $cinemas = Cinema::factory(6)->create([
                'name'=>'name'
            ]);
            $sections = [];
            foreach ($movies as $movie) {
                foreach ($cinemas as $cinema) {
                    for ($i = 1; $i < 4; $i++) {
                        $sections[] = Section::factory()->create([
                            'movie_id' => $movie->id,
                            'cinema_id' => $cinema->id,
                        ]);
                    }
                }
            }
            foreach ($sections as $section) {
                Ticket::factory(2)->create([
                    'section_id' => $section->id
                ]);
            }


//            $cate2 = Category::factory()->create([
//                'name' => 'سیاسی',
//                'parent_id' => $category1->id
//            ]);
//            $movies = Movie::factory(5)->create([
//                'category_id' => $cate2->id
//            ]);
//            $cinemas = Cinema::factory(6)->create()->pluck('id');
//            foreach ($movies as $movie) {
//                $movie->cinemas()->sync($cinemas);
//            }
//            foreach ($cinemas as $cinema) {
//                $sections1 = section::factory(3)->create(['cinema_id' => $cinema]);
//            }
//            foreach ($sections1 as $section1) {
//                $section1->movies()->sync($movies);
//                Ticket::factory(20)->create(['section_id' => $section1->id]);
//            }
//
//            $cat3 = Category::factory()->create([
//                'name' => 'اموزشی',
//                'parent_id' => $category1->id
//            ]);
//            $movies = Movie::factory(5)->create([
//                'category_id' => $cat3->id
//            ]);
//            $cinemas = Cinema::factory(6)->create()->pluck('id');
//            foreach ($movies as $movie) {
//                $movie->cinemas()->sync($cinemas);
//            }
//            foreach ($cinemas as $cinema) {
//                $sections2 = section::factory(3)->create(['cinema_id' => $cinema]);
//            }
//            foreach ($sections2 as $section2) {
//                $section2->movies()->sync($movies);
//                Ticket::factory(20)->create(['section_id' => $section2->id]);
//            }
        });


//        $category2 = Category::create([
//            'name' => 'children'
//        ]);
//
//        $cate1 = Category::factory()->create([
//            'name' => 'اجتماعی',
//            'parent_id' => $category2->id
//        ]);
//        $movies = Movie::factory(5)->create([
//            'category_id' => $cate1->id
//        ]);
//        $cinemas = Cinema::factory(6)->create()->pluck('id');
//        foreach ($movies as $movie) {
//            $movie->cinemas()->sync($cinemas);
//        }
//        foreach ($cinemas as $cinema) {
//            $sections = section::factory(3)->create(['cinema_id' => $cinema]);
//        }
//        foreach ($sections as $section) {
//            $section->movies()->sync($movies);
//            Ticket::factory(20)->create(['section_id' => $section->id]);
//        }
//
//
//        $cate2 = Category::factory()->create([
//            'name' => 'سیاسی',
//            'parent_id' => $category2->id
//        ]);
//        $movies = Movie::factory(5)->create([
//            'category_id' => $cate2->id
//        ]);
//        $cinemas = Cinema::factory(6)->create()->pluck('id');
//        foreach ($movies as $movie) {
//            $movie->cinemas()->sync($cinemas);
//        }
//        foreach ($cinemas as $cinema) {
//            $sections1 = section::factory(3)->create(['cinema_id' => $cinema]);
//        }
//        foreach ($sections1 as $section1) {
//            $section1->movies()->sync($movies);
//            Ticket::factory(20)->create(['section_id' => $section1->id]);
//        }
//
//
//        $cate3 = Category::factory()->create([
//            'name' => 'اموزشی',
//            'parent_id' => $category2->id
//        ]);
//        $movies = Movie::factory(5)->create([
//            'category_id' => $cate3->id
//        ]);
//        $cinemas = Cinema::factory(6)->create()->pluck('id');
//        foreach ($movies as $movie) {
//            $movie->cinemas()->sync($cinemas);
//        }
//        foreach ($cinemas as $cinema) {
//            $sections2 = section::factory(3)->create(['cinema_id' => $cinema]);
//        }
//        foreach ($sections2 as $section2) {
//            $section2->movies()->sync($movies);
//            Ticket::factory(20)->create(['section_id' => $section2->id]);
//        }
//
//
//        $category3 = Category::create([
//            'name' => 'adults'
//        ]);
//
//        $cate1 = Category::factory()->create([
//            'name' => 'اجتماعی',
//            'parent_id' => $category3->id
//        ]);
//        $movies = Movie::factory(5)->create([
//            'category_id' => $cate1->id
//        ]);
//        $cinemas = Cinema::factory(6)->create()->pluck('id');
//        foreach ($movies as $movie) {
//            $movie->cinemas()->sync($cinemas);
//        }
//        foreach ($cinemas as $cinema) {
//            $sections = section::factory(3)->create(['cinema_id' => $cinema]);
//        }
//        foreach ($sections as $section) {
//            $section->movies()->sync($movies);
//            Ticket::factory(20)->create(['section_id' => $section->id]);
//        }
//
//
//        $cate2 = Category::factory()->create([
//            'name' => 'سیاسی',
//            'parent_id' => $category3->id
//        ]);
//        $movies = Movie::factory(5)->create([
//            'category_id' => $cate2->id
//        ]);
//        $cinemas = Cinema::factory(6)->create()->pluck('id');
//        foreach ($movies as $movie) {
//            $movie->cinemas()->sync($cinemas);
//        }
//        foreach ($cinemas as $cinema) {
//            $sections1 = section::factory(3)->create(['cinema_id' => $cinema]);
//        }
//        foreach ($sections1 as $section1) {
//            $section1->movies()->sync($movies);
//            Ticket::factory(20)->create(['section_id' => $section1->id]);
//        }
//
//
//        $cate3 = Category::factory()->create([
//            'name' => 'اموزشی',
//            'parent_id' => $category3->id
//        ]);
//        $movies = Movie::factory(5)->create([
//            'category_id' => $cate3->id
//        ]);
//        $cinemas = Cinema::factory(6)->create()->pluck('id');
//        foreach ($movies as $movie) {
//            $movie->cinemas()->sync($cinemas);
//        }
//        foreach ($cinemas as $cinema) {
//            $sections2 = section::factory(3)->create(['cinema_id' => $cinema]);
//        }
//        foreach ($sections2 as $section2) {
//            $section2->movies()->sync($movies);
//            Ticket::factory(20)->create(['section_id' => $section2->id]);
//        }

    }
}
