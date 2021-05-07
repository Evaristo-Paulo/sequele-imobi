<?php

namespace App\Http\Controllers\site;

use App\Apartament;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function home()
    {
        return view('site.home');
    }
    public function catalog()
    {
        $function = new Apartament ();
        $catalogs = $function->catalog_apartments();

        return view('site.catalog', compact('catalogs'));
    }
    public function detailApartament($id)
    {
        $id = decrypt($id);
        $function = new Apartament();
        $apartment = $function->apartment_detail($id);
        return view('site.detail', compact('apartment'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->back();
    }

    public function catalogFiltragem( Request $request ){
        $function = new Apartament ();
        $catalogs = $function->catalog_apartment_filter($request->input('price'), $request->input('topology'), $request->input('business'));

        $request->session()->flash('success', 'Filtragem efectuada');
        return view('site.catalog', compact('catalogs'));
    }
}
