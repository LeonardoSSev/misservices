<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

use App\Role;
use App\Ability;
use App\Chat;
use App\ProvidedService;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'cpf', 'state', 'city', 'zipcode', 'neighbourhood', 'address', 'image', 'about'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function abilities()
    {
        return $this->hasMany(\App\Ability::class);
    }

    public function roles()
    {
        return $this->belongsToMany(\App\Role::class);
    }

    public function phones()
    {
        return $this->belongsToMany(\App\Phone::class);
    }

    public function hasPermission(Permission $permission){
        return $this->hasAnyRoles($permission->roles);
    }

    public function hasAnyRoles($roles)
    {
        if(is_array($roles) || is_object($roles) ) {
            return !! $roles->intersect($this->roles)->count();
        }

        return $this->roles->contains('name', $roles);
    }

    public function isAdmin() {
        return $this->roles()->where('name', 'Admin')->exists();
    }

    ////////////////////////////////////////////////////////////////////////////
    // FUNÇÕES GET
    ///////////////////////////////////////////////////////////////////////////

    public function getNoAdminUsers() {
        $users = User::all();
        $noAdminUsers = array();

        foreach ($users as $user) {
            foreach ($user->roles as $role) {
                if ($role->name !== 'Admin') {
                    array_push($noAdminUsers, $user);
                }
            }
        }

        return $noAdminUsers;
    }

    public function getUsers($user, $pagination){
        $result = DB::table('users')
        ->where('name' , 'like', '%'.$user.'%')
        ->paginate($pagination);

        return $result;
    }

    ////////////////////////////////////////////////////////////////////////////
    // FUNÇÕES INSERT
    ///////////////////////////////////////////////////////////////////////////

    public function insertUser( $request, $idUser = null ){
        if( !empty($idUser) ){
            $user = User::find($idUser);
            $validacao = $this->verificaDadosExistentes( $request, $user );
        } else{
            $user = new User();
            $validacao = $this->verificaDadosExistentes( $request );
        }

        if( !empty($validacao) ){
            return $validacao;
        }

        if( !empty($request->name) ){
            $user->name = $request->name;
        }
        if( !empty($request->email) ){
            $user->email = $request->email;
        }
        if( !empty($request->cpf) ){
            $user->cpf = str_replace(['.', '-'], '', $request->cpf);
        }
        if( !empty($request->state) ){
            $user->state = $request->state;
        }
        if( !empty($request->city) ){
            $user->city = $request->city;
        }
        if( !empty($request->zipcode) ){
            $user->zipcode = str_replace('-', '', $request->zipcode);
        }
        if( !empty($request->neighbourhood) ){
            $user->neighbourhood = $request->neighbourhood;
        }
        if( !empty($request->address) ){
            $user->address = $request->address;
        }
        if( !empty($request->password) ){
            $user->password = bcrypt($request->password);
        }
        if( !empty($request) ){
            $user->save();

            if( !empty($request->role) ){
                $user->roles()->sync($request->role);
            }

            return true;
        }
    }

    ////////////////////////////////////////////////////////////////////////////
    // FUNÇÕES UPDATE
    ///////////////////////////////////////////////////////////////////////////

    public function updateUser($request, $idUser){
        $update = $this->insertUser( $request, $idUser );

        return $update;
    }

    public function updateUserPassword( $request, $idUser ){
        if ($request->password !== $request->password_confirmation) {
            return redirect()->route('admin.user.edit', $user)->with(['error' => 'As senhas informadas não são iguais.']);
        }

        $updatePassword = $this->insertUser( $request, $idUser );

        return $updatePassword;
    }

    ////////////////////////////////////////////////////////////////////////////
    // FUNÇÕES DELETE
    ///////////////////////////////////////////////////////////////////////////

    public function deleteUser($idUser)
    {
        $this->deleteUserAbilities(User::find($idUser));
        $this->deleteUserProvidedServices(User::find($idUser));
        User::destroy($idUser);
    }

    private function deleteUserAbilities(User $user)
    {
        foreach ($user->abilities as $ability) {
            Ability::destroy($ability->id);
        }
    }

    private function deleteUserProvidedServices(User $user)
    {
        $providedServices = DB::table('provided_services')
                                ->select('id')
                                ->where('client_id', '=', $user->id)
                                ->orWhere('provider_id', '=', $user->id)
                                ->get();

        foreach ($providedServices as $ids) {
            $this->deleteUserRates($ids->id);
            $this->deleteUserMessages($user->id);
            $this->deleteUserChats($ids->id);
            ProvidedService::destroy($ids->id);
        }
    }

    private function deleteUserRates($providedServiceId)
    {
        DB::table('rates')
            ->where('provided_service_id', '=', $providedServiceId)
            ->delete();
    }

    private function deleteUserMessages($userId)
    {

        DB::table('messages')
            ->where('sender_id', '=', $userId)
            ->orWhere('receiver_id', '=', $userId)
            ->delete();
    }

    private function deleteUserChats($providedServiceId)
    {

        DB::table('chats')
            ->where('provided_service_id', '=', $providedServiceId)
            ->delete();
    }

    ////////////////////////////////////////////////////////////////////////////
    // FUNÇÕES AUXILIARES
    ///////////////////////////////////////////////////////////////////////////

    public function verificaDadosExistentes( $request, $user = null ){
        $users = User::all();
        $cpfCount = 0;
        $emailCount = 0;
        $count = null;

        foreach ($users as $us) {
            if ($us->cpf === str_replace(['.', '-'], '', $request->cpf)) {
                $cpfCount++;
            }
            if ($us->email === $request->email) {
                $emailCount++;
            }
        }

        // if( !empty($user) ){
        //     if ($cpfCount > 0 && $request->cpf !== $user->cpf) {
        //         $count = 1;
        //     }
    
        //     if ($emailCount > 0 && $request->email !== $user->email) {
        //         $count = 2;
        //     }    
        // }
        // else{
        //     if ($cpfCount > 0) {
        //         $count = 1;
        //     }
    
        //     if ($emailCount > 0) {
        //         $count = 2;
        //     }
        // }

        return $count;
    }
}