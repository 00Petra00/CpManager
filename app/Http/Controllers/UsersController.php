<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Models\Competitor;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
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
        $users = DB::select('SELECT * FROM users');
        return view('users.index')->with('users', $users);
    }

    public function assigns($user_id)
    {

        $mytime = Carbon::now()->format("Y-m-d");
        $results = DB::select('SELECT*
                               FROM competitions, rounds
                               WHERE name = competition_name and year = competition_year
                               ORDER BY deadline');

        return view('users.assigns')->withResults($results)->withUser($user_id)->withMytime($mytime);
    }

    public function competitor(int $user_id, int $round_id)
    {

        $res = DB::table('competitors')
        ->where('user_id', '=', $user_id)
        ->where('round_id', '=', $round_id)
        ->first();

        if (isset($res)) {
            return redirect('/users')->with('error', 'This competitor already exists!');
        }

        $competitor = new Competitor;
        $competitor->user_id =$user_id;
        $competitor->round_id = $round_id;
        $competitor->save();

        return redirect('/users')->with('success', 'Successful assignment');
    }

    public function profile(int $id){

        $user = User::find($id);

        return view('users.profile')->with('user', $user);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $user = User::find($id);

        return view('users.edit')->with('user', $user);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {

        $user = User::find($id);
        if (!(Hash::check($request->input('old'), $user->password))){
            return redirect('/users/'.$id)->with('error', 'Wrong Password');
        }
        $user->password = Hash::make($request->input('new'));
        $user->save();

        return redirect('/users/'.$id)->with('success', 'Successful password change');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
