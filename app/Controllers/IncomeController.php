<?php

namespace App\Http\Controllers;

use App\Classes\Cloudinary;
use App\Classes\Str;
use App\Income;
use App\IncomeCategory;
use App\Rules\NotAFutureDate;
use Illuminate\Http\Request;

class IncomeController extends Controller
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
        $incomes = Income::query()->currentUser()->paginate();
        return view('income.index', compact('incomes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = IncomeCategory::all();
        return view('income.add', compact('categories'));
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
            'date' => ['required', 'date', new NotAFutureDate],
            'category' => ['required', 'exists:income_categories,id'],
            'amount' => ['integer', 'min:1'],
            'description' => ['required', 'string', 'min:4',  'max:1024'],
            'picture' => ['nullable', 'image', 'max:2048']
        ]);

        $data['user_id'] = auth()->user()->id;
        $data['category_id'] = $data['category'];

        if ($request->hasFile('picture')) {
            $upload = Cloudinary::upload($request->picture);
            $data['cloudinary_url'] = $upload['secure_url'];
        }

        $income = Income::query()->create($data);

        // Create a random id from the primary key
        $income->hashed_id = Str::strFromPrimaryKey($income->id);
        $income->update();

        return redirect()->route('income.index')->with('success', 'Income record has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function show(Income $income)
    {
        return view('income.show', ['income' => $income]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function edit(Income $income)
    {
        $categories= IncomeCategory::all();
        return view('income.edit', compact('income', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Income $income)
    {
        $data = $request->validate([
            'date' => ['required', 'date', new NotAFutureDate],
            'category' => ['required', 'exists:income_categories,id'],
            'amount' => ['integer', 'min:1'],
            'description' => ['required', 'string', 'min:4',  'max:1024'],
        ]);

        $income->update($data);

        return back()->with('success', 'Income detail has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Income $income
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Income $income)
    {
        $income->delete();
        return redirect()->route('income.index')->with('success', 'Action was successful');
    }

    public function getImage(Income $income)
    {
        return response()->json( $income->cloudinary_url);
    }
}
