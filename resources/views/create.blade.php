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

                        <form method="POST" action="{{ route('store') }}">

                        @for ($i = 0; $i < 6; $i++)
                        @csrf
                        <table class="table-auto border-collapse border border-slate-500 py-2">
                        <tr>
                            <th colspan="4" class="px-2 py-0.5 border border-slate-600">名前 <input type="text" name="name[{{$i}}]" placeholder="ピカチュウ"></th>
                        </tr>
                        <tr>
                            <td class="px-2 py-0.5 border border-slate-600">特性 <input type="text" name="ability[{{$i}}]" placeholder="せいでんき" value=""></td>
                            <td class="px-2 py-0.5 border border-slate-600">道具 <input type="text" name="item[{{$i}}]" placeholder="でんきだま" value=""></td>
                            <td class="px-2 py-0.5 border border-slate-600">テラスタイプ <input type="text" name="teratype[{{$i}}]" placeholder="ひこう" value=""></td>
                            <td class="px-2 py-0.5 border border-slate-600">性格 <input type="text" name="nature[{{$i}}]" placeholder="ようき" value=""></td>
                        </tr>
                        <tr>
                            <td class="px-2 py-0.5 border border-slate-600">H <input type="number" name="h[{{$i}}]" value="0"></td>
                            <td class="px-2 py-0.5 border border-slate-600">A <input type="number" name="a[{{$i}}]" value="0"></td>
                            <td class="px-2 py-0.5 border border-slate-600">B <input type="number" name="b[{{$i}}]" value="0"></td>
                        </tr>
                        <tr>
                            <td class="px-2 py-0.5 border border-slate-600">C <input type="number" name="c[{{$i}}]" value="0"></td>
                            <td class="px-2 py-0.5 border border-slate-600">D <input type="number" name="d[{{$i}}]" value="0"></td>
                            <td class="px-2 py-0.5 border border-slate-600">S <input type="number" name="s[{{$i}}]" value="0"></td>
                        </tr>
                        <tr>
                            <td class="px-2 py-0.5 border border-slate-600">技1 <input type="text" name="move1[{{$i}}]" placeholder="ボルテッカ―" value=""></td>
                            <td class="px-2 py-0.5 border border-slate-600">技2 <input type="text" name="move2[{{$i}}]"></td>
                            <td class="px-2 py-0.5 border border-slate-600">技3 <input type="text" name="move3[{{$i}}]"></td>
                            <td class="px-2 py-0.5 border border-slate-600">技4 <input type="text" name="move4[{{$i}}]"></td>
                        </tr>
                        <tr>
                            <td colspan="4" class="px-2 py-0.5 border border-slate-600">備考<input type="text" name="note[{{$i}}]" class="w-full"></td>
                        </tr>
                        </table>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @endfor

                        <div class="my-1 mb-5">
                            <x-create-button>新規作成</x-create-button>
                        </div>

                        </form>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>