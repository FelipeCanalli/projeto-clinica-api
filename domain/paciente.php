<?php

class Paciente {

    public $idpaciente;
    public $nome;
    public $nascimento;
    public $sexo;
    public $email;
    public $telefone;
    public $usuario;
    public $senha;

    public function __construct($db){
        $this->conexao = $db;
    }

    public function listar(){
        $query = "select idpaciente, nome,date_format(nascimento,'%d/%m/%Y') as nascimento,sexo,email,telefone,usuario from tbpaciente order by idpaciente desc";

        $stmt=$this->conexao->prepare($query);

        $stmt->execute();

        return $stmt;
    }

            //  --------------------------------- //

    public function cadastro(){
        $query = "insert into tbpaciente set nome=:n, nascimento=:nc, sexo=:s, email=:e, telefone=:t, usuario=:u, senha=:sh";
    
        $stmt=$this->conexao->prepare($query);

        $this->senha = md5($this->senha);

        $stmt->bindParam(":n",$this->nome);
        $stmt->bindParam(":nc",$this->nascimento);
        $stmt->bindParam(":s",$this->sexo);
        $stmt->bindParam(":e",$this->email);
        $stmt->bindParam(":t",$this->telefone);
        $stmt->bindParam(":u",$this->usuario);
        $stmt->bindParam(":sh",$this->senha);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

            //  --------------------------------- //
    
    
    public function atualizar(){
        $query = "update tbpaciente set nome=:n, nascimento=:nc, sexo=:s, email=:e, telefone=:t, usuario=:u, senha=:sh where idpaciente=:id";
        
        $stmt=$this->conexao->prepare($query);

        $this->senha = md5 ($this->senha);

        $stmt->bindParam(":n",$this->nome);
        $stmt->bindParam(":nc",$this->nascimento);
        $stmt->bindParam(":s",$this->sexo);
        $stmt->bindParam(":e",$this->email);
        $stmt->bindParam(":t",$this->telefone);
        $stmt->bindParam(":u",$this->usuario);
        $stmt->bindParam(":sh",$this->senha);
        $stmt->bindParam(":id",$this->idpaciente);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

            //  --------------------------------- //

    public function deletar(){
        $query = "delete from tbpaciente where idpaciente=:id";
    
        $stmt=$this->conexao->prepare($query);

        $stmt->bindParam(":id",$this->idpaciente);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

                //  --------------------------------- //

    public function logar(){
        $query = "select idpaciente, nome,date_format(nascimento,'%d/%m/%Y') as nascimento,sexo,email,telefone,usuario from tbpaciente where usuario=:u and senha=:s";

        $stmt=$this->conexao->prepare($query);

        $this->senha = md5 ($this->senha);

        $stmt->bindParam(":u",$this->usuario);
        $stmt->bindParam(":s",$this->senha);

        $stmt->execute();

        return $stmt;
    }

            //  --------------------------------- //

}

?>
