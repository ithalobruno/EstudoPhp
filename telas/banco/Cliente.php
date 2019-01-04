<?php
	include "../../torm/torm.php";
	include "../../torm/models/Cliente.php";

	if (!isset($_SESSION))
	{
		session_start();
	}

	if (isset($_POST["BtnSalvar"]))
	{
	    $sqcliente = '';
	    if (isset($_POST["sqcliente"])) {  $sqcliente= $_POST["sqcliente"]; }

	    $nome = '';
    	if (isset($_POST["nome"])) {	$nome = $_POST["nome"];	}

    	$cpf= '';
    	if (isset($_POST["cpf"]))	{	$cpf = $_POST["cpf"];	}

        $datanascimento= '';
    	if (isset($_POST["datanascimento"]))	{	$datanascimento = $_POST["datanascimento"];	}

	    $sexo= '';
		if (isset($_POST["sexo"]))	{	$sexo = $_POST["sexo"];	}

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

		$tppessoa = '';
		if (isset($_POST["tppessoa"])) 	{ $tppessoa = $_POST["tppessoa"]; 	}

		$squsuarioalteracao = '';
    	if (isset($_SESSION["squsuario"]))	{	$squsuarioalteracao = $_SESSION["squsuario"];	}

		$dataalteracao =  date('Y-m-d H:i:s');

    	$cliente = new Cliente();
    	$cliente->sqcliente = $sqcliente;
    	$cliente->nome = $nome;
    	$cliente->cpf = $cpf;
		$cliente->datanascimento =  date('Y-m-d H:i:s', strtotime($datanascimento));
    	$cliente->sexo = $sexo;
		$cliente->email = $email;
		$cliente->celular = $celular;
		$cliente->telefone = $telefone;
		$cliente->cep = $cep;
		$cliente->endereco = $endereco;
		$cliente->numero = $numero;
		$cliente->complemento = $complemento;
		$cliente->bairro = $bairro;
		$cliente->cidade = $cidade;
		$cliente->estado = $estado;
		$cliente->pais = $pais;
      	$cliente->squsuarioalteracao = $squsuarioalteracao;
		$cliente->dataalteracao = $dataalteracao;
		$cliente->tppessoa = $tppessoa;
		$cliente->save();
	}

	header("location:../../index.php?link=CadCliente");
?>
