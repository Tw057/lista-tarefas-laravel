<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Editar tarefa') }}
            </h2>

            <a href="{{ route('dashboard') }}" class="inline-flex items-center px-4 py-2 bg-gray-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                {{ __('Voltar') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('tarefas.update', $tarefa) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="space-y-6">
                            <div>
                                <x-input-label for="titulo" :value="__('Título')" />
                                <x-text-input id="titulo" name="titulo" type="text" class="mt-1 block w-full" value="{{ old('titulo', $tarefa->titulo) }}" required autofocus />
                                <x-input-error :messages="$errors->get('titulo')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="descricao" :value="__('Descrição')" />
                                <textarea id="descricao" name="descricao" rows="4" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100">{{ old('descricao', $tarefa->descricao) }}</textarea>
                                <x-input-error :messages="$errors->get('descricao')" class="mt-2" />
                            </div>

                            <div class="grid gap-4 md:grid-cols-2">
                                <div>
                                    <x-input-label for="status" :value="__('Status')" />
                                    <select id="status" name="status" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100">
                                        <option value="pendente" {{ old('status', $tarefa->status) === 'pendente' ? 'selected' : '' }}>{{ __('Pendente') }}</option>
                                        <option value="em_andamento" {{ old('status', $tarefa->status) === 'em_andamento' ? 'selected' : '' }}>{{ __('Em andamento') }}</option>
                                        <option value="concluida" {{ old('status', $tarefa->status) === 'concluida' ? 'selected' : '' }}>{{ __('Concluída') }}</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('status')" class="mt-2" />
                                </div>

                                <div>
                                    <x-input-label for="prazo" :value="__('Prazo')" />
                                    <x-text-input id="prazo" name="prazo" type="date" class="mt-1 block w-full" value="{{ old('prazo', optional($tarefa->prazo)->format('Y-m-d')) }}" />
                                    <x-input-error :messages="$errors->get('prazo')" class="mt-2" />
                                </div>
                            </div>

                            <div class="grid gap-4 md:grid-cols-2">
                                <div>
                                    <x-input-label for="prioridade" :value="__('Prioridade')" />
                                    <x-text-input id="prioridade" name="prioridade" type="number" min="1" max="5" class="mt-1 block w-full" value="{{ old('prioridade', $tarefa->prioridade) }}" required />
                                    <x-input-error :messages="$errors->get('prioridade')" class="mt-2" />
                                </div>

                                <div>
                                    <x-input-label for="concluido_em" :value="__('Data de conclusão')" />
                                    <x-text-input id="concluido_em" name="concluido_em" type="date" class="mt-1 block w-full" value="{{ old('concluido_em', optional($tarefa->concluido_em)->format('Y-m-d')) }}" />
                                    <x-input-error :messages="$errors->get('concluido_em')" class="mt-2" />
                                </div>
                            </div>

                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Atualizar tarefa') }}</x-primary-button>
                                <a href="{{ route('dashboard') }}" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-200">{{ __('Cancelar') }}</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
