<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ Auth::user()->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @foreach ($pokemons as $pokemon)
                        <form method="POST" action="{{ route('edit.update', ['pokemonId' => $pokemon['id']]) }}">
                        @method('PUT')
                        @csrf
                        
                        <input type="hidden" name="party_id" value="{{ $party_id }}">
                        <table class="table-auto border-collapse border border-slate-500 py-2">
                        <tr>
                            <th colspan="4" class="px-2 py-0.5 border border-slate-600"><input type="text" name="name" value="{{ old('name', $pokemon['name']) }}"></th>
                        </tr>
                        <tr>
                            <td class="px-2 py-0.5 border border-slate-600">特性 <input type="text" name="ability" value="{{ old('ability', $pokemon['ability']) }}"></td>
                            <td class="px-2 py-0.5 border border-slate-600">道具 <input type="text" name="item" value="{{ old('item', $pokemon['item']) }}"></td>
                            <td class="px-2 py-0.5 border border-slate-600">テラスタイプ <input type="text" name="teratype" value="{{ old('teratype', $pokemon['teratype']) }}"></td>
                            <td class="px-2 py-0.5 border border-slate-600">性格 <input type="text" name="nature" value="{{ old('nature', $pokemon['nature']) }}"></td>
                        </tr>
                        <tr>
                            <td class="px-2 py-0.5 border border-slate-600">H <input type="number" name="h" value="{{ old('h', $pokemon['h']) }}"></td>
                            <td class="px-2 py-0.5 border border-slate-600">A <input type="number" name="a" value="{{ old('a', $pokemon['a']) }}"></td>
                            <td class="px-2 py-0.5 border border-slate-600">B <input type="number" name="b" value="{{ old('b', $pokemon['b']) }}"></td>
                        </tr>
                        <tr>
                            <td class="px-2 py-0.5 border border-slate-600">C <input type="number" name="c" value="{{ old('c', $pokemon['c']) }}"></td>
                            <td class="px-2 py-0.5 border border-slate-600">D <input type="number" name="d" value="{{ old('d', $pokemon['d']) }}"></td>
                            <td class="px-2 py-0.5 border border-slate-600">S <input type="number" name="s" value="{{ old('s', $pokemon['s']) }}"></td>
                        </tr>
                        <tr>
                            <td class="px-2 py-0.5 border border-slate-600">技1 <input type="text" name="move1" value="{{ old('move1', $pokemon['move1']) }}"></td>
                            <td class="px-2 py-0.5 border border-slate-600">技2 <input type="text" name="move2" value="{{ old('move2', $pokemon['move2']) }}"></td>
                            <td class="px-2 py-0.5 border border-slate-600">技3 <input type="text" name="move3" value="{{ old('move3', $pokemon['move3']) }}"></td>
                            <td class="px-2 py-0.5 border border-slate-600">技4 <input type="text" name="move4" value="{{ old('move4', $pokemon['move4']) }}"></td>
                        </tr>
                        <tr>
                            <td colspan="4" class="px-2 py-0.5 border border-slate-600">備考<input type="text" name="note" value="{{ old('note', $pokemon['note']) }}" class="w-full"></td>
                        </tr>
                        </table>
                        <div class="my-1 mb-5">
                            <x-primary-button>変更確定</x-primary-button>
                        </div>
                        </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>