$(function() {
	$(document).ready(function() {
	    $('#tabela').DataTable();
	} );
});

function InativaUsuario(id)
{
	Lobibox.confirm({
		msg: "Tem certeza que deseja excluir este usuário?",
 		callback: function(lobibox, type){
     var btnType;
     if (type === 'no')
		 {
         btnType = 'warning';
     }
		 else if (type === 'yes')
		 {
			 	if (id != "")
				{
					$.getJSON('./banco/usuarios.php?id=' + id , function(j){
						for (var i = 0; i < j.length; i++) {
							$("#ativo").prop("checked", (j[i].ativo == 0));
						}
						});
		 		}
				 Lobibox.alert("success", //AVAILABLE TYPES: "error", "info", "success", "warning"
					{
					msg: "Usuário exluído com sucesso!"
					});
     }
 		}
 	});
}

function CarregaUsuario(id)
{
	if (id != "")
	{
		$.getJSON('./ajax_forms/UsuariosCarregar.ajax.php?id=' + id , function(j){
			for (var i = 0; i < j.length; i++) {
				$("#squsuario").val(j[i].squsuario);
				$("#usuario").val(j[i].usuario);
				$("#senha").val(j[i].senha);
				$("#ativo").prop("checked", (j[i].ativo == 1));
				$("#selgrupo").val(j[i].sqgrupo);
				$("#email").val(j[i].email);
				$("#nmusuario").val(j[i].nmusuario);
				$("#usuario").focus();
			}
		});
	}
}

function CarregaSqUsuario(id)
{
	if (id != "")
	{
		$.getJSON('../ajax_forms/UsuariosCarregar.ajax.php?id=' + id , function(j)
		{
			for (var i = 0; i < j.length; i++)
				{
				$("#squsuario").val(j[i].squsuario);
				$("#usuario").val(j[i].usuario);
		  	}
		});
   }
}

function LimpaCampos()
{
	$("#squsuario").val("");
}
