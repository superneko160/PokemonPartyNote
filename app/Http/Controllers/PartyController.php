<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Party;
use App\Models\Pokemon;
use Illuminate\View\View;

class PartyController extends Controller
{
    /**
     * Display the dashboard.
     * 
     */
    public function index(Request $request): View
    {
        // ユーザIDからパーティとそのパーティを構成するポケモンの名前を取得
        $parties = [];
        for ($i = 0; $i < 6; $i++) {
            $party = Party::find($request->user()->party_id . ($i + 1));
            $parties[$i]["id"] = isset($party["id"]) ? $party["id"] : "";
            $parties[$i]["public_code"] = isset($party["public_code"]) ? $party["public_code"] : "";
            for ($j = 1; $j <= 6; $j++) {
                if (isset($party["pokemon_id" . $j])) {
                    $pokemon = Pokemon::find($party["pokemon_id" . $j]);
                    $parties[$i][] = $pokemon["name"];
                }
                else {
                    $parties[$i][] = "";
                }
            }
        }
        return view('dashboard', ['parties' => $parties]);
    }

    /**
     * Display the party infomation.
     * 
     */
    public function show(Request $request): View
    {
        // パーティIDからそのパーティを構成するポケモンの詳細を取得
        $query = $request->query();
        $pokemons = [];
        if (isset($query["id"])) {
            $party = Party::find($query["id"]);
            for ($i = 1; $i <= 6; $i++) {
                $pokemon = Pokemon::find($party["pokemon_id" . $i]);
                $pokemons[] = isset($pokemon) ? $pokemon : "";
            }
        }
        return view('show', ['pokemons' => $pokemons]);
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        // return view('profile.edit', [
        //     'user' => $request->user(),
        // ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // $request->user()->fill($request->validated());

        // if ($request->user()->isDirty('email')) {
        //     $request->user()->email_verified_at = null;
        // }

        // $request->user()->save();

        // return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // $request->validateWithBag('userDeletion', [
        //     'password' => ['required', 'current_password'],
        // ]);

        // $user = $request->user();

        // Auth::logout();

        // $user->delete();

        // $request->session()->invalidate();
        // $request->session()->regenerateToken();

        // return Redirect::to('/');
    }
}
