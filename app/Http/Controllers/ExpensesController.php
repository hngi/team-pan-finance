<?php

namespace App\Http\Controllers;

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
        return  view('home', compact('user'));
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

        Expense::query()->create($data);

        return back()->with('success', 'Expense item added successfully. You may add another one');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expense)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $expense)
    {
        //
    }

    /**
     * Display expenses report
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function report()
    {
        $week = Expense::query()->whereBetween('date', [
            now()->startOfWeek()->toDateTimeString(), now()->endOfWeek()->toDateTimeString()
        ])->currentUser()->sum('amount');

        $month = Expense::query()->whereBetween('date', [
            now()->startOfMonth()->toDateTimeString(), now()->endOfMonth()->toDateTimeString()
        ])->currentUser()->sum('amount');

        $year = Expense::query()->whereBetween('date', [
            now()->startOfYear()->toDateTimeString(), now()->endOfYear()->toDateTimeString()
        ])->currentUser()->sum('amount');

        return view('report', compact('week', 'month', 'year'));
    }

    public function customRangeReport(Request $request)
    {
        $request->validate([
            'from' => ['required', 'date'],
            'to' => ['required', 'date'],
        ]);

        $total = Expense::query()->whereBetween('date', [
            Carbon::parse($request->from)->toDateTimeString(), Carbon::parse($request->to)->toDateTimeString()
        ])->currentUser()->sum('amount');

        return response()->json(['total' => $total]);
    }
}
