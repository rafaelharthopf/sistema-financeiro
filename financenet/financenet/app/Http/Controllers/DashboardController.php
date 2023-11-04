<?php

namespace App\Http\Controllers;
use App\Models\Cliente;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index() {
        $user = Auth::user();
        return view('dashboard.index', ['user' => $user]);
    }
    public function create()
    {
        return view('dashboard.cadastro');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
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

        if (Cliente::where('cpf', $request->cpf)->exists()) {
            return redirect()->route('cadastro')->with('error', 'CPF já cadastrado.');
        } elseif (Cliente::where('email', $request->email)->exists()) {
            return redirect()->route('cadastro')->with('error', 'Email já cadastrado');
        }

        // Se não existe, cria o novo cliente
        Cliente::create($request->all());

        return redirect()->route('sucesso');
    }

    public function sucesso()
    {
        return view('dashboard.sucesso'); // Exibe a página de sucesso após o cadastro
    }



}
