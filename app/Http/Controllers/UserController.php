<?php

namespace App\Http\Controllers;
use App\Transaction;
use App\UserTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index()
    {
        return view('user.user-dashboard');

    }
    public function addTransactionPage()
    {
        $transactions = Transaction::all()->unique('type');

        return view('user.add-transaction',compact('transactions'));
    }

    public function myTransactionPage()
    {
        $my_transactions = UserTransaction::with('transaction')->where('user_id',Auth::id())->get();
        $incomes = $my_transactions->where('type', 'Income')->sum('value');
        $expenses = $my_transactions->where('type', 'Expense')->sum('value');

        return view('user.my-transactions',compact('my_transactions','incomes','expenses'));
    }

    public function addTransaction(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'name' => 'required',
            'value' => 'required'
        ]);

        //if transaction type is expense get wallet balance
        if ($request->type == 'Expense') {
            $my_transactions = UserTransaction::with('transaction')->where('user_id',Auth::id())->get();
            $incomes = $my_transactions->where('type', 'Income')->sum('value');
            $expenses = $my_transactions->where('type', 'Expense')->sum('value');

            $balance = $incomes - $expenses;
            // if value of expense transaction grater than balance can't add it
            if ($request->value > $balance) {
                return back()->with('no enough money',true);
            }
        }
        //check if transaction exists in pre-defined transactions
        $transaction = Transaction::where('type',$request->type)->where('name',$request->name)->first();

        if ($transaction){

            //check if transaction added previously (by name and value)
            $user_transaction = UserTransaction::where('user_id',Auth::id())
                ->where('name',$request->name)->where('value',$request->value)->first();

            if (!$user_transaction) {
                $user_transaction = new UserTransaction();
                $user_transaction->user_id = Auth::id();
                $user_transaction->type = $request->type;
                $user_transaction->name = $request->name;
                $user_transaction->value = $request->value;
                $user_transaction->save();

                return back()->with('success',true);
            }else {

                return back()->with('exists',true);
            }
        }
        else{
            $transaction = new Transaction();
            $transaction->type = $request->type;
            $transaction->name = $request->name;
            $transaction->save();

            $user_transaction = new UserTransaction();
            $user_transaction->user_id = Auth::id();
            $user_transaction->type = $request->type;
            $user_transaction->name = $request->name;
            $user_transaction->value = $request->value;
            $user_transaction->save();

            return back()->with('success',true);
        }

    }

    public function selectTransaction(Request $request)
    {
        $transaction_type = Transaction::where('type',$request->type)->get();
        $html = '';
        foreach ($transaction_type as $name){
            $html .= '<option value="'.$name->name.'">'.$name->name.'</option>';
        }

        return response()->json(['html' => $html]);
    }

}
