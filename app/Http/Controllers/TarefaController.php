<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use Illuminate\Http\Request;

class TarefaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tarefas = auth()->user()->tarefas()->latest()->get();

        return view('tarefas.index', compact('tarefas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tarefas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'titulo' => ['required', 'string', 'max:255'],
            'descricao' => ['nullable', 'string'],
            'status' => ['required', 'in:pendente,em_andamento,concluida'],
            'prazo' => ['nullable', 'date'],
            'prioridade' => ['required', 'integer', 'min:1', 'max:5'],
            'concluido_em' => ['nullable', 'date'],
        ]);

        $data['user_id'] = auth()->id();

        if ($data['status'] === 'concluida' && empty($data['concluido_em'])) {
            $data['concluido_em'] = now();
        }

        Tarefa::create($data);

        return redirect()->route('dashboard')->with('success', 'Tarefa criada com sucesso.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tarefa $tarefa)
    {
        abort_if($tarefa->user_id !== auth()->id(), 403);

        return view('tarefas.edit', compact('tarefa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tarefa $tarefa)
    {
        abort_if($tarefa->user_id !== auth()->id(), 403);

        $data = $request->validate([
            'titulo' => ['required', 'string', 'max:255'],
            'descricao' => ['nullable', 'string'],
            'status' => ['required', 'in:pendente,em_andamento,concluida'],
            'prazo' => ['nullable', 'date'],
            'prioridade' => ['required', 'integer', 'min:1', 'max:5'],
            'concluido_em' => ['nullable', 'date'],
        ]);

        if ($data['status'] === 'concluida' && empty($data['concluido_em'])) {
            $data['concluido_em'] = now();
        }

        $tarefa->update($data);

        return redirect()->route('dashboard')->with('success', 'Tarefa atualizada com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tarefa $tarefa)
    {
        abort_if($tarefa->user_id !== auth()->id(), 403);

        $tarefa->delete();

        return redirect()->route('dashboard')->with('success', 'Tarefa excluída com sucesso.');
    }
}
