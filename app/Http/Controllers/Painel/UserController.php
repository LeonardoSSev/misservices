<?php

namespace App\Http\Controllers\Painel;

use App\Ability;
use App\Chat;
use App\ProvidedService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    private $numberPagination = 10;

    ////////////////////////////////////////////////////////////////////////////
    // FUNÇÕES VIEW
    ///////////////////////////////////////////////////////////////////////////

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

    public function editUser($idUser)
    {
        $user = User::find($idUser);
        $roles = Role::all();

        return view('painel.users.edit', compact(['user', 'roles']));
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

    ////////////////////////////////////////////////////////////////////////////
    // FUNÇÕES TRATAMENTO DE DADOS
    ///////////////////////////////////////////////////////////////////////////

    public function storeUser(Request $request)
    {
        $user = new User;
        $response = $user->insertUser( $request );

        if( $response == 1 ){
            return redirect()
            ->route('admin.users')
            ->with(['error' => 'O CPF informado já está cadastrado no sistema. Por favor, informe ou CPF.']);
        } elseif ($response == 2) {
            return redirect()
            ->route('admin.users')
            ->with(['error' => 'O e-mail informado já está cadastrado no sistema. Por favor, informe outro e-mail.']);
        } else{
            return redirect()->route('admin.users')->with(['status' => 'O usuário foi criado com sucesso.']);
        }    
    }

    public function updateUser(Request $request, $idUser)
    {
        $user = new User();
        $response = $user->updateUser( $request, $idUser );

        if( $response == 1 ){
            return redirect()
            ->route('admin.user.edit', $idUser)
            ->with(['error' => 'O CPF informado já está cadastrado no sistema. Por favor, informe ou CPF.']);
        } elseif ($response == 2) {
            return redirect()
            ->route('admin.user.edit', $idUser)
            ->with(['error' => 'O e-mail informado já está cadastrado no sistema. Por favor, informe outro e-mail.']);
        } else{
            return redirect()->route('admin.user.edit')->with(['status' => 'O usuário foi atualizado com sucesso.']);
        }
    }

    public function updateUserPassword(Request $request, $idUser)
    {
        $user = new User();
        $user->updateUserPassword( $request, $idUser );

        return redirect()->route('admin.users')->with(['status' => 'A senha do usuário foi atualizada com sucesso.']);
    }

    public function deleteUser($idUser)
    {
        $user = new User();
        $user->deleteUser($idUser);

        return redirect()->route('admin.users')->with(['status' => 'O usuário foi excluído com sucesso.']);
    }
}