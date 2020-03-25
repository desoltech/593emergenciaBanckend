<?php

namespace App\Http\Controllers;

use App\HelpRequest;
use Illuminate\Http\Request;
use JWTAuth;

class HelpRequestController extends Controller
{

     /**
     * @var
     */
    protected $user;

    /**
     * TaskController constructor.
     */
    public function __construct()
    {
        $this->user = JWTAuth::parseToken()->authenticate();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $this->validate($request, [
            'user_id' => 'required',
            'type' => 'required',
            'id_help_type' => 'required',
            'ubic_coordinates' => 'required',
        ]);
        
        $help_request = new HelpRequest();
        $help_request->user_id = $request->user_id;
        $help_request->type = $request->type;
        $help_request->id_help_type = $request->id_help_type;
        $help_request->ubic_coordinates = $request->ubic_coordinates;
        $help_request->comments = $request->comments ? $request->comments : '';

        if ($help_request->save())
        {
            return response()->json([
                'created' => true,
                'helptype' => $help_request,
            ], 201);
        }

        return response()->json([
            'created'   =>  false,
            'message' => 'La solicitud no pudo ser creada.',
        ], 500);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HelpRequest  $helpRequest
     * @return \Illuminate\Http\Response
     */
    public function show(HelpRequest $helpRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HelpRequest  $helpRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(HelpRequest $helpRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HelpRequest  $helpRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HelpRequest $helpRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HelpRequest  $helpRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(HelpRequest $helpRequest)
    {
        //
    }
}
