<?php
include "../../torm/torm.php";
include "../../torm/models/Fornecedor.php";
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

if (isset($_GET["id"])) { $fornecedor = Fornecedor::find($_GET["id"]); } else { $fornecedor= null; }

$ListaFornecedor = array();
if(isset($fornecedor))
{
    $ListaFornecedor[] = array('sqfornecedor'    	 => $fornecedor->sqfornecedor,
                             'nome'          => $fornecedor->razaosocial,
                             'cpf' => $fornecedor->cpfcnpj,
                             'email' => $fornecedor->email,
							 'celular' => $fornecedor->celular,
							 'telefone' => $fornecedor->telefone,
							 'cep' => $fornecedor->cep,
							 'endereco' => $fornecedor->endereco,
							 'numero' => $fornecedor->numero,
                             'complemento' => $fornecedor->complemento,
							 'bairro' => $fornecedor->bairro,
							 'cidade' => $fornecedor->cidade,
							 'estado' => $fornecedor->estado,
							 'pais' => $fornecedor->pais
                            
	    );
}

echo (json_encode($ListaFornecedor,true));
?>
