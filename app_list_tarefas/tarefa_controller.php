<?php 
    require_once "app_list_tarefas/conexao.php";
    require_once "app_list_tarefas/tarefa.model.php";
    require_once "app_list_tarefas/tarefa.service.php";

    $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

    if ($acao  == 'inserir') {
        $Tarefa = new Tarefa();
        $Tarefa->__set('Tarefa',$_POST['tarefa']);

        $conexao = new conexao();

        $TarefaService = new TarefaService($conexao, $Tarefa);
        $TarefaService->insert();
        header('Location:nova_tarefa.php?inclusao=1');
        exit;
    } else if ($acao == 'recuperar'){
        $Tarefa = new Tarefa();
        $conexao = new conexao();

        $TarefaService = new TarefaService($conexao,  $Tarefa);
        $todas_tarefas = $TarefaService->recuperar();
    } else if ($acao == 'atualizar'){
        
        // echo print_r($_POST);
        $Tarefa = new Tarefa();
        $conexao = new conexao();

        // Encadeamento de métodos (method chaining):
        // O primeiro __set define o 'id' e retorna o objeto
        // O segundo __set usa esse retorno para definir 'tarefa'
        $Tarefa->__set('id',$_POST['id'])
                ->__set('tarefa',$_POST['tarefa']);
        
        $TarefaService = new TarefaService($conexao,$Tarefa);
        if ($TarefaService->atualizar()){
            header('location: todas_tarefas.php');
        }
        
        //echo $TarefaService->update();
        
    } else if ($acao == 'remover'){
        $Tarefa = new Tarefa();
        $Tarefa->__set('id',$_GET['id']);

        $conexao = new conexao();

        $TarefaService = new TarefaService($conexao,$Tarefa);
        $TarefaService->delete();

        header('location: todas_tarefas.php');
    }




?>