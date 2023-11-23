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
                    <table class="table-auto border-collapse border border-slate-500">
                        <tr>
                            <th class="px-2 py-1 border border-slate-600">名前</th>
                            <th class="px-2 py-1 border border-slate-600">特性</th>
                            <th class="px-2 py-1 border border-slate-600">道具</th>
                            <th class="px-2 py-1 border border-slate-600">テラスタイプ</th>
                            <th class="px-2 py-1 border border-slate-600">性格</th>
                            <th class="px-2 py-1 border border-slate-600">H</th>
                            <th class="px-2 py-1 border border-slate-600">A</th>
                            <th class="px-2 py-1 border border-slate-600">B</th>
                            <th class="px-2 py-1 border border-slate-600">C</th>
                            <th class="px-2 py-1 border border-slate-600">D</th>
                            <th class="px-2 py-1 border border-slate-600">S</th>
                            <th class="px-2 py-1 border border-slate-600">技1</th>
                            <th class="px-2 py-1 border border-slate-600">技2</th>
                            <th class="px-2 py-1 border border-slate-600">技3</th>
                            <th class="px-2 py-1 border border-slate-600">技4</th>
                            <th class="px-2 py-1 border border-slate-600">備考</th>
                        </tr>
                        @foreach ($pokemons as $pokemon)
                        <tr>
                            <td class="px-2 py-0.5 border border-slate-600">{{ $pokemon["name"] }}</td>
                            <td class="px-2 py-0.5 border border-slate-600">{{ $pokemon["ability"] }}</td>
                            <td class="px-2 py-0.5 border border-slate-600">{{ $pokemon["item"] }}</td>
                            <td class="px-2 py-0.5 border border-slate-600">{{ $pokemon["teratype"] }}</td>
                            <td class="px-2 py-0.5 border border-slate-600">{{ $pokemon["nature"] }}</td>
                            <td class="px-2 py-0.5 border border-slate-600">{{ $pokemon["h"] }}</td>
                            <td class="px-2 py-0.5 border border-slate-600">{{ $pokemon["a"] }}</td>
                            <td class="px-2 py-0.5 border border-slate-600">{{ $pokemon["b"] }}</td>
                            <td class="px-2 py-0.5 border border-slate-600">{{ $pokemon["c"] }}</td>
                            <td class="px-2 py-0.5 border border-slate-600">{{ $pokemon["d"] }}</td>
                            <td class="px-2 py-0.5 border border-slate-600">{{ $pokemon["s"] }}</td>
                            <td class="px-2 py-0.5 border border-slate-600">{{ $pokemon["move1"] }}</td>
                            <td class="px-2 py-0.5 border border-slate-600">{{ $pokemon["move2"] }}</td>
                            <td class="px-2 py-0.5 border border-slate-600">{{ $pokemon["move3"] }}</td>
                            <td class="px-2 py-0.5 border border-slate-600">{{ $pokemon["move4"] }}</td>
                            <td class="px-2 py-0.5 border border-slate-600">{{ $pokemon["note"] }}</td>
                        </tr>
                        @endforeach
                <table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>