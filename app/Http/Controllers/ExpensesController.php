<?php

namespace App\Http\Controllers;

use App\Classes\Str;
use App\Expense;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ExpensesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        // Is this the user's first time vicing the "home"
        // page? If so greet appropriately so say
        // "Welcome" instead of "Welcome Back"
        $first_timer = false;
        if (session()->has('first_timer')) {
            $first_timer = true;
        }
        $expenses = $user->expenses()->paginate();
        return  view('home', compact('user', 'expenses', 'first_timer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'item' => ['required', 'string', 'min:3', 'max:255'],
            'description' => ['nullable', 'string', 'min:4'],
            'date' => ['required', 'date'],
            'amount' => ['required', 'integer', 'min:1']
        ]);

        $data['date'] = Carbon::parse($data['date'])->toDateTimeString();
        $data['user_id'] = auth()->user()->id;

        $expense = Expense::query()->create($data);
        $expense->update(['hashed_id' => Str::strFromPrimaryKey($expense->id)]);

        return back()->with('success', 'Expense item added successfully. You may add another one');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense)
    {
        return  view('edit', compact('expense'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expense $expense)
    {
        $data = $request->validate([
            'item' => ['required', 'string', 'min:3', 'max:255'],
            'description' => ['nullable', 'string', 'min:4'],
            'date' => ['required', 'date'],
            'amount' => ['required', 'integer', 'min:1']
        ]);

        $data['date'] = Carbon::parse($data['date'])->toDateTimeString();

        $expense->update($data);

        return back()->with('success', 'Item has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Expense $expense
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Expense $expense)
    {
        $expense->delete();
        return  redirect()->route('expenses.index')->with('success', "Item has been deleted");
    }

    /**
     * Display expenses report
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function report()
    {
        $week = Expense::query()->whereBetween('date', [
            now()->startOfWeek()->toDateTimeString(), now()->endOfWeek()->toDateTimeString()
        ])->currentUser()->get();

        $month = Expense::query()->whereBetween('date', [
            now()->startOfMonth()->toDateTimeString(), now()->endOfMonth()->toDateTimeString()
        ])->currentUser()->get();

        $year = Expense::query()->whereBetween('date', [
            now()->startOfYear()->toDateTimeString(), now()->endOfYear()->toDateTimeString()
        ])->currentUser()->get();

        $all_time = Expense::currentUser()->get();

        return view('report', compact('week', 'month', 'year', 'all_time'));
    }

    public function customRangeReport(Request $request)
    {
        $request->validate([
            'from' => ['required', 'date'],
            'to' => ['required', 'date'],
        ]);

        $records = Expense::query()->whereBetween('date', [
            Carbon::parse($request->from)->toDateTimeString(), Carbon::parse($request->to)->toDateTimeString()
        ])->currentUser()->get();

        $total = number_format($records->sum('amount'));

        // Format The dates
        $records = $records->toArray();
        $records = array_map(function ($item) {
             $item['date'] = date('Y-m-d', strtotime($item['date']));
             return $item;
        }, $records);

        return response()->json(compact('total', 'records'));
    }
}
