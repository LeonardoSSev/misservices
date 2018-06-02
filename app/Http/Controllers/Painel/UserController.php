<?php

namespace App\Http\Controllers\Painel;

use App\Ability;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;

class UserController extends Controller
{
    private $numberPagination = 10;

    public function index()
    {
        $theUser = '';
        if( !empty($_GET["search-user"]) ){
            $theUser = $_GET["search-user"];
        }
        $searchUsers = new User();
        $users = $searchUsers->getUsers($theUser, $this->numberPagination);

        return view('painel.users.home', compact('users'));
    }

    public function createUser()
    {
        $roles = Role::all();

        return view('painel.users.create', compact('roles'));
    }

    public function storeUser(Request $request)
    {
        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->cpf = str_replace(['.', '-'], '', $request->cpf);
        $user->state = $request->state;
        $user->city = $request->city;
        $user->zipcode = str_replace('-', '', $request->zipcode);
        $user->neighbourhood = $request->neighbourhood;
        $user->address = $request->address;
        $user->password = bcrypt($request->password);

        $user->save();
        $user->roles()->sync($request->role);

        return redirect()->route('admin.users')->with(['status' => 'O usuário foi criado com sucesso.']);
    }

    public function editUser($idUser)
    {
        $user = User::find($idUser);
        $roles = Role::all();

        return view('painel.users.edit', compact(['user', 'roles']));
    }

    public function updateUser(Request $request, $idUser)
    {
        $user = User::find($idUser);
        $cpfCount = 0;
        $emailCount = 0;
        $request->cpf = str_replace(['.', '-'], '', $request->cpf);
        $request->zipcode = str_replace('-', '', $request->zipcode);

        $users = User::all();

        foreach ($users as $us) {
            if ($us->cpf === $request->cpf) {
                $cpfCount++;
            }
            if ($us->email === $request->email) {
                $emailCount++;
            }
        }

        if ($cpfCount > 0 && $request->cpf !== $user->cpf) {
            return redirect()->route('admin.user.edit', $user)
                                ->with(['error' => 'O CPF informado já está cadastrado no sistema. Por favor, informe ou CPF.']);
        }

        if ($emailCount > 0 && $request->email !== $user->email) {
            return redirect()->route('admin.user.edit', $user)
                                ->with(['error' => 'O e-mail informado já está cadastrado no sistema. Por favor, informe outro e-mail.']);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->cpf = $request->cpf;
        $user->state = $request->state;
        $user->city = $request->city;
        $user->zipcode = $request->zipcode;
        $user->neighbourhood = $request->neighbourhood;
        $user->address = $request->address;
        $user->password = bcrypt($request->password);

        $user->save();
        $user->roles()->sync($request->role);

        return redirect()->route('admin.users')->with(['status' => 'O usuário foi atualizado com sucesso.']);
    }

    public function updateUserPassword(Request $request, $idUser)
    {
        $user = User::find($idUser);
        if ($request->password !== $request->password_confirmation) {
            return redirect()->route('admin.user.edit', $user)->with(['error' => 'As senhas informadas não são iguais.']);
        }



        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('admin.users')->with(['status' => 'A senha do usuário foi atualizada com sucesso.']);
    }

    public function viewUser($idUser)
    {
        $user = User::find($idUser);

        return view('painel.users.view', compact('user'));
    }

    public function rolesUser($idUser)
    {
        $user = User::find($idUser);

        $roles = $user->roles()->get();

        return view('painel.users.roles', compact(['user', 'roles']));
    }

    public function deleteUser($idUser)
    {
        $this->deleteUserAbilities(User::find($idUser));
        User::destroy($idUser);

        return redirect()->route('admin.users')->with(['status' => 'O usuário foi excluído com sucesso.']);
    }

    private function deleteUserAbilities(User $user)
    {
        foreach ($user->abilities as $ability) {
            Ability::destroy($ability->id);
        }
    }
}
