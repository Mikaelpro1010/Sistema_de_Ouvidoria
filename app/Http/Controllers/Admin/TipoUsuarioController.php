<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TipoUsuario;
use Illuminate\Support\Facades\Validator;

class TipoUsuarioController extends Controller
{
    public function listar(){
        // $tipos_usuario = TipoUsuario::query()->get();
        $tipos_usuario = TipoUsuario::query()
            ->when(request()->pesquisa, function($query){
                $query->where('nome', 'like', "%". request()->pesquisa."%")
                ->orWhere('descricao', 'like', "%". request()->pesquisa."%");
            })  
            ->orderBy('updated_at', 'desc')
            ->paginate(10)
            ->appends(
                ['pesquisa'=>request()->pesquisa]
            );
        
        return view('admin.tipo_usuario.listar-tipo_usuario', ['tipos_usuario' => $tipos_usuario]);
    }

    public function visualizarCadastro()
    {
        return view('admin.tipo_usuario.vis-cadastro-tipo_usuario');
    }

    public function visualizarTipoUsuario($id)
    {
        $tipos_usuario = TipoUsuario::find($id);

        return view('admin.tipo_usuario.visualizar-tipo_usuario', ['tipos_usuario' => $tipos_usuario]);
    }

    public function cadastrarTipoUsuario(Request $request){
        $validator = Validator::make(
            $request->only(['nome','slug','descricao']),
            [
                'nome' => 'required|string|max:255',
                'slug' => 'required|string|max:255',
                'descricao' => 'nullable|string',
            ],
            [
                'nome.required' => 'É necessário inserir um nome!',
                'slug.required' => 'É necessário inserir um slug!',
                'max' => 'Quantidade de caracteres ultrapassada, o nome deve ter menos que 254 caracteres!',
            ]
        );

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $tipos_usuario = new TipoUsuario();

        $tipos_usuario->nome = $request->nome;
        $tipos_usuario->slug = $request->slug;
        $tipos_usuario->descricao = $request->descricao;

        $tipos_usuario->save();

        return redirect()->route('listagem-tipo_usuario');
    }

    public function editarTipoUsuario($id)
    {
        $tipos_usuario = TipoUsuario::find($id);
        return view('admin.tipo_usuario.editar-tipo_usuario', ['tipos_usuario' => $tipos_usuario]);
    }
    
    public function atualizar(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nome' => 'required|string|max:255',
                'slug' => 'required|string|max:255',
                'descricao' => 'nullable|string',
            ],
            [
                'nome.required' => 'É necessário possuir um nome para ser editado!',
                'slug.required' => 'É necessário possuir um slug para ser editado!',
                'descricao.required' => 'É necessário possuir um texto para ser editado!',
                'max' => 'Quantidade de caracteres ultrapassada, o nome deve ter menos que 254 caracteres!',
            ]
        );

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $tipos_usuario = TipoUsuario::find($id);

        $tipos_usuario->nome = $request->nome;
        $tipos_usuario->slug = $request->slug;
        $tipos_usuario->descricao = $request->descricao;
        $tipos_usuario->save();

        return redirect()->route('listagem-tipo_usuario', $tipos_usuario->id)->with('mensagem', 'Atualizado com sucesso!');
    }

    
    public function deletarTipoUsuario(Request $request)
    {
        $tipos_usuario = TipoUsuario::find($request->id);
        $tipos_usuario->delete();
        return redirect()->route('listagem-tipo_usuario')->with('mensagem', 'Deletado com sucesso!');
    }

}
