<?php

namespace App\Http\Controllers;

class BorrowingsController extends Controller
{
    private $auth;

    public function __construct(AuthManager $auth)
    {
        $this->auth = $auth;

        $this->middleware('auth');
    }

    public function cancel(Borrowing $borrowing)
    {
        //
    }
}
