<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(StatusTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
        $this->call(FolowsTableSeeder::class);
        $this->call(CommentLikesTableSeeder::class);
        $this->call(FriendsTableSeeder::class);
        $this->call(LikesTableSeeder::class);
        $this->call(MessagesTableSeeder::class);
        $this->call(ReplyCommentLikesTableSeeder::class);
        $this->call(ReplyCommentsTableSeeder::class);
        $this->call(SharesTableSeeder::class);
    }
}
