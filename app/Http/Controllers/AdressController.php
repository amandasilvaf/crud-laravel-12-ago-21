<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adress;
use Illuminate\Foundation\Validation\ValidatesRequests;

class AdressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enderecos = Adress::orderBy('id')->get();
        return view('adresses.enderecos', compact('enderecos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adresses.novoEndereco');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mensagens = [
            'logradouro.required' => 'Informe o logradouro',
            'numero.required' => 'Informe o número',
            'numero.max' => 'O número deve conter no máximo 4 caracteres',
            'bairro.required' => 'Informe o bairro',
            'cidade.required' => 'Informe a cidade',
            'estado.required' => "Informe o estado"
        ];

        $request->validate([
            'logradouro' => 'required',
            'numero' => 'required| max:4',
            'bairro' => 'required',
            'cidade' => 'required',
            'estado' => 'required'
        ], $mensagens);

        $endereco = new Adress();
        $endereco->logradouro = $request->input('logradouro');
        $endereco->numero = $request->input('numero');
        $endereco->bairro = $request->input('bairro');
        $endereco->cidade = $request->input('cidade');
        $endereco->estado = $request->input('estado');
        $endereco->user_id= 1;
        $endereco->save();
        return redirect('/enderecos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $endereco = Adress::find($id);
        if (isset($endereco)){
            return view('adresses.editarEndereco', compact('endereco'));
        }else{
            return redirect('/enderecos');   
        }
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
        $mensagens = [
            'logradouro.required' => 'Informe o logradouro',
            'numero.required' => 'Informe o número',
            'numero.max' => 'O número deve conter no máximo 4 caracteres',
            'bairro.required' => 'Informe o bairro',
            'cidade.required' => 'Informe a cidade',
            'estado.required' => "Informe o estado"
        ];

        $request->validate([
            'logradouro' => 'required',
            'numero' => 'required| max:4',
            'bairro' => 'required',
            'cidade' => 'required',
            'estado' => 'required'
        ], $mensagens);

        $endereco = Adress::find($id);
      
            $endereco->logradouro = $request->input('logradouro');
            $endereco->numero = $request->input('numero');
            $endereco->bairro = $request->input('bairro');
            $endereco->cidade = $request->input('cidade');
            $endereco->estado = $request->input('estado');
            $endereco->user_id = 1;
            $endereco->save();
     
            return redirect('/enderecos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $endereco = Adress::find($id);
        if(isset($endereco)){
            $endereco->delete();
        }
        return redirect('/enderecos');
    }
}
