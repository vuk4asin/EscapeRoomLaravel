<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Game;
use Illuminate\Http\Request;
Use DB;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservation = Reservation::all();
        return $reservation;
    }

    public function getReservations(Request $request)
    {

        $city = $request->city;
        $date = $request->date;

        $reservations = DB::select(DB::raw("
        Select * from reservations inner join games on reservations.game_id = games.id
        WHERE reservations.date = '$date' AND games.city = '$city'
        "));

        return $reservations;
    }

   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('welcome');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $game_id = Game::where('city', $request->city)->first()->id;
        // dd($game_id);
        Reservation::create([
            'game_id' => $game_id,
            'time' => $request->time,
            'date' => $request->date
        ]);

        return response()->json("Succesfully created!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}
