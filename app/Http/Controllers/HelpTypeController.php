<?php

namespace App\Http\Controllers;

use App\HelpType;
use Illuminate\Http\Request;
use JWTAuth;

class HelpTypeController extends Controller
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
            'name' => 'required',
        ]);
        
        $help_type = new HelpType();
        $help_type->name = $request->name;

        if ($help_type->save())
        {
            return response()->json([
                'created' => true,
                'helptype' => $help_type,
            ], 201);
        }

        return response()->json([
            'created'   =>  false,
            'message' => 'El tipo de ayuda no pudo ser creado.',
        ], 500);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HelpType  $helpType
     * @return \Illuminate\Http\Response
     */
    public function show(HelpType $helpType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HelpType  $helpType
     * @return \Illuminate\Http\Response
     */
    public function edit(HelpType $helpType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HelpType  $helpType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HelpType $helpType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HelpType  $helpType
     * @return \Illuminate\Http\Response
     */
    public function destroy(HelpType $helpType)
    {
        //
    }
}
