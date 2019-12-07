<?php

use App\Post;
use App\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->truncate();

        $php = new Tag();
        $php->name = "PHP";
        $php->slug = "php";
        $php->save();

        $laravel = new Tag();
        $laravel->name = "Laravel";
        $laravel->slug = "laravel";
        $laravel->save();

        $symphony = new Tag();
        $symphony->name = "Symphony";
        $symphony->slug = "symphony";
        $symphony->save();

        $vue = new Tag();
        $vue->name = "Vue js";
        $vue->slug = "vuejs";
        $vue->save();

        $tags = [
            $php->id,
            $laravel->id,
            $symphony->id,
            $vue
        ];
        foreach (Post::all() as $post)
        {
            shuffle($tags);

            for ($i = 0; $i < rand(0, count($tags)-1); $i++)
            {
                $post->tags()->detach($tags[$i]);
                $post->tags()->attach($tags[$i]);

            }
        }
    }
}
