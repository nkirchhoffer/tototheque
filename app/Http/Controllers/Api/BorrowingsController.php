<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Book;
use App\Borrowing;
use App\Replica;

class BorrowingsController extends Controller {

    public function create(Request $request, Book $book) {
        $auth = $request->user();
        
        $replicas = Borrowing::where('ended_at', '>', now())->andWhere('returned_at', '!=', null)->get();
        
    }

}