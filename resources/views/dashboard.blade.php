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
                            <th class="px-2 py-1 border border-slate-600">登録・削除</th>
                            <th class="px-2 py-1 border border-slate-600">削除</th>
                        </tr>
                        @foreach ($parties as $party)
                        <tr>
                            <td class="px-2 py-0.5 border border-slate-600">
                                <img src="{{ asset('images/search_ico.svg')}}">
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
                            <td class="px-2 py-0.5 border border-slate-600">
                                <x-primary-button>登録・更新</x-primary-button>
                            </td>
                            <td class="px-2 py-0.5 border border-slate-600">
                                <x-danger-button>削除</x-danger-button>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
