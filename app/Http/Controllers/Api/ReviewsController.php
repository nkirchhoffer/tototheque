<?php

namespace App\Http\Controllers\Api;

use App\Book;
use App\Events\NewReviewEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateReviewRequest;
use App\Review;

class ReviewsController extends Controller
{
    public function submit(CreateReviewRequest $request, Book $book)
    {
        $title = $request->get('title');
        $comment = $request->get('comment');
        $note = $request->get('note');

        $review = new Review();
        $review->title = $title;
        $review->comment = $comment;
        $review->note = $note;
        $review->user_id = $request->user()->id;
        $review->book_id = $book->id;
        $review->save();

        broadcast(new NewReviewEvent($review))->toOthers();

        return $review->load(['author']);
    }
}
