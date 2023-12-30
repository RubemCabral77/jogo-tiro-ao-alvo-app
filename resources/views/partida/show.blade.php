<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ranking') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 p-8 mt-6 lg:mt-0 rounded shadow bg-white" style="border-collapse: collapse; border-radius: 10px; ">
                    <table class="w-full border-collapse bg-white rounded-2xl">
                        @if(empty($partidas))
                        {{-- <tr>
                            <th class="text-start p-2 text-lg border-none m-0 rounded-tl-2xl" style="background-color: #3437f7; color: #dde15b;">JOGADOR</th>
                            <th class="text-start p-2 text-lg border-none m-0" style="background-color: #3437f7; color: #dde15b;">QUANTIDADE DE ACERTOS</th>
                            <th class="text-start p-2 text-lg border-none m-0" style="background-color: #3437f7; color: #dde15b;">QUANTIDADE DE ERROS</th>
                            <th class="text-start p-2 text-lg border-none m-0 rounded-tr-2xl" style="background-color: #3437f7; color: #dde15b;">DATA E HORA</th>
                        </tr> --}}
                        @else
                        <tr>
                            <th class="text-start p-2 text-lg border-none m-0 rounded-tl-2xl" style="background-color: #3437f7; color: #dde15b;">JOGADOR</th>
                            <th class="text-start p-2 text-lg border-none m-0" style="background-color: #3437f7; color: #dde15b;">ACERTOS</th>
                            <th class="text-start p-2 text-lg border-none m-0" style="background-color: #3437f7; color: #dde15b;">ERROS</th>
                            <th class="text-start p-2 text-lg border-none m-0 rounded-tr-2xl" style="background-color: #3437f7; color: #dde15b;">DATA-HORA</th>
                        </tr>
                        @endif
                        
                        @forelse($partidas as $p)
                            <tr>
                                <td class="text-start p-2 text-lg border-none m-0">{{ $p->user->name }}</td>
                                <td class="text-start p-2 text-lg border-none m-0">{{ $p->acertos }}</td>
                                <td class="text-start p-2 text-lg border-none m-0">{{ $p->erros }}</td>
                                <td class="text-start p-2 text-lg border-none m-0">{{ $p->data_hora }}</td>
                            </tr>
                        @empty
                            <h1>Ainda não rankeado</h1>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
