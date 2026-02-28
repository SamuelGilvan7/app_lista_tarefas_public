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

        $TarefaService = new TarefaService($conexao, $Tarefa);
        $todas_tarefas = $TarefaService->recuperar();
    }




?>