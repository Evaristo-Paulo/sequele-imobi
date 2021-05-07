<?php

namespace App\Http\Controllers\site;

use Gate;
use App\User;
use App\Adress;
use App\Models\Role;
use App\Collaborator;
use App\Models\RoleUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\CollaboratorUpdateRequest;
use App\Http\Requests\CollaboratorRegisterRequest;

class CollaboratorController extends Controller
{
    public function myProfile($id)
    {
        if (Auth::check()) {
            if (Gate::denies('only-collaborator')) {
                return redirect()->back()->with('delete-auth', 'Não tem permissão para aceder esta opção');
            }
            $id = decrypt($id);
            $function = new Collaborator();
            $collaborator =  $function->getQtdApartmentCollaborator($id);

           // dd( $collaborator );
           return view('painel.collaborators.profile', compact('collaborator'));

        }
        return redirect()->route('login')->with('errorMessage', 'Faça login!');
    }

    public function register(CollaboratorRegisterRequest $request)
    {
        try {
            $user = [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'gender_id' => $request->input('gender'),
                'password' => Hash::make($request->input('password'))
            ];

            $result = User::create($user);

            $roleUser = new RoleUser();
            $role_id = Role::where('type', 'collaborator')->first();

            $roleUser->user_id = $result->id;
            $roleUser->role_id = $role_id->id;
            $roleUser->save();

            $collab = new Collaborator();
            $adress = [
                'street' => 'Nenhuma',
                'neighbourhood' => 'Nenhuma',
                'municipe_id' => 95,
            ];

            $result_adress = Adress::create($adress);

            $collab->user_id = $result->id;
            $collab->bi = $request->input('bi');
            $collab->adress_id = $result_adress->id;
            $collab->phone = $request->input('phone');
            $collab->save();

            return redirect()->back()->with('success', 'Colaborador registado com sucesso');
        } catch (\Exception $e) {
            return $e->getMessage();
            //return redirect()->back()->withInput($request->all());
        }
    }
    public function list()
    {
        if (Auth::check()) {
            if (Gate::denies('only-admin')) {
                return redirect()->back()->with('delete-auth', 'Não tem permissão para listagem de dados');
            }
            $function = new Collaborator();
            $collaborators = $function->collaborators();

            return view('painel.collaborators.list', compact('collaborators'));
        }
        return redirect()->route('login.form')->with('errorMessage', 'Faça login!');
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
            return redirect()->route('collaborators')->with('deleted', 'Colaborador removido com sucesso');
        }
        return redirect()->route('login')->with('errorMessage', 'Faça login!');
    }
    public function updateForm($id)
    {
        if (Auth::check()) {
            $id = decrypt($id);
            if (Gate::denies('just-admin-and-collaborator')) {
                return redirect()->route('users')->with('edit-auth', 'Não tem permissão para actualização dados');
            }
            $user = User::find($id);
            $function = new Collaborator();
            $collaborator = $function->collaborator($user->id);

            $collaborator = $collaborator[0];

            return view('painel.collaborators.update', compact('collaborator'));
        }
        return redirect()->route('login')->with('errorMessage', 'Faça login!');
    }
    public function view ($id)
    {
        if (Auth::check()) {
            $id = decrypt($id);
            $user = User::find($id);
            $function = new Collaborator();
            $collaborator = $function->collaborator($user->id);
            $collaborator = $collaborator[0];
            return view('painel.collaborators.view', compact('collaborator'));
        }
        return redirect()->route('login')->with('errorMessage', 'Faça login!');
    }
    public function update(CollaboratorUpdateRequest $request, $id)
    {
        try {
            $old_user = User::where('id', $id)->first();
            $old_collaborator = Collaborator::where('user_id', $id)->first();

            $nameFile = $old_user->photo;

            if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
                $name = uniqid(date('HisYmd'));
                $extension = $request->photo->extension();
                $nameFile = "{$name}.{$extension}";
                $upload = $request->photo->storeAs('users', $nameFile);

                if (!$upload) {
                    dd('Não conseguimos gravar a foto');
                }
            }

            $user = [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'photo' => $nameFile,
                'gender_id' => $request->input('gender'),
            ];

            \DB::table('users')
                ->where('id', $id)
                ->update($user);

            $old_adress = Adress::where('id', $old_collaborator->adress_id )->first();

            $adress = [
                'street' => $request->input('street'),
                'neighbourhood' => $request->input('neighbourhood'),
                'municipe_id' => $request->input('municipe'),
            ];

            \DB::table('adresses')
                ->where('id', $old_adress->id )
                ->update($adress);

            $new_collaborator = [
                'bi' => $request->input('bi'),
                'phone' => $request->input('phone'),
                'birthday' => $request->input('birthday'),
                'description' => $request->input('description'),
                'adress_id' => $old_collaborator->adress_id,
                'user_id' => $old_collaborator->user_id,
            ];

            \DB::table('collaborators')
                ->where('id', $old_collaborator->id)
                ->update($new_collaborator);

                if (!Gate::denies('only-collaborator')) {
                    return redirect()->route('collaborators.view', encrypt(Auth::user()->id))->with('updated', 'Colaborador actualizado com sucesso');
                }
            return redirect()->route('collaborators')->with('updated', 'Colaborador actualizado com sucesso');
        } catch (\Exception $e) {
            return $e->getMessage();
            //return redirect()->back()->withInput($request->all());
        }
    }
}
