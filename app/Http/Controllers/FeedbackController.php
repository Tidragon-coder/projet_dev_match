<?php

namespace App\Http\Controllers;

use App\Models\Projet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Projet::with('user')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    // Ajouter un projet

    

}
