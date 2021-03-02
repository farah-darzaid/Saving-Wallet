<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\User;
use App\UserTransaction;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
//        $users = User::with('userTransactions.transaction')->get();
//
//        foreach ($users as $user) {
//            $transaction = UserTransaction::with('transaction')->where('user_id',$user->id)->get();
////            $records->where('type', 'Income')->sum('amount');
//            dd($transaction );
//        }

//        $users = User::with('userTransactions.transaction')->get();
////
//        foreach ($users as $user) {
//            $user_transactions = UserTransaction::where('user_id',$user->id)->get();
//            foreach ($user_transactions as $user_transaction) {
//                $transaction = Transaction::with('userTransaction')->where('id',$user_transaction->id)->get();
//
//                $income = $transaction->where('type', 'Income')->sum('userTransaction.value');
//
//            }
//
////            foreach ($user['transactions'] as $transaction) {
//
////                $userTransaction = UserTransaction::with('transaction')->where('user_id',$user->id)->get();
//////                $incomes = $userTransaction->with(['transaction'])->get();
//////                where('type', 'Income')->sum('amount');
//
//            }
//        }

        $users = User::with('userTransactions')->where('role','!=','admin')->get();

        foreach ($users as $user) {
            $user['incomes'] = UserTransaction::where('type', 'Income')->where('user_id',$user->id)->sum('value');
            $user['expenses'] = UserTransaction::where('type', 'Expense')->where('user_id',$user->id)->sum('value');
        }




        return view('admin.admin-dashboard',compact('users'));
    }
}
