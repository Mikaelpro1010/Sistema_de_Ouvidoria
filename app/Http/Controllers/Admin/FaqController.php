<?php

namespace App\Http\Controllers\Admin;

use App\Models\Faq;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class FaqController extends Controller
{
    public function listar(){
        $faqs = Faq::query()
        ->when(request()->pesquisa, function ($query) {
            $query->where('pergunta', 'like', "%" . request()->pesquisa . "%");
        })
        ->orderBy('ordem', 'asc')

        ->paginate(10)
        ->appends(
            ['pesquisa' => request()->pesquisa]
        );

        return view('admin.faq.listar-faq', ['faqs' => $faqs]);
    }

    public function visualizarCadastro()
    {
        return view('admin.faq.vis-cadastro-faq');
    }

    public function cadastrarFaq(Request $request)
    {
        $validator = Validator::make(
            $request->only(['pergunta','resposta']),
            [
                'pergunta' => 'required|string|max:255',
                'resposta' => 'required|string|max:255',
            ],
            [
                'pergunta.required' => 'É necessário inserir uma pergunta!',
                'resposta.required' => 'É necessário inserir uma resposta!',
                'max' => 'Quantidade de caracteres ultrapassada, o nome deve ter menos que 254 caracteres!',
            ]
        );

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $faq = new Faq();

        $faq->ativo = true;
        $faq->pergunta = $request->pergunta;
        $faq->resposta = $request->resposta;

        $faq->save();

        return redirect()->route('listagem-faq');
    }

    public function visualizarFaq($id)
    {
        $faqs = Faq::find($id);

        return view('admin.faq.visualizar-faq', ['faqs' => $faqs]);
    }

    public function ativareDesativar($id)
    {
        $faq = Faq::find($id);
        $faq->ativo = !$faq->ativo;
        $faq->save();

        return redirect()->route('listagem-faq');
    }

    public function editarFaq($id)
    {
        $faq = Faq::find($id);
        return view('admin.faq.editar-faq', ['faq' => $faq]);
    }

    public function atualizar(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'pergunta' => 'required|string|max:255',
                'resposta' => 'required|string|max:255',
            ],
            [
                'pergunta.required' => 'É necessário inserir uma pergunta!',
                'resposta.required' => 'É necessário inserir uma resposta!',
                'required' => 'Quantidade de caracteres ultrapassada, o nome deve ter menos que 254 caracteres!',
            ]
        );

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $faq = Faq::find($id);

        $faq->pergunta = $request->pergunta;
        $faq->resposta = $request->resposta;
        $faq->save();

        return redirect()->route('listagem-faq', $faq->id)->with('mensagem', 'Atualizado com sucesso!');
    }

    public function deletarFaq(Request $id)
    {
        $faq = Faq::find($id);
        $faq->delete();
        return redirect()->route('listagem-faq')->with('mensagem', 'Deletado com sucesso!');
    }

    public function ordenarFaq(Request $request){
        foreach($request->ordem as $key=>$ordem){
            $faq = Faq::find($ordem);
            $faq->ordem = $key+1;
            $faq->save();
        }
        return json_encode(['success'=> 'true', 'message'=> 'Ordem alterada com sucesso!']);
    }
}
