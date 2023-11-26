<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\CreatePartyRequest;
use App\Models\Party;
use App\Models\Pokemon;
use App\Models\User;
use Illuminate\View\View;

class PartyController extends Controller
{
    /**
     * Display the dashboard.
     */
    public function index(Request $request): View
    {
        $parties = $this->getPartyList($request);
        return view('dashboard', ['parties' => $parties]);
    }

    /**
     * Display the party infomation.
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
        return view('show', ['party_id' => $query["id"], 'pokemons' => $pokemons]);
    }

    /**
     * Display the party create.
     */
    public function create(Request $request): View
    {
        return view('create');
    }

    /**
     * Store the party infomation
     */
    public function store(CreatePartyRequest $request): RedirectResponse
    {
        // リクエスト情報すべて取得
        $reqs = $request->all();
        // リクエスト情報の再構築
        $pokemons = [];
        for ($i = 0; $i < count($reqs['name']); $i++) {
            $pokemons[$i]['name'] = $reqs['name'][$i];
            $pokemons[$i]['ability'] = $reqs['ability'][$i];
            $pokemons[$i]['item'] = $reqs['item'][$i];
            $pokemons[$i]['teratype'] = $reqs['teratype'][$i];
            $pokemons[$i]['nature'] = $reqs['nature'][$i];
            $pokemons[$i]['h'] = $reqs['h'][$i];
            $pokemons[$i]['a'] = $reqs['a'][$i];
            $pokemons[$i]['b'] = $reqs['b'][$i];
            $pokemons[$i]['c'] = $reqs['c'][$i];
            $pokemons[$i]['d'] = $reqs['d'][$i];
            $pokemons[$i]['s'] = $reqs['s'][$i];
            $pokemons[$i]['move1'] = $reqs['move1'][$i];
            $pokemons[$i]['move2'] = $reqs['move2'][$i];
            $pokemons[$i]['move3'] = $reqs['move3'][$i];
            $pokemons[$i]['move4'] = $reqs['move4'][$i];
            $pokemons[$i]['note'] = $reqs['note'][$i];
        }
        // 名前に値が入っていないデータを除去しインデックスを振りなおす
        $pokemons = array_values(array_filter($pokemons, function($value) {
            return !is_null($value["name"]);
        }));
        // createメソッドの返り値のオブジェクトを格納する配列
        $insert_data = [];
        // ポケモンのデータを保存（編集のため、入力されていないポケモンも格納）
        for ($i = 0; $i < count($reqs['name']); $i++) {
            $insert_data[] = Pokemon::create([
                'name' => $pokemons[$i]['name'] ?? '',
                'ability' => $pokemons[$i]['ability'] ?? '',
                'item' => $pokemons[$i]['item'] ?? '',
                'teratype' => $pokemons[$i]['teratype'] ?? '',
                'nature' => $pokemons[$i]['nature'] ?? '',
                'h' => $pokemons[$i]['h'] ?? 0,
                'a' => $pokemons[$i]['a'] ?? 0,
                'b' => $pokemons[$i]['b'] ?? 0,
                'c' => $pokemons[$i]['c'] ?? 0,
                'd' => $pokemons[$i]['d'] ?? 0,
                's' => $pokemons[$i]['s'] ?? 0,
                'move1' => $pokemons[$i]['move1'] ?? '',
                'move2' => $pokemons[$i]['move2'] ?? '',
                'move3' => $pokemons[$i]['move3'] ?? '',
                'move4' => $pokemons[$i]['move4'] ?? '',
                'note' => $pokemons[$i]['note'] ?? '',
            ]);
        }
        // 保存したポケモンのデータのIDを新しく作成したパーティに登録
        $insert_party = Party::create([
            'pokemon_id1' => $insert_data[0]->id ?? null,
            'pokemon_id2' => $insert_data[1]->id ?? null,
            'pokemon_id3' => $insert_data[2]->id ?? null,
            'pokemon_id4' => $insert_data[3]->id ?? null,
            'pokemon_id5' => $insert_data[4]->id ?? null,
            'pokemon_id6' => $insert_data[5]->id ?? null,
        ]);
        // パーティIDをユーザ情報の空いているパーティ枠に登録
        $user = User::find($request->user()->id);
        $tmp_id = 0;
        for ($i = 1; $i <= 6; $i++) {
            if (is_null($user["party_id{$i}"])) {
                $tmp_id = $i;
                break;
            }
        }
        $user->fill(["party_id{$tmp_id}" => $insert_party->id])->save();
        // 作成したパーティ詳細画面へリダイレクト
        return redirect()->route('show', ['id' => $insert_party->id])->with('status', 'party-created');
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
            $pokemons = $this->getPokemonsForPartyId($party_id);
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
    public function destroy(Request $request, int $party_id): RedirectResponse
    {
        // パーティを構成するポケモンを削除
        // $pokemons = $this->getPokemonsForPartyId($party_id);
        // foreach ($pokemons as $pokemon) {
        //     $del_pokemon = Pokemon::findOrFail($pokemon->id);
        //     $del_pokemon->delete();
        // }
        // 削除対象のユーザ取得し、削除したパーティIDをNULLに更新
        $user = User::find($request->user()->id);
        // 削除対処のパーティID更新
        $tmp_id = 0;
        for ($i = 1; $i <= 6; $i++) {
            if ($party_id === $user["party_id{$i}"]) {
                $tmp_id = $i;
                break;
            }
        }
        $user->fill(["party_id{$tmp_id}" => null])->save();
        // 削除対象のパーティ取得
        $party = Party::findOrFail($party_id);
        // パーティの削除
        $party->delete();
        // ダッシュボードに渡す情報
        $parties = $this->getPartyList($request);
        // ダッシュボードにリダイレクト
        return redirect()->route('dashboard', ['parties' => $parties])->with('status', 'party-deleted');
    }

    /**
     * Get Party List for dashboard.
     */
    private function getPartyList(Request $request): array
    {
        // ユーザIDからパーティとそのパーティを構成するポケモンの名前を取得
        $parties = [];
        $user = $request->user();
        for ($i = 0; $i < 6; $i++) {
            $tmp_id = $i + 1;
            $party = Party::find($user["party_id{$tmp_id}"]);
            $parties[$i]["id"] = isset($party["id"]) ? $party["id"] : "";
            $parties[$i]["public_code"] = isset($party["public_code"]) ? $party["public_code"] : "";
            for ($j = 1; $j <= 6; $j++) {
                if (isset($party["pokemon_id" . $j])) {
                    $pokemon = Pokemon::find($party["pokemon_id{$j}"]);
                    $parties[$i][] = $pokemon["name"];
                }
                else {
                    $parties[$i][] = "";
                }
            }
        }
        return $parties;
    }

    /**
     * Get pokemons for partyId
     */
    private function getPokemonsForPartyId(int $party_id): array
    {
        $pokemons = [];
        $party = Party::find($party_id);
        for ($i = 1; $i <= 6; $i++) {
            $pokemon = Pokemon::find($party["pokemon_id" . $i]);
            $pokemons[] = isset($pokemon) ? $pokemon : "";
        }
        return $pokemons;
    }
}
