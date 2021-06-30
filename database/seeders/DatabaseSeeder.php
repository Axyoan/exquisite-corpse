<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Drawing;
use App\Models\Story;
use App\Models\Comment;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            UserSeeder::class,
            StorySeeder::class,
            DrawingSeeder::class,
            CommentSeeder::class
        ]);
        $users = User::all();

        ///Populate pivot table drawing_user
        $drawings = Drawing::all();
        foreach ($drawings as $drawing) {
            $drawing->users()->attach(
                $users->random(2)->pluck('id')->toArray()
            );
        }

        //Populate pivot table story_user
        $stories = Story::all();
        foreach ($stories as $story) {
            $story->users()->attach(
                $users->random(rand(2, min(count($users), strlen($story->text) / 200)))->pluck('id')->toArray()
            );
        }

        //Assign posts to comments
        $comments = Comment::all();
        foreach ($comments as $comment) {
            if (rand(0, 1) == 1) {
                //drawing
                $comment->commentable_type = 'App\Models\Drawing';

                $drawing_id = Drawing::where('isFinished', true)->orderByRaw('RAND()')->take(1)->first()->id;
                $comment->commentable_id = $drawing_id;
                $comment->save();
            } else {
                //story
                $comment->commentable_type = 'App\Models\Story';
                $comment->commentable_id = Story::where('isFinished', true)->orderByRaw('RAND()')->take(1)->first()->id;
                $comment->save();
            }
        }
    }
}
