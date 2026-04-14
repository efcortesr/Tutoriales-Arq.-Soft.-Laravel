<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = 'Inicio';
        $viewData['subtitle'] = 'Bienvenido a la aplicación';

        return view('home.index')->with('viewData', $viewData);
    }
}
