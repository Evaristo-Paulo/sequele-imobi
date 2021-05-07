<?php

namespace App\Http\Controllers\Painel;

use App\User;
use Gate;
use App\Interest;
use App\Apartament;
use App\Collaborator;
use App\Models\RoleUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginAuthRequest;

class MainController extends Controller
{
    public function home()
    {
        try {
            if (Auth::check()) {

                $function = new Apartament();
                $cont_apt = count($function->apartments());

                $function = new Collaborator();
                $collaborators = $function->collaborators();

                $cont_collab = count($collaborators);

                $function = new Interest();
                $cont_interest = count($function->interests());

                if (!Gate::denies('only-collaborator')) {
                    $function = new Interest();
                    $cont_interest = count($function->interestByCollaborator(Auth::user()->id));
                    $function = new Apartament();
                    $cont_apt = count($function->apartmentByCollaborator(Auth::user()->id));
                }

                return view('painel.home', compact('cont_apt', 'cont_collab', 'cont_interest'));
            }

            return redirect()->route('login')->with('errorMessage', 'Precisas estar autenticado');
        } catch (\Exception $th) {
            redirect()->back()->with('errorMessage', $th->getMessage());
        }
    }

    public function loginForm()
    {
        return view('painel.auth.login');
    }

    public function login(LoginAuthRequest $request)
    {
        try {

            $credentials = [
                'email' => $request->input('email'),
                'password' => $request->input('password')
            ];

            if (Auth::attempt($credentials)) {
                Auth::logoutOtherDevices($request->input('password'));
                /* Fez autenticação */
                $user = auth()->user();
                Auth::login($user);

                if ( Auth::user()->status == 0 ){
                    Auth::logout();
                    return redirect()->route('login')->with('errorMessage', 'Email ou senha não encontrada')->withInput($request->all());
                }

                return redirect()->route('home');
            }
            return redirect()->route('login')->with('errorMessage', 'Email ou senha não encontrada')->withInput($request->all());
        } catch (\Exception $e) {
            return redirect()->route('login')->with('errorMessage', $e->getMessage());
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
