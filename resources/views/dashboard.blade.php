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
                    <table class="border-collapse border border-slate-500">
                    @if (isset($parties))
                        <thead>
                        <tr class="">
                            <th class="border border-slate-600">ID</th>
                            <th class="border border-slate-600">公開コード</th>
                            <th class="border border-slate-600">1匹目</th>
                            <th class="border border-slate-600">2匹目</th>
                            <th class="border border-slate-600">3匹目</th>
                            <th class="border border-slate-600">4匹目</th>
                            <th class="border border-slate-600">5匹目</th>
                            <th class="border border-slate-600">6匹目</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($parties as $party)
                            <tr class="">
                            @if (isset($party))
                                <td class="border border-slate-700">{{ $party->id }}</td>
                                <td class="border border-slate-700">{{ $party->public_code }}</td>
                                <td class="border border-slate-700">{{ $party->pokemon_id1 }}</td>
                                <td class="border border-slate-700">{{ $party->pokemon_id2 }}</td>
                                <td class="border border-slate-700">{{ $party->pokemon_id3 }}</td>
                                <td class="border border-slate-700">{{ $party->pokemon_id4 }}</td>
                                <td class="border border-slate-700">{{ $party->pokemon_id5 }}</td>
                                <td class="border border-slate-700">{{ $party->pokemon_id6 }}</td>
                            @else
                                <td class="border border-slate-700">Empty Slot</td>
                                <td class="border border-slate-700"></td>
                                <td class="border border-slate-700"></td>
                                <td class="border border-slate-700"></td>
                                <td class="border border-slate-700"></td>
                                <td class="border border-slate-700"></td>
                                <td class="border border-slate-700"></td>
                                <td class="border border-slate-700"></td>
                            @endif
                            </tr>
                        @endforeach
                        </tbody>
                    @endif
                    <table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
