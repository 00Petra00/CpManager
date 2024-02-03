<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CompetitorsController extends Controller
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
        $comps = DB::select('SELECT *
                             FROM competitors, rounds, users
                             WHERE competitors.user_id = users.id and competitors.round_id = rounds.id');

        return view('competitors.index')->with('comps', $comps);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $comps = DB::select('SELECT *
                             FROM competitors, rounds, users
                             WHERE competitors.user_id = users.id and competitors.round_id = rounds.id
                               and competitors.user_id ='.$id);


        return view('competitors.mycompetitions')->with('comps', $comps);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $user_id, int $round_id)
    {
        $comps = DB::table('competitors')
        ->where('user_id', '=', $user_id)
        ->where('round_id', '=', $round_id)
        ->delete();

        if(auth()->user()->name !== 'admin' || auth()->user()->email !== 'admin@admin.com'){
            return redirect('/competitions')->with('error', 'Unauthorized Page');
        }
        return response()->json(['success' => true, 'message' => 'Competitor Removed']);
        //return redirect('/competitors')->with('success', 'Competitor Removed');

    }
}
