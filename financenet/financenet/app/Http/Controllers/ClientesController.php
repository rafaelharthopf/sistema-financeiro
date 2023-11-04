<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\User;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, $id)
    {
        $cliente = Cliente::findOrFail($id);

        $request->validate([
            'nome_completo' => 'required|string|max:125',
            'data_nascimento' => 'nullable|date',
            'cpf' => 'required|string',
            'email' => 'required|email',
            'telefone' => 'nullable|string|max:20',
            'cidade' => 'nullable|string|max:50',
            'estado' => 'nullable|string|max:50',
            'rua' => 'nullable|string',
            'bairro' => 'nullable|string',
            'numero' => 'nullable|string',
        ]);

        $cliente->nome_completo = $request->input('nome_completo');
        $cliente->data_nascimento = $request->input('data_nascimento');
        $cliente->cpf = $request->input('cpf');
        $cliente->email = $request->input('email');
        $cliente->telefone = $request->input('telefone');
        $cliente->cidade = $request->input('cidade');
        $cliente->estado = $request->input('estado');
        $cliente->rua = $request->input('rua');
        $cliente->bairro = $request->input('bairro');
        $cliente->numero = $request->input('numero');
        $cliente->save();

        return redirect()->route('listagem')->with('success', 'Usuário atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);

        try {
            $cliente->delete();
        } catch (\Exception $e) {
            // var_dump($e->getMessage());
            return redirect()->route('listagem')->with('error', 'Erro ao excluir o cliente.');
        }

        return redirect()->route('listagem')->with('success', 'Cliente excluído com sucesso!');
    }

    public function listClientes()
    {
        $clientes = Cliente::all();
        return view('clientes.listagem', compact('clientes'));
    }
}
