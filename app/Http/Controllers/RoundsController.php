<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Round;
use App\Models\Competition;
use DB;

class RoundsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $name, int $year)
    {
        $comp = new Competition;
        $comp->name = $name;
        $comp->year = $year;
        $round1 = DB::select('SELECT*
                               FROM rounds
                               WHERE "'.$name.'" = competition_name and "'.$year.'" = competition_year
                               and (round = "1st round" or round = "2nd round" or round = "3rd round" or round = "4th round" or round = "5th round" or round = "final round")');

        $cr = count($round1) + 1;
        switch ($cr) {
            case 1:
                $default = "1st round";
                break;
            case 2:
                $default = "2nd round";
                break;
            case 3:
                $default = "3rd round";
                break;
            case 4:
                $default = "4th round";
                break;
            case 5:
                $default = "5th round";
                break;
            case 6:
                $default = "final round";
                break;
        }
        return view('rounds.create')->withComp($comp)->withDefault($default);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $name, int $year)
    {
        $this->validate($request, [
            'round' => 'required',
            'deadline' => 'required'
        ]);

        $round = DB::table('rounds')
        ->where('competition_name', '=', $name)
        ->where('competition_year', '=', $year)
        ->where('round', '=', $request->input('round'))
        ->first();

        if (isset($round)) {
            return redirect('/competitions/'.$name.'/'.$year)->with('error', 'This round already exists!');
        }


        $round = new Round;
        $round->round = $request->input('round');
        $round->description = $request->input('description') ?? '';
        $round->competition_name = $name;
        $round->competition_year = $year;
        $round->deadline = $request->input('deadline');
        $round->save();

        return redirect('/competitions/'.$name.'/'.$year)->with('success', 'Round Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $round = Round::find($id);

        return view('rounds.show')->with('round', $round);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $round = Round::find($id);

        if(auth()->user()->name !== 'admin' || auth()->user()->email !== 'admin@admin.com'){
            return redirect('/competitions')->with('error', 'Unauthorized Page');
        }

        return view('rounds.edit')->with('round', $round);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $round = Round::find($id);
        $round->description = $request->input('description');
        $round->deadline = $request->input('deadline');
        $round->save();

        return redirect('/competitions/'.$round->competition_name.'/'.$round->competition_year)->with('success', 'Round Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $round = Round::find($id);
        $round->delete();

        if(auth()->user()->name !== 'admin' || auth()->user()->email !== 'admin@admin.com'){
            return redirect('/competitions')->with('error', 'Unauthorized Page');
        }

        return redirect('/competitions/'.$round->competition_name.'/'.$round->competition_year)->with('success', 'Competition Removed');
    }
}
