<?php

namespace App\Http\Controllers;

use App\Funcionario;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{   
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $funcionarios = Funcionario::all();
        return view('listarFuncionarios', compact('funcionarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cadastroFuncionarios');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* Validação dos dados do formulário */
        $request->validate([
            'nome'=>'required|min:2|max:50',
            'email'=>'required|email',
            'data_nascimento'=>'required|min:10|max:10', 
            'rg'=>'required|min:12|max:12',
            'cpf'=>'required|min:14|max:14',
            'celular'=>'required|min:15|max:15',
            'telefone'=>'required|min:14|max:14',
            'cargo'=>'required|min:2|max:50',
            'setor'=>'required|min:2|max:50',
            'salario'=>'required|min:2|max:22',
            'logradouro'=>'required|min:2|max:50',
            'numero'=>'required|min:1|max:10',
            'complemento'=>'required|min:2|max:50',
            'bairro'=>'required|min:2|max:50',
            'cidade'=>'required|min:2|max:50',
            'estado'=>'required|min:2|max:2'
        ]);

        $funcionarios = new Funcionario([
            'nome'=>$request->get('nome'),
            'email'=>$request->get('email'),
            'data_nascimento'=>$request->get('data_nascimento'),
            'rg'=>$request->get('rg'),
            'cpf'=>$request->get('cpf'),
            'celular'=>$request->get('celular'),
            'telefone'=>$request->get('telefone'),
            'cargo'=>$request->get('cargo'),
            'setor'=>$request->get('setor'),
            'salario'=>$request->get('salario'),
            'logradouro'=>$request->get('logradouro'),
            'numero'=>$request->get('numero'),
            'complemento'=>$request->get('complemento'),
            'bairro'=>$request->get('bairro'),
            'cidade'=>$request->get('cidade'),
            'estado'=>$request->get('estado')
        ]);
        
        /* Executa query - Comando exclusivo para realização de INSERT no banco de dados*/
            $funcionarios->save();
            return redirect('/funcionarios')->with('success', 'Dados inseridos com sucesso!');
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome'=>'required|min:2|max:50',
            'email'=>'required|email',
            'data_nascimento'=>'required|min:10|max:10', 
            'rg'=>'required|min:12|max:12',
            'cpf'=>'required|min:14|max:14',
            'celular'=>'required|min:15|max:15',
            'telefone'=>'required|min:14|max:14',
            'cargo'=>'required|min:2|max:50',
            'setor'=>'required|min:2|max:50',
            'salario'=>'required|min:2|max:22',
            'logradouro'=>'required|min:2|max:50',
            'numero'=>'required|min:1|max:10',
            'complemento'=>'required|min:2|max:50',
            'bairro'=>'required|min:2|max:50',
            'cidade'=>'required|min:2|max:50',
            'estado'=>'required|min:2|max:2'
            ]);
      
            $funcionarios = Funcionario::find($id);
            $funcionarios->nome = $request->get('nome');
            $funcionarios->email = $request->get('email');
            $funcionarios->data_nascimento = $request->get('data_nascimento');
            $funcionarios->rg = $request->get('rg');
            $funcionarios->cpf = $request->get('cpf');
            $funcionarios->celular = $request->get('celular');
            $funcionarios->telefone = $request->get('telefone');
            $funcionarios->cargo = $request->get('cargo');
            $funcionarios->setor = $request->get('setor');
            $funcionarios->salario = $request->get('salario');
            $funcionarios->logradouro = $request->get('logradouro');
            $funcionarios->numero = $request->get('numero');
            $funcionarios->complemento = $request->get('complemento');
            $funcionarios->bairro = $request->get('bairro');
            $funcionarios->cidade = $request->get('cidade');
            $funcionarios->estado = $request->get('estado');
            $funcionarios->save();
      
            return redirect('/funcionarios')->with('success', 'Dados alterados com sucesso!');
    }

    public function destroy(Request $request, $id)
    {
        $funcionarios = Funcionario::find($id);
        $funcionarios->delete();
        
        return redirect('/funcionarios')->with('success', 'Usuário deletado com sucesso!');
    }
}
