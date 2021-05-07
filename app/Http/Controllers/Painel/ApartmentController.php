<?php

namespace App\Http\Controllers\Painel;

use Gate;
use App\User;
use App\Interest;
use App\Apartament;
use App\Collaborator;
use App\PhotoApartament;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ApartmentUpdateRequest;
use App\Http\Requests\InterestRegisterRequest;
use App\Http\Requests\ApartmentRegisterRequest;

class ApartmentController extends Controller
{
    public function registerForm()
    {
        if (Auth::check()) {
            if (Gate::denies('only-collaborator')) {
                return redirect()->back()->with('create-auth', 'Não tem permissão para registo de dados');
            }

            return view('painel.apartments.register');
        }
        return redirect()->route('login')->with('errorMessage', 'Faça login!');
    }
    public function remove(Request $request)
    {
        if (Auth::check()) {
            if (Gate::denies('just-admin-and-collaborator')) {
                return redirect()->back()->with('delete-auth', 'Não tem permissão para remoção dados');
            }
            $apartment = Apartament::find($request->input('element'));
            $apartment->status = 0;
            $apartment->save();
            return redirect()->route('apartments')->with('deleted', 'Apartamento removido com sucesso');
        }
        return redirect()->route('login')->with('errorMessage', 'Faça login!');
    }
    public function removeInterest(Request $request)
    {
        if (Auth::check()) {
            if (Gate::denies('just-admin-and-collaborator')) {
                return redirect()->back()->with('delete-auth', 'Não tem permissão para remoção dados');
            }
            $interest = Interest::find($request->input('element'));
            $interest->status = 0;
            $interest->save();
            return redirect()->route('interests')->with('deleted', 'Proposta removida com sucesso');
        }
        return redirect()->route('login')->with('errorMessage', 'Faça login!');
    }
    public function view(Request $request)
    {
        if (Auth::check()) {
            if (Gate::denies('just-admin-and-collaborator')) {
                return redirect()->route('users')->with('delete-auth', 'Não tem permissão para visualização de dados');
            }
            
            return redirect()-back()->with('warning', 'Brevemente');
        }
        return redirect()->route('login')->with('errorMessage', 'Faça login!');
    }
    public function updateForm($id)
    {
        if (Auth::check()) {
            $id = decrypt($id);
            if (Gate::denies('just-admin-and-collaborator')) {
                return redirect()->back()->with('edit-auth', 'Não tem permissão para actualização de dados');
            }
            $function = new Apartament();
            $apartment = $function->apartment_detail($id);
            $apartment = $apartment[0];

            return view('painel.apartments.update', compact('apartment'));
        }
        return redirect()->route('login')->with('errorMessage', 'Faça login!');
    }
    public function list()
    {
        if (Auth::check()) {
            if (Gate::denies('just-admin-and-collaborator')) {
                return redirect()->back()->with('create-auth', 'Não tem permissão para listagem de dados');
            }
            $function = new Apartament();
            $apartments = $function->apartments();

            if (!Gate::denies('only-collaborator')) {
                $apartments = $function->apartmentByCollaborator(Auth::user()->id);
                return view('painel.apartments.list', compact('apartments'));
            }

            return view('painel.apartments.list', compact('apartments'));
        }
        return redirect()->route('login')->with('errorMessage', 'Faça login!');
    }

    public function registerInteress(InterestRegisterRequest $request)
    {
        try {
            $interest = new Interest();
            $interest->name = $request->input('nameInterest');
            $interest->email = $request->input('emailInterest');
            $interest->phone = $request->input('phoneInterest');
            $interest->description = $request->input('descriptionInterest');
            $interest->apartament_id = $request->input('apartament_id');
            $interest->save();

            return redirect()->back()->with('success', 'Sua mensagem foi enviada com sucesso');
        } catch (\Exception $e) {
            return $e->getMessage();
            //return redirect()->back()->withInput($request->all());
        }
    }
    public function interests()
    {
        try {
            if (Auth::check()) {
                if (Gate::denies('just-admin-and-collaborator')) {
                    return redirect()->back()->with('create-auth', 'Não tem permissão para listagem de dados');
                }
                $function = new Interest();
                $interests = $function->interests();

                if (!Gate::denies('only-collaborator')) {
                    $interests = $function->interestByCollaborator(Auth::user()->id);
                    return view('painel.apartments.interests', compact('interests'));
                }

                return view('painel.apartments.interests', compact('interests'));
            }
            return redirect()->route('login')->with('errorMessage', 'Faça login!');
        } catch (\Exception $e) {
            return $e->getMessage();
            //return redirect()->back()->withInput($request->all());
        }
    }

    public function register(ApartmentRegisterRequest $request)
    {
        try {
            if (Auth::check()) {
                if (Gate::denies('only-collaborator')) {
                    return redirect()->back()->with('create-auth', 'Não tem permissão para registo de dados');
                }

                $collaborator = Collaborator::where('user_id', Auth::user()->id)->first();
                // dd( $request->file('photo'));
                $apartament = [
                    'build' => $request->input('build'),
                    'price' => $request->input('price'),
                    'available_id' => $request->input('available'),
                    'business_id' => $request->input('business'),
                    'block_id' => $request->input('block'),
                    'topology_id' => $request->input('topology'),
                    'collaborator_id' => $collaborator->id,
                    'negociable_id' => $request->input('negociable'),
                    'condiction_id' => $request->input('condiction'),
                    'entrance_id' => $request->input('entrance'),
                    'flat_id' => $request->input('flat'),
                    'description' => $request->input('description'),
                    'status' => $request->input('status'),
                ];

                $result_apt = Apartament::create($apartament);

                foreach ($request->file('photo') as $index => $file) {
                    if ($file->isValid()) {
                        $nameFile = null;
                        $name = uniqid(date('HisYmd'));
                        $extension = $file->extension();
                        $nameFile = "{$name}.{$extension}";
                        $upload = $file->storeAs('apartamentos', $nameFile);
                        if (!$upload) {
                        }
                        $foto = new PhotoApartament();
                        $foto->apartament_id = $result_apt->id;
                        $foto->name = $nameFile;
                        $foto->save();
                    }
                }
                return redirect()->route('apartments.register.form')->with('created', 'Apartamento registado com sucesso');
            }
            return redirect()->route('login')->with('errorMessage', 'Faça login!');
        } catch (\Exception $e) {
            return $e->getMessage();
            //return redirect()->back()->withInput($request->all());
        }
    }

    public function update(ApartmentUpdateRequest $request, $id)
    {
        try {
            $old_apartment = Apartament::where('id', $id)->first();

            $apartament = [
                'build' => $request->input('build'),
                'price' => $request->input('price'),
                'available_id' => $request->input('available'),
                'business_id' => $request->input('business'),
                'block_id' => $request->input('block'),
                'topology_id' => $request->input('topology'),
                'collaborator_id' => $old_apartment->collaborator_id,
                'negociable_id' => $request->input('negociable'),
                'condiction_id' => $request->input('condiction'),
                'entrance_id' => $request->input('entrance'),
                'flat_id' => $request->input('flat'),
                'description' => $request->input('description'),
                'status' => $old_apartment->status,
                'video' => $request->input('video'),
            ];

            \DB::table('apartaments')
                ->where('id', $id)
                ->update($apartament);

            return redirect()->route('apartments')->with('updated', 'Apartamento actualizado com sucesso');
        } catch (\Exception $e) {
            return $e->getMessage();
            //return redirect()->back()->withInput($request->all());
        }
    }
}
