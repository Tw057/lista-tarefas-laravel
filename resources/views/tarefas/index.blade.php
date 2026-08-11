<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h2 class="font-semibold text-xl text-slate-900 leading-tight">Minhas Tarefas</h2>
                <p class="text-sm text-slate-500">Gerencie suas tarefas com segurança e clareza.</p>
            </div>
            <a href="{{ route('tarefas.create') }}" class="btn-primary inline-flex items-center justify-center px-4 py-3">+ Nova tarefa</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-6 rounded-2xl border border-emerald-200 bg-emerald-50 p-4 text-emerald-800">
                    {{ session('success') }}
                </div>
            @endif

            <div class="rounded-[32px] bg-white p-6 shadow-panel">
                @if ($tarefas->isEmpty())
                    <div class="rounded-[28px] border border-dashed border-slate-300 bg-slate-50 p-10 text-center">
                        <p class="text-lg font-semibold text-slate-900">Nenhuma tarefa encontrada</p>
                        <p class="mt-3 text-slate-500">Clique no botão acima para criar sua primeira tarefa.</p>
                    </div>
                @else
                    <div class="grid gap-4">
                        @foreach ($tarefas as $tarefa)
                            <div class="rounded-[28px] border border-slate-200 bg-slate-50 p-6 shadow-sm">
                                <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                                    <div>
                                        <h3 class="text-xl font-semibold text-slate-900">{{ $tarefa->titulo }}</h3>
                                        <p class="mt-2 text-slate-600">{{ $tarefa->descricao ?? 'Sem descrição' }}</p>
                                    </div>
                                    <div class="flex flex-wrap items-center gap-3">
                                        <span class="badge {{ $tarefa->status === 'pendente' ? 'badge-warning' : ($tarefa->status === 'em_andamento' ? 'badge-info' : 'badge-success') }}">
                                            {{ ucfirst(str_replace('_', ' ', $tarefa->status)) }}
                                        </span>
                                        <span class="text-sm text-slate-500">Prioridade {{ $tarefa->prioridade }}</span>
                                    </div>
                                </div>

                                <div class="mt-4 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                                    <div class="text-sm text-slate-500">
                                        <p>Prazo: {{ $tarefa->prazo ? $tarefa->prazo->format('d/m/Y') : 'Não definido' }}</p>
                                        <p class="mt-1">Criado em {{ $tarefa->created_at->format('d/m/Y') }}</p>
                                    </div>

                                    <div class="flex flex-wrap gap-2">
                                        <a href="{{ route('tarefas.edit', $tarefa) }}" class="inline-flex items-center rounded-2xl border border-slate-200 bg-white px-4 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-100">Editar</a>
                                        <form action="{{ route('tarefas.destroy', $tarefa) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir esta tarefa?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="inline-flex items-center rounded-2xl bg-red-600 px-4 py-2 text-sm font-semibold text-white hover:bg-red-500">Excluir</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
