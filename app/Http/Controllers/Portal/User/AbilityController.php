<?php

namespace App\Http\Controllers\Portal\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ability;
use Illuminate\Support\Facades\DB;

class AbilityController extends Controller
{
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
