<?php

namespace App\Http\Controllers\Portal\User;

use App\Helper;
use App\Phone;
use App\ProvidedService;
use App\Service;
use App\Category;
use App\Ability;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function userProfile()
    {
        $user = Auth()->user();

        return view('portal.user.profile.profile_index', compact('user'));
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

        $request->cpf = str_replace(['.', '-'], '', $request->cpf);
        $request->zipcode = str_replace('-', '', $request->zipcode);
        $request->telephone = str_replace(['-', '(', ')'], '', $request->telephone);
        $request->cellphone = str_replace(['-', '(', ')'], '', $request->cellphone);

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

        if ($phoneTypeId === 1) {
            if ($telephone->number !== $request->telephone || $telephone->ddd !== substr($request->telephone, 0, 2)) {
                $telephone->ddd = substr($request->telephone, 0, 2);
                $telephone->number = substr($request->telephone, 2, strlen($request->telephone));
            }
            return $telephone;
        }

        if ($telephone->number !== $request->cellphone || $telephone->ddd !== substr($request->cellphone, 0, 2)) {
            $telephone->ddd = substr($request->cellphone, 0, 2);
            $telephone->number = substr($request->cellphone, 2, strlen($request->cellphone));
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

    private function getOwnServices()
    {
        $servicesId = [];
        $userServicesId = DB::table('services')
                                ->select('id')
                                ->where('user_id', '=', Auth()->user()->id)
                                ->get();
        foreach ($userServicesId as $id) {
            $servicesId[] = $id->id;
        }

        return $servicesId;
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



    public function showOwnServices()
    {

        $user = Auth()->user();
        
        $services = DB::table('services')
                         ->select('*')
                         ->where('user_id', '=', Auth()->user()->id)
                         ->get();

        $numServices = Service::where('user_id', Auth()->user()->id)->count();

        $categories = Category::all();

        return view('portal.user.profile.own_services', compact(['user', 'services', 'numServices', 'categories']));
    }

    public function storeOwnServices(Request $request)
    {
        $service = new Service;

        $service->name = $request->name;
        $service->description = $request->description;
        $service->category_id = $request->category;
        $service->user_id = Auth()->user()->id;

        $service->save();

        return redirect()->route('user.services')->with('status', 'Serviço adicionado com sucesso');
    }

}
