<?php

namespace App\Http\Controllers;

use App\Models\Sondage;
//use App\Http\Resources\SondageResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SondageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try {
            return Sondage::all();
        }
        catch(\Illuminate\Database\QueryException $e) {
            Log::error('Erreur accès base de données');
            return response()->json(['message' => 'Ressource indisponible.'], 503);
        }
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
    public function show(Sondage $sondage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sondage $sondage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sondage $sondage)
    {
        //
    }
}
