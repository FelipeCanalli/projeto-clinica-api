<?php

header("Access-Control-Allow-Origin:*");
header("Content-Type:application/json;charset=utf-8");
header("Access-Control-Allow-Methods:POST");

include_once "../../config/database.php";
include_once "../../domain/paciente.php";

$database = new Database();

$db=$database->getConnection();

$paciente = new Paciente($db);

$data = json_decode(file_get_contents("php://input"));

$paciente->usuario = $data->usuario;
$paciente->senha = $data->senha;

$rs = $paciente->logar();

if($rs->rowCount()>0){
    $paciente_arr["dados"] = array();
    
    while($linha = $rs->fetch(PDO::FETCH_ASSOC)){
        
        extract($linha);

        $array_item=array(
            "idpaciente"=>$idpaciente,
            "nome"=>$nome,
            "nascimento"=>$nascimento,
            "sexo"=>$sexo,
            "email"=>$email,
            "telefone"=>$telefone,
            "usuario"=>$usuario
        );

        array_push($paciente_arr["dados"],$array_item);
    }

    header("HTTp/1.0 200");
    echo json_encode($paciente_arr);
}else{
    header("HTTp/1.0 400");
    echo json_encode(array("mensagem"=>"Nome de usuário ou senha incorretos"));
}

?>