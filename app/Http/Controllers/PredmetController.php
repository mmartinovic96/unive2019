<?php

namespace App\Http\Controllers;

use App\Predmet;
use Illuminate\Http\Request;

class PredmetController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $predmets = Predmet::all();
        //dd($predmets);
//        echo '<ul>';
//        foreach ($predmets as $key => $p) {
//          echo '<li>'.$p->nazpred.'</li>';;
//        }
//        echo '</ul>';
        return view('predmet.index', compact('predmets'));
    }

    public function top10() {
        $predmets = Predmet::orderBy('upisanostud', 'desc')->take(10)->get();
        return view('childprimjer', compact('predmets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('predmet.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Predmet  $predmet
     * @return \Illuminate\Http\Response
     */
    public function show(Predmet $predmet) {

        // $predmet=\App\Predmer::find($id)

        return view('predmet.show', ['predmet' => $predmet]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Predmet  $predmet
     * @return \Illuminate\Http\Response
     */
    public function edit(Predmet $predmet) {
        return view('predmet.edit', ['predmet' => $predmet]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Predmet  $predmet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Predmet $predmet) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Predmet  $predmet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Predmet $predmet) {
        //
    }

}
