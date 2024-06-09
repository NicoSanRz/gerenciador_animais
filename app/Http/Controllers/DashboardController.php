<?php

namespace App\Http\Controllers;
use App\Models\AnimaisModel;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $animais = AnimaisModel::all();
        return view('dashboard', compact('animais'));
    }
}
