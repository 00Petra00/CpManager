<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Competition;
use DB;
use Illuminate\Pagination\LengthAwarePaginator;

class CompetitionsController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return Competition::all();

        $comps = DB::select('SELECT * FROM competitions');
        $comps =Competition::orderBy('year', 'desc')->get();

        return view('competitions.index')->with('comps', $comps);


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('competitions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'year' => 'required'
        ]);

        if($request->input('year') > date("Y")+10){
            return redirect('/competitions/create')->with('error', 'The year cannot be greater than '.date("Y")+10);
        }

        $comp = DB::table('competitions')
        ->where('competitions.name', '=', $request->input('name'))
        ->where('year', '=', $request->input('year'))
        ->first();

        if (isset($comp)) {
            return redirect('/competitions/create')->with('error', 'This compatition already exists!');
        }

        $comp = new Competition;
        $comp->name = $request->input('name');
        $comp->year = $request->input('year');
        $comp->description =$request->input('description') ?? '';
        $comp->save();

        return redirect('/competitions')->with('success', 'Competition Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $name, int $year)
    {
        $comp = DB::table('competitions')
        ->where('competitions.name', '=', $name)
        ->where('year', '=', $year)
        ->first();

        $rounds = DB::table('rounds')
        ->where('competition_name', '=', $name)
        ->where('competition_year', '=', $year)
        ->orderby('round')
        ->get();

       return view('competitions.show')->withComp($comp)->withRounds($rounds);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $name, int $year)
    {
        $comp = DB::table('competitions')
        ->where('name', '=', $name)
        ->where('year', '=', $year)
        ->first();

        if(auth()->user()->name !== 'admin' || auth()->user()->email !== 'admin@admin.com'){
            return redirect('/competitions')->with('error', 'Unauthorized Page');
        }

        return view('competitions.edit')->with('comp', $comp);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $name, int $year)
    {
        $this->validate($request, [
            'name' => 'required',
            'year' => 'required'
        ]);
        $comp = DB::table('competitions')
        ->where('competitions.name', '=', $request->input('name'))
        ->where('year', '=', $request->input('year'))
        ->first();

        if (isset($comp) && ($comp->name != $name  || $comp->year != $year)) {
            return redirect('/competitions/'.$name.'/'.$year.'/edit')->with('error', 'This compatition already exists!');
        }

        $comp = DB::table('competitions')
        ->where('name', '=', $name)
        ->where('year', '=', $year)
        ->update(['name' => $request->input('name'),
                  'year' => $request->input('year'),
                  'description' =>$request->input('description')
                ]);

        return redirect('/competitions')->with('success', 'Competition Updated');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $name, int $year)
    {
        if(auth()->user()->name !== 'admin' || auth()->user()->email !== 'admin@admin.com'){
            return redirect('/competitions')->with('error', 'Unauthorized Page');
        }

        $comps = DB::table('competitions')
        ->where('name', '=', $name)
        ->where('year', '=', $year)
        ->delete();

        return redirect('/competitions')->with('success', 'Competition Removed');

    }
}
