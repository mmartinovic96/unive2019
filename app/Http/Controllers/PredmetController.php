<?php

namespace App\Http\Controllers;
use App\Predmet;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use function view;

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
        // dd($request);
        $validator = Validator::make($request->all(), [
                    "kratpred" => 'string|max:8',
                    "nazpred" => 'required|string|max:60',
                    "siforgjed" => 'numeric|between:100000,100020',
                    "upisanostud" => 'numeric|digits_between:0,2',
                    "brojsatitjedno" => 'numeric|between:1,10'
        ]);
        if ($validator->fails()) {
            Session::flash('error', 'Greška!');  // $_SESSION['error']='Greška!'
            return redirect('predmets/create')
                            ->withErrors($validator)
                            ->withInput();
        } else {
            // store
            $p = new Predmet();
            $p->kratpred = $request->input('kratpred');
            $p->nazpred = $request->input('nazpred');
            $p->siforgjed = $request->input('siforgjed');
            $p->upisanostud = $request->input('upisanostud');
            $p->brojsatitjedno = $request->input('brojsatitjedno');
            $p->save();
            // redirect
            Session::flash('message', 'Uspješno dodan predmet!');
            //return Redirect::to('mobitels');
            return redirect()->route('predmets.index');
        }
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

        $validator = Validator::make($request->all(), [
                    "kratpred" => 'string|max:8',
                    "nazpred" => 'required|string|max:60',
                    "siforgjed" => 'numeric|between:100000,100020',
                    "upisanostud" => 'numeric|digits_between:0,2',
                    "brojsatitjedno" => 'numeric|between:1,10'
        ]);
        if ($validator->fails()) {
            Session::flash('error', 'Greška!');  // $_SESSION['error']='Greška!'
            return redirect('predmets/create')
                            ->withErrors($validator)
                            ->withInput();
        } else {
            // store

            $predmet->kratpred = $request->input('kratpred');
            $predmet->nazpred = $request->input('nazpred');
            $predmet->siforgjed = $request->input('siforgjed');
            $predmet->upisanostud = $request->input('upisanostud');
            $predmet->brojsatitjedno = $request->input('brojsatitjedno');
            $predmet->save();
            // redirect
            Session::flash('message', 'Uspješno izmjenjen predmet!');
            //return Redirect::to('mobitels');
            return redirect()->route('predmets.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Predmet  $predmet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Predmet $predmet) {
     $predmet->delete();
    Session::flash('message', 'Predmet obrisan!');
    return redirect()->route('predmets.index');
    }

}
