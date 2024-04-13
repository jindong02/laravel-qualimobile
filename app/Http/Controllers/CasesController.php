<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use App\Models\Cases;

class CasesController extends Controller
{

    public function index()
    {
        Paginator::defaultView('layouts/paginacao');

        $destaque = Cases::orderBy('id', 'DESC')->first();

        return view('cases/index', [
            'destaque' => $destaque,
            'cases' => Cases::where('id', '!=', $destaque->id)->orderBy('id', 'DESC')->paginate(6)
        ]);
    }

    public function show($id)
    {
        $case = Cases::find($id);

        if ($case) {
            return view('cases/show', [
                'case' => $case,
                'cases' => Cases::where('id', '!=', $case->id)->inRandomOrder()->limit(3)->get(),
            ]);
        }

        return redirect()->route('cases.index');
    }
}
