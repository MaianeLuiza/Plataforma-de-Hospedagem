<?php

namespace App\Http\Controllers;
use App\Models\Aplicacao;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AplicacaoController extends Controller
{
    
    public function index()
    {
        $aplicacoes = Aplicacao::all();
        return view('aplicacoes.index', ['aplicacoes'=>$aplicacoes]);
    }

    public function create()
    {
        return view('aplicacoes.create');
    }

    public function store(Request $request)
    {
        if (auth()->check()) {
            $request->validate([
                'nome' => 'required',
                'descricao' => 'required',
                'link' => 'required',
            ]);

            $aplicacao = new Aplicacao;
            $aplicacao->nome = $request->nome;
            $aplicacao->descricao = $request->descricao;
            $aplicacao->link = $request->link;
            $aplicacao->usuario_id = auth()->user()->id; 
            $aplicacao->save();

            if ($request->hasFile('imagem')) {
                $imagem = $request->file('imagem');
                $imagemNome = time() . '.' . $imagem->getClientOriginalExtension();
                $imagem->move(public_path('imagens/aplicacoes'), $imagemNome);
                $aplicacao->imagem = $imagemNome;
                $aplicacao->save();
            }

    
            return redirect()->route('aplicacoes-index');
        } else {
            return 'Usuário não autenticado.';
        }
    }

    public function show($id)
    {
    $aplicacao = Aplicacao::find($id);

    if ($aplicacao) {
        return view('aplicacoes.show', compact('aplicacao'));
    }

    return redirect()->route('aplicacoes-index');
    }

    public function edit($id)
    {
        $aplicacoes = Aplicacao::where('id',$id)->first();
        
        if(!empty($aplicacoes)){
            return view('aplicacoes.edit', ['aplicacoes'=>$aplicacoes]);
        } else {
            return redirect()->route('aplicacoes-index');
        }
       
    }

    public function update(Request $request, $id)
    {

    $aplicacao = Aplicacao::find($id);
        $data = [
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'link' => $request->link,
        ];

        if ($request->hasFile('imagem')) {
            $imagem = $request->file('imagem');
            $imagemNome = time() . '.' . $imagem->getClientOriginalExtension();
            $imagem->move(public_path('imagens/aplicacoes'), $imagemNome);
            $data['imagem'] = $imagemNome;
        }

        Aplicacao::where('id', $id)->update($data);
        return redirect()->route('aplicacoes-index');
    }

    public function destroy($id)
    {
        Aplicacao::where('id', $id)->delete();
        return redirect()->route('aplicacoes-index');
    }
}
