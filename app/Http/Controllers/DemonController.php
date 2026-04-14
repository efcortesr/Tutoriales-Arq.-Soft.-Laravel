<?php

namespace App\Http\Controllers;

use App\Models\Demon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DemonController extends Controller
{
    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = 'Registrar demonio';
        $viewData['subtitle'] = 'Registrar demonio';

        return view('demon.create')->with('viewData', $viewData);
    }

    public function save(Request $request): RedirectResponse
    {
        Demon::validate($request);

        Demon::create([
            'name' => $request->input('name'),
            'blood_amount' => $request->input('blood_amount'),
            'hierarchy' => $request->input('hierarchy'),
        ]);

        return redirect()->route('demon.create')
            ->with('success', 'Demon created successfully');
    }

    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = 'Lista de demonios';
        $viewData['subtitle'] = 'Lista de demonios';
        $viewData['demons'] = Demon::orderBy('id', 'asc')->get();

        return view('demon.index')->with('viewData', $viewData);
    }

    public function statistics(): View
    {
        $viewData = [];
        $viewData['title'] = 'Estadísticas de demonios';
        $viewData['subtitle'] = 'Estadísticas de demonios';
        $viewData['kingCount'] = Demon::where('hierarchy', 'rey')->count();
        $viewData['moonCount'] = Demon::where('hierarchy', 'luna')->count();
        $viewData['commonCount'] = Demon::where('hierarchy', 'comun')->count();
        $viewData['maxBloodAmount'] = Demon::max('blood_amount') ?? 0;

        return view('demon.statistics')->with('viewData', $viewData);
    }
}
