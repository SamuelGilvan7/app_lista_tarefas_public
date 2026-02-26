<?php 
//CRUD  
class TarefaService {

    private $conexao;
    private $tarefa;

    public function __construct(Conexao $conexao, Tarefa $tarefa) {
        $this->conexao = $conexao->conctar();
        $this->tarefa = $tarefa;
    }
    public function inserir() { //creat
        $query = "insert into tb_tarefas (tarefa) values(:tarefa)";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':tarefa', $this->tarefa->__get('tarefa'), PDO::PARAM_STR);
        $stmt->execute();
        }
    
    public function recuperar() { //read

    }

    public function atualizar() { //update

    }

    public function remover() {//delete

    }
}

?>