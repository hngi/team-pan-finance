<?php

namespace App\Console\Commands;

use App\Classes\Str;
use Illuminate\Console\Command;

class HashExpensesIds extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'expenses:hash-ids';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Hash Expenses Ids';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $expenses = \App\Expense::all();
        foreach ($expenses as $expense) {
            $hashId = Str::strFromPrimaryKey($expense->id);
            $expense->hashed_id = $hashId;
            $expense->update();
            $this->line("Updated hashed id for #{$expense->id} to {$expense->hashed_id}");
        }

        $this->info("Completed");
    }
}
