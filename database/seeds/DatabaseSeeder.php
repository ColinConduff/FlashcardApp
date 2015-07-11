<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\User;
use App\Review;
use App\Post;
use App\Permission;
use App\Note;
use App\Flashcard;
use App\Deck;
use App\Comment;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call('UserTableSeeder');

        Model::reguard();

        $user1 = User::create([
            'name' => 'test10',
            'email' => 'email10@gmail.com',
            'password' => bcrypt('password10'),
            'share_email' => true
        ]);

        $user2 = User::create([
            'name' => 'test2',
            'email' => 'email2@gmail.com',
            'password' => bcrypt('password2'),
            'share_email' => true
        ]);

        $user3 = User::create([
            'name' => 'test3',
            'email' => 'email3@gmail.com',
            'password' => bcrypt('password3'),
            'share_email' => true
        ]);

        $deck1 = Deck::create([
            'user_id' => $user1->id,
            'average_rating' => 3,
            'title' => 'DB_Test1',
            'subject' => 'Databases',
            'private' => false
        ]);

        $deck2 = Deck::create([
            'user_id' => $user1->id,
            'average_rating' => 4,
            'title' => 'DB_Test2',
            'subject' => 'Databases',
            'private' => false
        ]);

        $deck3 = Deck::create([
            'user_id' => $user2->id,
            'average_rating' => 5,
            'title' => 'DB_Test3',
            'subject' => 'Algorithms',
            'private' => false
        ]);

        $deck4 = Deck::create([
            'user_id' => $user3->id,
            'average_rating' => 2,
            'title' => 'DB_Test4',
            'subject' => 'Algorithms',
            'private' => false
        ]);

        $flashcard1 = Flashcard::create([
            'deck_id' => $deck1->id,
            'front' => 'testFront2',
            'back' => 'testBack2',
            'number_of_attempts' => 3,
            'number_correct' => 2,
            'ratio_correct' => .67
        ]);

        $flashcard2 = Flashcard::create([
            'deck_id' => $deck1->id,
            'front' => 'testFront3',
            'back' => 'testBack3',
            'number_of_attempts' => 4,
            'number_correct' => 2,
            'ratio_correct' => .50
        ]);

        $flashcard3 = Flashcard::create([
            'deck_id' => $deck1->id,
            'front' => 'testFront4',
            'back' => 'testBack4',
            'number_of_attempts' => 4,
            'number_correct' => 2,
            'ratio_correct' => .50
        ]);

        $flashcard4 = Flashcard::create([
            'deck_id' => $deck2->id,
            'front' => 'testFront5',
            'back' => 'testBack5',
            'number_of_attempts' => 4,
            'number_correct' => 2,
            'ratio_correct' => .50
        ]);

        $flashcard5 = Flashcard::create([
            'deck_id' => $deck3->id,
            'front' => 'testFront6',
            'back' => 'testBack6',
            'number_of_attempts' => 4,
            'number_correct' => 2,
            'ratio_correct' => .50
        ]);

        $flashcard6 = Flashcard::create([
            'deck_id' => $deck4->id,
            'front' => 'testFront7',
            'back' => 'testBack7',
            'number_of_attempts' => 4,
            'number_correct' => 2,
            'ratio_correct' => .50
        ]);

        $review1 = Review::create([
            'user_id' => $user1->id,
            'deck_id' => $deck3->id,
            'rating' => 3,
            'title' => 'reviewTitle1',
            'body' => 'reviewBody1',
            'published_at' => Carbon::now()
        ]);

        $review2 = Review::create([
            'user_id' => $user2->id,
            'deck_id' => $deck1->id,
            'rating' => 4,
            'title' => 'reviewTitle2',
            'body' => 'reviewBody2',
            'published_at' => Carbon::now()
        ]);

        $review3 = Review::create([
            'user_id' => $user3->id,
            'deck_id' => $deck2->id,
            'rating' => 5,
            'title' => 'reviewTitle3',
            'body' => 'reviewBody3',
            'published_at' => Carbon::now()
        ]);

        $note1 = Note::create([
            'user_id' => $user1->id,
            'flashcard_id' => $flashcard5->id,
            'score' => 10,
            'body' => 'noteBody1',
            'published_at' => Carbon::now()
        ]);

        $note2 = Note::create([
            'user_id' => $user2->id,
            'flashcard_id' => $flashcard1->id,
            'score' => 12,
            'body' => 'noteBody2',
            'published_at' => Carbon::now()
        ]);

        $note3 = Note::create([
            'user_id' => $user3->id,
            'flashcard_id' => $flashcard1->id,
            'score' => 13,
            'body' => 'noteBody3',
            'published_at' => Carbon::now()
        ]);

        $note4 = Note::create([
            'user_id' => $user3->id,
            'flashcard_id' => $flashcard1->id,
            'score' => 18,
            'body' => 'noteBody4',
            'published_at' => Carbon::now()
        ]);

        $post1 = Post::create([
            'user_id' => $user1->id,
            'title' => 'postTitle1',
            'body' => 'postBody1',
            'topic' => 'topic1',
            'score' => 12,
            'published_at' => Carbon::now()
        ]);

        $post2 = Post::create([
            'user_id' => $user2->id,
            'title' => 'postTitle2',
            'body' => 'postBody2',
            'topic' => 'topic1',
            'score' => 21,
            'published_at' => Carbon::now()
        ]);

        $post3 = Post::create([
            'user_id' => $user3->id,
            'title' => 'postTitle3',
            'body' => 'postBody3',
            'topic' => 'topic2',
            'score' => 122,
            'published_at' => Carbon::now()
        ]);

        $post4 = Post::create([
            'user_id' => $user1->id,
            'title' => 'postTitle4',
            'body' => 'postBody4',
            'topic' => 'topic2',
            'score' => 132,
            'published_at' => Carbon::now()
        ]);

        $post5 = Post::create([
            'user_id' => $user2->id,
            'title' => 'postTitle5',
            'body' => 'postBody5',
            'topic' => 'topic3',
            'score' => 133,
            'published_at' => Carbon::now()
        ]);

        $comment1 = Comment::create([
            'user_id' => $user1->id,
            'post_id' => $post2->id,
            'score' => 18,
            'body' => 'commentBody1',
            'published_at' => Carbon::now()
        ]);

        $comment2 = Comment::create([
            'user_id' => $user2->id,
            'post_id' => $post1->id,
            'score' => 12,
            'body' => 'commentBody2',
            'published_at' => Carbon::now()
        ]);

        $comment3 = Comment::create([
            'user_id' => $user3->id,
            'post_id' => $post2->id,
            'score' => 13,
            'body' => 'commentBody3',
            'published_at' => Carbon::now()
        ]);

        $comment4 = Comment::create([
            'user_id' => $user3->id,
            'post_id' => $post2->id,
            'score' => 16,
            'body' => 'commentBody4',
            'published_at' => Carbon::now()
        ]);

        $permission1 = Permission::create([
            'user_id' => $user1->id,
            'deck_id' => $deck3->id,
            'title' => 'moderator',
        ]);

        $permission2 = Permission::create([
            'user_id' => $user1->id,
            'deck_id' => $deck4->id,
            'title' => 'editor',
        ]);

    }
}
