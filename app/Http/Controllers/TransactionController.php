<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    //
    public function newTransaction()
    {
        return view('new-transaction');
    }
    public function editTransaction()
    {
        return view('edit-transaction');
    }
}
