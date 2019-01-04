$(function() {
	$(document).ready(function() {
		$('#tabela').DataTable();
	} );
});

function CarregaGrupo(id)
{
	if (id != "")
	{
		$.getJSON('./ajax_forms/GruposCarregar.ajax.php?id=' + id , function(j){
			for (var i = 0; i < j.length; i++) {
				$("#sqgrupo").val(j[i].sqgrupo);
				$("#grupo").val(j[i].grupo);
				$("#ativo").prop("checked", (j[i].ativo == 1));
				$("#administrador").prop("checked", (j[i].administrador == 1));
				$("#grupo").focus();
			}
		});
	}
}

function CarregaSqGrupo(id)
{
	if (id != "")
	{
		$.getJSON('../ajax_forms/GruposCarregar.ajax.php?id=' + id , function(j)
		{
			for (var i = 0; i < j.length; i++)
			{
				$("#sqgrupo").val(j[i].sqgrupo);
				$("#grupo").val(j[i].grupo);
			}
		});
	}
}

function LimpaCampos()
{
	$("#sqgrupo").val("");
}
