<?php

namespace App\Http\Controllers\Portal\User;

use App\Phone;
use App\ProvidedService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Ability;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function userProfile()
    {
        $user = Auth()->user();

        return view('portal.user.profile.profile', compact('user'));
    }

    public function editProfile()
    {
        $user = Auth()->user();

        $telephone = Phone::find($this->getOwnUserTelephoneId(1));
        $cellphone = Phone::find($this->getOwnUserTelephoneId(2));

        return view('portal.user.profile.edit', compact(['user', 'telephone', 'cellphone']));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth()->user();

        $user->name          = $request->name;
        $user->email         = $request->email;
        $user->cpf           = $request->cpf;
        $user->state         = $request->state;
        $user->city          = $request->city;
        $user->zipcode       = $request->zipcode;
        $user->neighbourhood = $request->neighbourhood;
        $user->address       = $request->address;
        $user->about         = $request->about;


        $telephone = $this->setOwnUserTelephone(1, $request);
        $cellphone = $this->setOwnUserTelephone(2, $request);

        $telephone->save();
        $cellphone->save();

        $user->save();

        return redirect()->route('user.profile')->with('status', 'Informações atualizadas');

    }

    private function setOwnUserTelephone($phoneTypeId, $request)
    {
        $telephone = Phone::find($this->getOwnUserTelephoneId($phoneTypeId));

        if ($telephone->number !== $request->telephone || $telephone->ddd !== substr($request->telephone, 0, 2)) {
            $telephone->ddd = substr($request->telephone, 0, 2);
            $telephone->number = substr($request->telephone, 2, strlen($request->telephone));
        }
        return $telephone;
    }

    private function getOwnUserTelephoneId($phoneTypeId)
    {
        $user = Auth()->user();

        $telephone = DB::table('phone_user')
                          ->join('phones', 'phone_id', '=', 'phones.id')
                          ->select('phone_id')
                          ->where([['user_id', '=', $user->id], ['phone_type_id', '=', $phoneTypeId]])
                          ->get();

        return $telephone[0]->phone_id;
    }

    public function updatePassword(Request $request)
    {
        $user = Auth()->user();

        if ($request->password !== $request->password2) {
            return redirect()->route('user.edit.profile')->with('errors', 'Valores diferentes para senha e senha digitada novamente');
        }

        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('user.profile')->with('status', 'Senha atualizada');
    }

    public function showUserRequests(int $userId)
    {

        return view('portal.user.profile.services');
    }

    public function showServicesRequests()
    {
        $servicesRequests = DB::table('provided_services')
                                ->join('users', 'provided_services.client_id', '=', 'users.id')
                                ->join('services', 'provided_services.service_id', '=', 'services.id')
                                ->select('provided_services.id', 'services.name as serviceName',
                                    'users.name as userName', 'provided_services.created_at as date')
                                ->where([['provider_id', '=', \Auth::user()->id], ['status', '=', 'OPENED']])
                                ->get();

        return view('portal.user.profile.requests', compact('servicesRequests'));
    }

    public function acceptServiceRequest(int $providedService_id)
    {
        $provided_service = ProvidedService::find($providedService_id);

        $provided_service->status = 'PROGRESS';
        $provided_service->save();

        return redirect()->route('user.requests')->with('status', 'O serviço foi aceito!');
    }

    public function refuseServiceRequest(int $providedService_id)
    {
        $provided_service = ProvidedService::find($providedService_id);

        $provided_service->status = 'REFUSED';
        $provided_service->save();

        return redirect()->route('user.requests')->with('status', 'O serviço foi recusado!');

    }

    public function showServicesRequested()
    {
        $servicesRequested = DB::table('provided_services')
                                 ->join('users', 'provided_services.client_id', '=', 'users.id')
                                 ->join('services', 'provided_services.service_id', '=', 'services.id')
                                 ->select('provided_services.id', 'services.name as serviceName', 'provided_services.status',
                                      'users.name as userName', 'provided_services.created_at as date')
                                 ->where('client_id', '=', \Auth::user()->id)
                                 ->get();

        return view('portal.user.profile.services_requested', compact('servicesRequested'));
    }

    public function uploadProfilePicture(Request $request)
    {
        $user = Auth()->user();

        $data = $request->all();
        $data['image'] = $user->image;

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $name = $user->id.kebab_case($user->name);

            $extension = $request->image->extension();
            $imageName = "{$name}.{$extension}";

            $data['image'] = $imageName;

            $upload = $request->image->storeAs('users', $imageName);

            if (!$upload) {
                return redirect()->route('user.profile', $user)->with('errors', 'Falha ao fazer o upload da imagem');
            }

        }

        $update = $user->update($data);

        if (!$update) {
            return redirect()->route('user.profile', $user)->with('errors', 'Falha ao fazer o upload da imagem');
        }

        return redirect()->route('user.profile', $user);

    }

    public function showOwnUserAbilities()
    {
        $user = Auth()->user();
        $abilities = DB::table('abilities')
                          ->select('name', 'id')
                          ->where('user_id', '=', $user->id)
                          ->get();

        return view('portal.user.profile.abilities', compact(['user', 'abilities']));
    }

    public function storeUserAbilities(Request $request)
    {
        $user = Auth()->user();

        $ability = new Ability();
        $ability->name = $request->ability;
        $ability->user_id = $user->id;

        $ability->save();

        return redirect()->route('user.abilities')->with('status', 'Habilidade adicionada');
    }

    public function deleteUserAbility($abilityId)
    {
        Ability::destroy($abilityId);

        return redirect()->route('user.abilities')->with('statusFalse', 'Habilidade excluída');
    }
}
