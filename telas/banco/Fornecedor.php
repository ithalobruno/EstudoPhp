<?php
	include "../../torm/torm.php";
	include "../../torm/models/Fornecedor.php";

	if (!isset($_SESSION))
	{
		session_start();
	}

	if (isset($_POST["BtnSalvar"]))
	{
	    $sqfornecedor = '';
	    if (isset($_POST["sqfornecedor"])) {  $sqfornecedor= $_POST["sqfornecedor"]; }

	    $razaosocial = '';
    	if (isset($_POST["razaosocial"])) {	$nome = $_POST["nome"];	}

    	$cpfCnpj= '';
    	if (isset($_POST["cpfCnpj"]))	{	$cpf = $_POST["cpfCnpj"];	}

       	$email = '';
    	if (isset($_POST["email"]))	{	$email = $_POST["email"];	}

		$celular = '';
    	if (isset($_POST["celular"]))	{	$celular = $_POST["celular"];	}

		$telefone = '';
    	if (isset($_POST["telefone"]))	{	$telefone = $_POST["telefone"];	}

		$cep = '';
    	if (isset($_POST["cep"]))	{	$cep = $_POST["cep"];	}

		$endereco = '';
    	if (isset($_POST["endereco"]))	{	$endereco = $_POST["endereco"];	}

		$numero = '';
    	if (isset($_POST["numero"]))	{	$numero = $_POST["numero"];	}

		$complemento = '';
    	if (isset($_POST["complemento"]))	{	$complemento = $_POST["complemento"];	}

		$bairro = '';
		if (isset($_POST["bairro"]))	{	$bairro = $_POST["bairro"];	}

		$cidade = '';
    	if (isset($_POST["cidade"]))	{	$cidade = $_POST["cidade"];	}

		$estado = '';
    	if (isset($_POST["estado"]))	{	$estado = $_POST["estado"];	}

		$pais = '';
    	if (isset($_POST["pais"]))	{	$pais = $_POST["pais"];	}

		$squsuarioalteracao = '';
    	if (isset($_SESSION["squsuario"]))	{	$squsuarioalteracao = $_SESSION["squsuario"];	}

			$dataalteracao =  date('Y-m-d H:i:s');

    	$fornecedor = new fornecedor();
    	$fornecedor->sqfornecedor = $sqfornecedor;
    	$fornecedor->razaosocial = $razaosocial;
    	$fornecedor->cpfCnpj = $cpfCnpj;
		$fornecedor->email = $email;
		$fornecedor->celular = $celular;
		$fornecedor->telefone = $telefone;
		$fornecedor->cep = $cep;
		$fornecedor->endereco = $endereco;
		$fornecedor->numero = $numero;
		$fornecedor->complemento = $complemento;
		$fornecedor->bairro = $bairro;
		$fornecedor->cidade = $cidade;
		$fornecedor->estado = $estado;
		$fornecedor->pais = $pais;
      	$fornecedor->squsuarioalteracao = $squsuarioalteracao;
		$fornecedor->dataalteracao = $dataalteracao;

    	$fornecedor->save();
	}

	header("location:../../index.php?link=Cadfornecedor");
?>
