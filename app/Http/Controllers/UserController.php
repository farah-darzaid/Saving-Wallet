<?php

namespace App\Http\Controllers;

use App\Category;
use App\UserCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function addTransactionPage()
    {
        $categories = Category::all();

        return view('user.add-transaction',compact('categories'));
    }

    public function myTransactionPage()
    {
        return view('user.my-transactions');
    }

    public function addTransaction(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'name' => 'required',
            'value' => 'required'
        ]);

        $user_category = new UserCategory();
        $user_category->user_id = Auth::id();
        $user_category->category_id = $request->type;
        $user_category->save();

        return back()->with('success',true);
    }
}
