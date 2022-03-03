<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class mavue extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = Http::get('http://127.0.0.1:8001/api/employe');
        $resp = Http::get('http://127.0.0.1:8001/api/poste');

        $emp = json_decode($response);
        $post = json_decode($resp);

        return view("mavue", compact('emp', 'post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $emp = $request->input('employe');
        $pos = $request->input('poste');
        $det = $request->input('detail');

        $response = Http::post('http://127.0.0.1:8001/api/contrats', [
            'detail_contrat' => $det,
            'employe_id' => $emp,
            'post_id' => $pos,
        ]);
        
       // dd($response);
        return redirect()->route('mavue');
    }

}
