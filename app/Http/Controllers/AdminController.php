<?php

namespace App\Http\Controllers;

use App\User;
use App\UserTransaction;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::with('userTransactions')->where('role','!=','admin')->get();

        foreach ($users as $user) {
            $user['incomes'] = UserTransaction::where('type', 'Income')->where('user_id',$user->id)->sum('value');
            $user['expenses'] = UserTransaction::where('type', 'Expense')->where('user_id',$user->id)->sum('value');
        }

        return view('admin.admin-dashboard',compact('users'));
    }
}
