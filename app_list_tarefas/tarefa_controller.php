<?php 
    require_once "app_list_tarefas/conexao.php";
    require_once "app_list_tarefas/tarefa.model.php";
    require_once "app_list_tarefas/tarefa.service.php";

    $Tarefa = new Tarefa();
    $Tarefa->__set('Tarefa',$_POST['tarefa']);

    $conexao = new conexao();

$TarefaService = new TarefaService($conexao, $Tarefa);
$TarefaService->insert();




?>