<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adress;


class AdressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index($user)
    {
        $user_id = $user;
        $enderecos = Adress::orderBy('id')->get();
        return view('adresses.enderecos', compact(['enderecos', 'user_id']));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($user)
    {
        $user_id = $user;
        return view('adresses.novoEndereco', compact('user_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $user)
    {
        $mensagens = [
            'required' => 'Informe o campo :attribute',
            'numero.max' => 'O número deve conter no máximo 4 caracteres',
            
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
        $endereco->user_id= $user;
        $endereco->save();
        
        return redirect()->route('enderecos', $user);
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
        $user_id = $endereco->user_id;
        if (isset($endereco)){
            return view('adresses.editarEndereco', compact(['endereco', 'user_id']));
        }else{
            return redirect()->route('enderecos', $user_id); 
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
        $user_id = $endereco->user_id;

            $endereco->logradouro = $request->input('logradouro');
            $endereco->numero = $request->input('numero');
            $endereco->bairro = $request->input('bairro');
            $endereco->cidade = $request->input('cidade');
            $endereco->estado = $request->input('estado');
            $endereco->user_id = $user_id;
            $endereco->save();
     
            return redirect()->route('enderecos', $user_id); 
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
        $user_id = $endereco->user_id;
        if(isset($endereco)){
            $endereco->delete();
        }
        return redirect()->route('enderecos', $user_id); 
    }
}
