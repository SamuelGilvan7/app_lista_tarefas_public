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

    public function recuperar() {

    $query = 'SELECT t.id, s.status, t.tarefa 
              FROM tb_tarefas as t
              LEFT JOIN tb_status as s 
              ON (t.id_status = s.id)';

    $stmt = $this->conexao->prepare($query);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_OBJ);
}

    public function atualizar() {

    $query = "UPDATE tb_tarefas 
              SET tarefa = :tarefa 
              WHERE id = :id";

    $stmt = $this->conexao->prepare($query);

    $stmt->bindValue(':tarefa', $this->Tarefa->__get('tarefa'));
    $stmt->bindValue(':id', $this->Tarefa->__get('id'));

    return $stmt->execute();
}

    public function delete(){
    
    }   




}    
?>