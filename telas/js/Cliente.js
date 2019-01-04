$(function() {
	$(document).ready(function() {
	    $('#tabela').DataTable();
	} );
	AdicionaEcentoCEP();
});

function CarregaCliente(id)
{
	if (id != "")
	{
		$.getJSON('./telas/ajax/ClienteCarregar.ajax.php?id=' + id , function(j){
			for (var i = 0; i < j.length; i++) {
				$("#sqcliente").val(j[i].sqcliente);
				$("#nome").val(j[i].nome);
				$("#cpf").val(j[i].cpf);
				$("#datanascimento").val(j[i].datanascimento);
				$("#sexo").val(j[i].sexo);
      	$("#email").val(j[i].email);
				$("#celular").val(j[i].celular);
				$("#telefone").val(j[i].telefone);
				$("#cep").val(j[i].cep);
				$("#endereco").val(j[i].endereco);
				$("#numero").val(j[i].numero);
        $("#complemento").val(j[i].complemento);
				$("#bairro").val(j[i].bairro);
				$("#cidade").val(j[i].cidade);
				$("#estado").val(j[i].estado);
				$("#pais").val(j[i].pais);
				$("#dtfim").val(j[i].dtfim);
				$("#nome").focus();
			}
		});
	}
}

function ModificaCamposCep(valor) {
	$("#endereco").val(valor);
	$("#complemento").val(valor);
	$("#bairro").val(valor);
	$("#cidade").val(valor);
	$("#estado").val(valor);
	$("#pais").val(valor);
}

function LimpaCampos()
{
	$("#sqcliente").val("");
}

function AdicionaEcentoCEP()
{
	$("#cep").blur(function () {
		var cep = $("#cep").val().replace(/\D/g, '');
		if (cep != "") {
			var validacep = /^[0-9]{8}$/;
			if(validacep.test(cep)) {
				ModificaCamposCep("...");
				$.getJSON("//viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {
					if (!("erro" in dados)) {
						$("#endereco").val(dados.logradouro);
						$("#complemento").val(dados.complemento);
						$("#bairro").val(dados.bairro);
						$("#cidade").val(dados.localidade);
						$("#estado").val(dados.uf);
						$("#pais").val('Brasil');
						$("#numero").focus();
					}
					else {
						ModificaCamposCep("");
						alert("CEP não encontrado.");
					}
				});
			}
			else {
				ModificaCamposCep("");
				alert("Formato de CEP inválido.");
			}
		}
		else {
			ModificaCamposCep("");
		}
	});
}
