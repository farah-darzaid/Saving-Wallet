<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transactions')->insert([
            [
                'type' => 'Incomes',
                'name' => 'Salary'
            ],
            [
                'type' => 'Expenses',
                'name' => 'Food'
            ]
        ]);
    }
}
