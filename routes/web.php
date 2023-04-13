<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;

Auth::routes();

Route::middleware(['auth'])->group(
    function(){
        Route::get('estado_processo/listar', 'Admin\EstadoProcessoController@listar')->name("listagem-estado_processo");
        Route::get('estado_processo/{id}/ativar', 'Admin\EstadoProcessoController@ativareDesativar')->name("ativar-estado_processo");
        Route::get('estado_processo/cadastrar', 'Admin\EstadoProcessoController@visualizarCadastro')->name("vis-cadastro-estado_processo");
        Route::post('estado_processo/cadastrar/novo', 'Admin\EstadoProcessoController@cadastrarEstadoProcesso')->name("cadastrar-estado_processo");
        Route::get('estado_processo/editar/{id}', 'Admin\EstadoProcessoController@editarEstadoProcesso')->name("vis-editar-estado_processo");
        Route::post('estado_processo/atualizar/{id}', 'Admin\EstadoProcessoController@atualizar')->name("editar-estado_processo");
        Route::get('estado_processo/visualizar/{id}', 'Admin\EstadoProcessoController@visualizarEstadoProcesso')->name("visualizar-estado_processo");
        Route::post('estado_processo/deletar', 'Admin\EstadoProcessoController@deletarEstadoProcesso')->name("deletar-estado_processo");
        
        Route::get('tipo_usuario/listar', 'Admin\TipoUsuarioController@listar')->name("listagem-tipo_usuario");
        Route::get('tipo_usuario/cadastrar', 'Admin\TipoUsuarioController@visualizarCadastro')->name("vis-cadastro-tipo_usuario");
        Route::post('tipo_usuario/cadastrar/novo', 'Admin\TipoUsuarioController@cadastrarTipoUsuario')->name("cadastrar-tipo_usuario");
        Route::get('tipo_usuario/visualizar/{id}', 'Admin\TipoUsuarioController@visualizarTipoUsuario')->name("visualizar-tipo_usuario");
        Route::get('tipo_usuario/editar/{id}', 'Admin\TipoUsuarioController@editarTipoUsuario')->name("vis-editar-tipo_usuario");
        Route::post('tipo_usuario/atualizar/{id}', 'Admin\TipoUsuarioController@atualizar')->name("editar-tipo_usuario");
        Route::post('tipo_usuario/deletar', 'Admin\TipoUsuarioController@deletarTipoUsuario')->name("deletar-tipo_usuario");

        Route::get('motivacao/listar', 'Admin\MotivacaoController@listar')->name("listagem-motivacao");
        Route::get('motivacao/{id}/ativar', 'Admin\MotivacaoController@ativareDesativar')->name("ativar-motivacao");
        Route::get('motivacao/cadastrar', 'Admin\MotivacaoController@visualizarCadastro')->name("vis-cadastro-motivacao");
        Route::post('motivacao/cadastrar/novo', 'Admin\MotivacaoController@cadastrarMotivacao')->name("cadastrar-motivacao");
        Route::get('motivacao/editar/{id}', 'Admin\MotivacaoController@editarMotivacao')->name("vis-editar-motivacao");
        Route::post('motivacao/atualizar/{id}', 'Admin\MotivacaoController@atualizar')->name("editar-motivacao");
        Route::get('motivacao/visualizar/{id}', 'Admin\MotivacaoController@visualizarMotivacao')->name("visualizar-motivacao");
        Route::post('motivacao/deletar', 'Admin\MotivacaoController@deletarMotivacao')->name("deletar-motivacao");
        
        
        Route::get('tipo_manifestacao/listar', 'Admin\TipoManifestacaoController@listar')->name("listagem-tipo_manifestacao");
        Route::get('tipo_manifestacao/{id}/ativar', 'Admin\TipoManifestacaoController@ativareDesativar')->name("ativar-tipo_manifestacao");
        Route::get('tipo_manifestacao/cadastrar', 'Admin\TipoManifestacaoController@visualizarCadastro')->name("vis-cadastro-tipo_manifestacao");
        Route::post('tipo_manifestacao/cadastrar/novo', 'Admin\TipoManifestacaoController@cadastrarTipoManifestacao')->name("cadastrar-tipo_manifestacao");
        Route::get('tipo_manifestacao/editar/{id}', 'Admin\TipoManifestacaoController@editarTipoManifestacao')->name("vis-editar-tipo_manifestacao");
        Route::post('tipo_manifestacao/atualizar/{id}', 'Admin\TipoManifestacaoController@atualizar')->name("editar-tipo_manifestacao");
        Route::get('tipo_manifestacao/visualizar/{id}', 'Admin\TipoManifestacaoController@visualizarTipoManifestacao')->name("visualizar-tipo_manifestacao");
        Route::post('tipo_manifestacao/deletar', 'Admin\TipoManifestacaoController@deletarTipoManifestacao')->name("deletar-tipo_manifestacao");
        
        
        Route::get('situacao/listar', 'Admin\SituacaoController@listar')->name("listagem-situacao");
        Route::get('situacao/{id}/ativar', 'Admin\SituacaoController@ativareDesativar')->name("ativar-situacao");
        Route::get('situacao/cadastrar', 'Admin\SituacaoController@visualizarCadastro')->name("vis-cadastro-situacao");
        Route::post('situacao/cadastrar/novo', 'Admin\SituacaoController@cadastrarSituacao')->name("cadastrar-situacao");
        Route::get('situacao/editar/{id}', 'Admin\SituacaoController@editarSituacao')->name("vis-editar-situacao");
        Route::post('situacao/atualizar/{id}', 'Admin\SituacaoController@atualizar')->name("editar-situacao");
        Route::get('situacao/visualizar/{id}', 'Admin\SituacaoController@visualizarSituacao')->name("visualizar-situacao");
        Route::post('situacao/deletar', 'Admin\SituacaoController@deletarSituacao')->name("deletar-situacao");
        

        Route::get('secretarias/listar', 'Admin\SecretariaController@listar')->name("listagem-secretarias");
        Route::get('secretarias/{id}/ativar', 'Admin\SecretariaController@ativareDesativar')->name("ativar-secretarias");
        Route::get('secretarias/cadastrar', 'Admin\SecretariaController@visualizarCadastro')->name("vis-cadastro-secretarias");
        Route::post('secretarias/cadastrar/novo', 'Admin\SecretariaController@cadastrarSecretaria')->name("cadastrar-secretaria");
        Route::get('secretarias/editar/{id}', 'Admin\SecretariaController@editarSecretaria')->name("vis-editar-secretarias");
        Route::post('secretarias/atualizar/{id}', 'Admin\SecretariaController@atualizar')->name("editar-secretarias");
        Route::get('secretarias/visualizar/{id}', 'Admin\SecretariaController@visualizarSecretaria')->name("visualizar-secretarias");
        Route::post('secretarias/deletar', 'Admin\SecretariaController@deletarSecretaria')->name("deletar-secretaria");
        // Route::post('secretarias/manifestacao/visualizar', 'Admin\SecretariaController@selecionarSecretaria')->name("selecionar-secretaria");
        
        Route::get('manifestacao/listar', 'Admin\ManifestacaoController@listar')->name("listagem-manifestacao");
        Route::get('manifestacao/cadastrar', 'Admin\ManifestacaoController@visualizarCadastro')->name("vis-cadastro-manifestacao");
        Route::post('manifestacao/admin_cadastrar/novo', 'Admin\ManifestacaoController@cadastrarManifestacao')->name("admin-cadastrar-manifestacao");
        Route::get('manifestacao/visualizar/{id}', 'Admin\ManifestacaoController@visualizarManifestacao')->name("visualizar-manifestacao");
        Route::post('manifestacao/{id}/prorrogacao/create', 'Admin\ProrrogacaoController@create')->name("criar-prorrogacao");
        Route::post('manifestacao/respostas/{manifestacao_id}', 'Admin\RespostasController@createRespostas')->name("criar-respostas");
        Route::post('manifestacao/compartilhamento/{manifestacao_id}', 'Admin\CompartilhamentoController@compartilharManifestacao')->name("compartilhar-manifestacao");
        
        Route::get('faq/listar', 'Admin\FaqController@listar')->name("listagem-faq");
        Route::get('faq/visualizar/{id}', 'Admin\FaqController@visualizarFaq')->name("visualizar-faq");
        Route::get('faq/{id}/ativar', 'Admin\FaqController@ativareDesativar')->name("ativar-faq");
        Route::get('faq/editar/{id}', 'Admin\FaqController@editarFaq')->name("vis-editar-faq");
        Route::post('faq/atualizar/{id}', 'Admin\FaqController@atualizar')->name("editar-faq");
        Route::post('faq/deletar', 'Admin\FaqController@deletarFaq')->name("deletar-faq");
        Route::get('faq/cadastrar', 'Admin\FaqController@visualizarCadastro')->name("vis-cadastro-faq");
        Route::post('faq/cadastrar/novo', 'Admin\FaqController@cadastrarfaq')->name("cadastrar-faq");
        Route::post('faq/ordenar', 'Admin\FaqController@ordenarFaq')->name("ordenar-faq");

        Route::get('manifestacao/visualizar-respostas', 'Admin\RespostasController@visualizarRespostas')->name("visualizar-respostas");
    });

Route::get('/', 'Publico\FaqController@paginaInicial')-> name("pagina-inicial");

Route::get('faq/exibir', 'Publico\FaqController@exibir')->name("exibir-faq");

Route::post('pagina-manifestacao/recurso', 'Publico\RecursoController@createRecurso')->name("criar-recurso");
Route::post('visualizar-manifestacao/resposta/{manifestacao_id}/{recurso_id}', 'Admin\RecursoController@createResposta')->name("criar-resposta");
Route::get('pagina-manifestacao/visualizar', 'Publico\PaginaManifestacaoController@visualizarPagina')->name("vis-pagina_manifestacao");
Route::post('pagina-manifestacao/visualizar-manifestacao', 'Publico\PaginaManifestacaoController@visualizarManifestacao')->name("vis-manifestacao");
Route::post('manifestacao/cadastrar/novo', 'Publico\PaginaManifestacaoController@cadastrar')->name("cadastrar-manifestacao");

Route::get('home/', 'Admin\HomeController@dashboard')->name('home');