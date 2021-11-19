<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class ClienteControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::all();

        return view('clientes', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('novocliente');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* Uma forma de fazer
        $request->validate([
            'nome' => 'required|min:3|max:20|unique:clientes',
            'idade' => 'required',
            'endereco' => 'required|min:5',
            'email' => 'required|email'
        ]);
        */

        // Outra forma de fazer
        $regras = [
            'nome' => 'required|min:3|max:20|unique:clientes',
            'idade' => 'required',
            'endereco' => 'required|min:5',
            'email' => 'required|email'
        ];

        $mensagem = [
            'required' => 'Esse campo chamado :attribute é obrigatório',
            'nome.required' => 'O nome é obrigatório',
            'nome.min' => 'É necessário no mínimo 3 caracteres no nome',
            'email.required' => 'O e-mail é obrigatório',
            'email.email' => 'O e-mail não é válido',
            'endereco.min' => 'O campo :attribute precisa ter no mínimo 5 caracteres'
        ];

        $request->validate($regras, $mensagem);

        $cliente = new Cliente();
        $cliente->nome = $request->input('nome');
        $cliente->idade = $request->input('idade');
        $cliente->endereco = $request->input('endereco');
        $cliente->email = $request->input('email');

        $cliente->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
