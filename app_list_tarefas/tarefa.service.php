<?php 

    //CRUD
class TarefaService {
    private $conexao;
    private $Tarefa;
    public function __construct(conexao $conexao, Tarefa $Tarefa) {
        $this->conexao = $conexao->conectar();
        $this->Tarefa = $Tarefa;
    }

    public function insert(){
        $query = 'insert into tb_tarefas (tarefa) values (:tarefa)';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':tarefa',$this->Tarefa->__get('tarefa'), PDO::PARAM_STR);
        $stmt->execute();
    }
    public function update(){
    
    }

    public function delete(){
    
    }   

    public function remove(){

    }


}    
?>