<?php

use App\Affiliation;
use App\Collection;
use App\Comment;
use App\Content;
use App\Organization;
use App\OrganizationUser;
use App\Post;
use App\Profile;
use App\Series;
use App\Tag;
use App\User;
use App\Video;
use Illuminate\Database\Seeder;

class tempseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Affiliation::factory()->count(50)->create();
        // factory(Affiliation::class,50)->create();
        factory(User::class,50)->create();
        factory(Profile::class,50)->create();
        factory(Post::class,50)->create();
        factory(Affiliation::class,50)->create();
        factory(Video::class,50)->create();
        factory(Series::class,50)->create();
        factory(Collection::class,50)->create();
        factory(Comment::class,50)->create();
        factory(Organization::class,50)->create();
        factory(OrganizationUser::class,50)->create();
        factory(Content::class,50)->create();
    }
}
