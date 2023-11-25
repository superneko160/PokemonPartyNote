<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
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
     * Display the party edit.
     */
    public function edit(Request $request): View
    {
        // パーティIDからそのパーティを構成するポケモンの詳細を取得
        $query = $request->query();
        $party_id = 0;
        $pokemons = [];
        if (isset($query["id"])) {
            $party_id = $query["id"];
            $party = Party::find($query["id"]);
            for ($i = 1; $i <= 6; $i++) {
                $pokemon = Pokemon::find($party["pokemon_id" . $i]);
                $pokemons[] = isset($pokemon) ? $pokemon : "";
            }
        }
        return view('edit', ['party_id' => $party_id, 'pokemons' => $pokemons]);
    }

    /**
     * Update the pokemon information.
     */
    public function update(Request $request, int $pokemon_id): RedirectResponse
    {
        // DB保存後、詳細画面へリダイレクトさせるためパーティIDをhiddenから取得
        $party_id = $request->input('party_id');
        // 更新対象のポケモンを取得
        $pokemon = Pokemon::find($pokemon_id);
        // リクエストを連想配列で取得
        $params = $request->only(
            'name', 'ability', 'item', 'teratype', 'nature',
            'h', 'a', 'b', 'c', 'd', 's',
            'move1', 'move2', 'move3', 'move4', 'note'
        );
        // データを保存
        $pokemon->fill($params);
        $pokemon->save();
        // パーティ詳細画面へリダイレクト
        return redirect()->route('show', ['id' => $party_id])->with('status', 'pokemon-updated');
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
