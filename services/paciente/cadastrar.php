<?php

header("Access-Control-Allow-Origin:*");
header("Content-Type:application/json;charset=utf-8");
header("Access-Control-Allow-Methods:POST");

include_once "../../config/database.php";
include_once "../../domain/paciente.php";

$database = new Database();
$db=$database->getConnection();

$paciente = new Paciente ($db);

$data = json_decode(file_get_contents('php://input'));

if(!empty($data->nome) && !empty($data->nascimento) && !empty($data->sexo) && !empty($data->email) && !empty($data->telefone) && !empty($data->usuario) && !empty($data->senha)){

$paciente->nome=$data->nome;
$paciente->nascimento=$data->nascimento;
$paciente->sexo=$data->sexo;
$paciente->email=$data->email;
$paciente->telefone=$data->telefone;
$paciente->usuario=$data->usuario;
$paciente->senha=$data->senha;

if($paciente->cadastro()){
    header("HTTP/1.0 201");
    echo json_encode(array("mensagem"=>"Paciente cadastrado com sucesso"));
}else{
    header("HTTP/1.0 400");
    echo json_encode(array("mensagem"=>"Não foi possível cadastrar o paciente"));
    }
    
} else{
    header("HTTP/1.0 400");
    echo json_encode(array("mensagem"=>"Você precisa preencher todos os campos"));
}

?>