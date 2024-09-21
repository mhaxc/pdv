<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteRequest;
use App\Models\Cliente;
use Illuminate\Http\Request;


class ClienteController extends Controller
{

    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index', compact('clientes'));
    }


    public function create()
    {
        return view('clientes.create');
    }


    public function store(ClienteRequest $clienteRequest)
    {
        Cliente::create($clienteRequest->all());

        return redirect()->route('clientes.index')->with('success', 'Cliente criado com sucesso');

    }

    public function show(Cliente $cliente)
    {
        return view('clientes.show', compact('cliente'));
    }


    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }


    public function update(ClienteRequest $clienteRequest, Cliente $cliente)
    {
        $cliente->update($clienteRequest->all());
        return redirect()->route('clientes.index')->with('success', 'cliente atualizado com sucesso');;
    }


    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return redirect()->route('clientes.index');
    }
}
