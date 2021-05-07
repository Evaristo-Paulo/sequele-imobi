<?php

namespace App\Http\Controllers\Painel;

use Gate;
use App\User;
use App\Models\Role;
use App\Models\RoleUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Requests\UserChangePasswordRequest;

class UserController extends Controller
{
    public function list()
    {
        if (Auth::check()) {
            if (Gate::denies('just-admin-and-manager')) {
                return redirect()->back()->with('create-auth', 'Não tem permissão para listagem de dados');
            }
            $function = new User();
            $users = $function->users();

            return view('painel.users.list', compact('users'));
        }
        return redirect()->route('login.form')->with('errorMessage', 'Faça login!');
    }

    public function registerForm()
    {
        if (Auth::check()) {
            if (Gate::denies('just-admin-and-manager')) {
                return redirect()->back()->with('create-auth', 'Não tem permissão para registo dados');
            }

            return view('painel.users.register');
        }
        return redirect()->route('login')->with('errorMessage', 'Faça login!');
    }

    public function register(UserRegisterRequest $request)
    {
        try {
            $user = [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'gender_id' => $request->input('gender'),
                'password' => Hash::make($request->input('password'))
            ];

            $result = User::create($user);

            foreach ($request->input('role') as $value) {
                $roleUser = new RoleUser();
                $role_id = Role::where('type', $value)->first()->id;
                $roleUser->user_id = $result->id;
                $roleUser->role_id = $role_id;
                $roleUser->save();
            }
            return redirect()->route('users.register.form')->with('created', 'Usuário registado com sucesso');
        } catch (\Exception $e) {
            return $e->getMessage();
            //return redirect()->back()->withInput($request->all());
        }
    }

    public function updateForm($id)
    {
        if (Auth::check()) {
            $id = decrypt($id);
            if (Gate::denies('only-admin')) {
                return redirect()->route('users')->with('edit-auth', 'Não tem permissão para actualização de dados');
            }
            $user = User::find($id);

            return view('painel.users.update', compact('user'));
        }
        return redirect()->route('login')->with('errorMessage', 'Faça login!');
    }

    public function update(UserUpdateRequest $request, $id)
    {
        try {

            $user = [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'gender_id' => $request->input('gender'),
            ];

            \DB::table('users')
                ->where('id', $request->user_id)
                ->update($user);

            \DB::table('role_users')
                ->where('user_id', $request->user_id)
                ->delete();

            foreach ($request->input('role') as $value) {
                $roleUser = new RoleUser();
                $role_id = Role::where('type', $value)->first()->id;
                $roleUser->user_id = $request->user_id;
                $roleUser->role_id = $role_id;
                $roleUser->save();
            }

            return redirect()->route('users')->with('updated', 'Usuário actualizado com sucesso');
        } catch (\Exception $e) {
            return $e->getMessage();
            //return redirect()->back()->withInput($request->all());
        }
    }

    public function changePassword(UserChangePasswordRequest $request)
    {
        try {
            $id = User::where('email', $request->email)
                ->where('status', 1)
                ->first();


            if ($id) {
                $id = $id->id;

                if (Auth::user()->id == $id) {
                    /* Não pode mudar a senha do User logado */
                    return redirect()->back()->with('warning', 'Acção não autorizada ao usuário logada');
                }
                if (Gate::denies('only-admin')) {
                    return redirect()->back()->with('update-auth', 'Não tem permissão para alteração de senha')->withInput($request->all());
                }

                if ($request->input('password') == $request->input('password-same')) {
                    $user = [
                        'email' => $request->input('email'),
                        'password' => Hash::make($request->input('password')),
                    ];

                    \DB::table('users')
                        ->where('id', $id)
                        ->update($user);

                    return redirect()->back()->with('password-changed', 'Senha alterada com sucesso');
                }
                return redirect()->back()->with('password-different', 'Senhas não coencidem')->withInput($request->all());
            }

            return redirect()->back()->with('update-auth', 'Usuário não encontrado')->withInput($request->all());
        } catch (\Exception $e) {
            return redirect()->back()->with('error-exception', 'Ocorreu algum erro, verifica os dados e tenta novamente');
        }
    }

    public function remove(Request $request)
    {
        if (Auth::check()) {
            if (Gate::denies('only-admin')) {
                return redirect()->route('users')->with('delete-auth', 'Não tem permissão para remoção dados');
            }
            $user = User::find($request->input('element'));
            $user->status = 0;
            $user->save();
            return redirect()->route('users')->with('deleted', 'Usuário removido com sucesso');
        }
        return redirect()->route('login')->with('errorMessage', 'Faça login!');
    }
}
