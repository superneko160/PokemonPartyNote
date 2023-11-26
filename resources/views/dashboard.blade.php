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
                            <th class="px-2 py-1 border border-slate-600">詳細</th>
                            <th class="px-2 py-1 border border-slate-600">公開コード</th>
                            @for ($i = 1; $i <= 6; $i++)
                                <th class="px-2 py-1 border border-slate-600">{{ $i }}体目</th>
                            @endfor
                            <th class="px-2 py-1 border border-slate-600">作成・編集</th>
                        </tr>
                        @foreach ($parties as $party)
                        <tr>
                            <td class="px-2 py-0.5 border border-slate-600">
                                <a href="{{ route('show') }}?id={{ $party['id'] }}">
                                    <img src="{{ asset('images/search_ico.svg')}}">
                                </a>
                            </td>
                            <td class="px-2 py-0.5 border border-slate-600">
                                {{ $party["public_code"] }}
                            </td>
                            @for ($i = 0; $i < 6; $i++)
                                @if (!empty($party[$i]))
                                    <td class="px-2 py-0.5 border border-slate-600">
                                        {{ $party[$i] }}
                                    </td>
                                @else
                                    <td class="px-2 py-0.5 border border-slate-600">
                                        空きスロット
                                    </td>
                                @endif
                            @endfor
                            
                            @if (!empty($party["id"]))
                                <td class="px-2 py-0.5 border border-slate-600 text-center">
                                    <a href="{{ route('edit', ['id' => $party['id']]) }}"><x-primary-button>編集</x-primary-button></a>
                                </td>
                            @else
                                <td class="px-2 py-0.5 border border-slate-600 text-center">
                                    <a href="{{ route('create') }}"><x-create-button>作成</x-create-button></a>
                                </td>
                            @endif
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
