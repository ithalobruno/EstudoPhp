<?php
include "../../torm/torm.php";
include "../../torm/models/Cliente.php";
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

if (isset($_GET["id"])) { $cliente = Cliente::find($_GET["id"]); } else { $cliente= null; }

$ListaCliente = array();
if(isset($cliente))
{
    $ListaCliente[] = array('sqcliente'    	 => $cliente->sqcliente,
                             'nome'          => $cliente->nome,
                             'cpf' => $cliente->cpf,
                             'datanascimento'   => date('Y-m-d', strtotime($cliente->datanascimento)),
							 'sexo' => $cliente->sexo,
							 'email' => $cliente->email,
							 'celular' => $cliente->celular,
							 'telefone' => $cliente->telefone,
							 'cep' => $cliente->cep,
							 'endereco' => $cliente->endereco,
							 'numero' => $cliente->numero,
                             'complemento' => $cliente->complemento,
							 'bairro' => $cliente->bairro,
							 'cidade' => $cliente->cidade,
							 'estado' => $cliente->estado,
							 'pais' => $cliente->pais
                            
	    );
}

echo (json_encode($ListaCliente,true));
?>
