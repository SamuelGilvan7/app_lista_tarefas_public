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
    // Define a query SQL para atualizar uma tarefa no banco
    // O "?" são placeholders (valores que serão substituídos depois)
    $query = "UPDATE tb_tarefas 
            SET tarefa = ? 
            WHERE id = ?";

    // Prepara a query para execução (mais seguro contra SQL Injection)
    $stmt = $this->conexao->prepare($query);

    // Substitui o primeiro "?" pelo valor da tarefa
    // __get('tarefa') pega o valor do atributo 'tarefa' do objeto
    $stmt->bindValue(1, $this->Tarefa->__get('tarefa'));

    // Substitui o segundo "?" pelo id da tarefa
    // __get('id') pega o valor do atributo 'id' do objeto
    $stmt->bindValue(2, $this->Tarefa->__get('id'));

    // Executa a query no banco de dados
    // Retorna true se deu certo, ou false se deu erro
    return $stmt->execute();
}

    public function delete(){

    $query = 'delete from tb_tarefas where id = :id' ;
    $stmt = $this->conexao->prepare($query);
    $stmt->bindValue(':id',$this->Tarefa->__get('id'));
    $stmt->execute();
    
    }   




}    
?>