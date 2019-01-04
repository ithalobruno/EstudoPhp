$(function() {
	$(document).ready(function() {
		$('#tabela').DataTable();
	} );
});

function CarregaMenu(id)
{
	if (id != "")
	{
		$.getJSON('./ajax_forms/MenuCarregar.ajax.php?id=' + id , function(j){
			for (var i = 0; i < j.length; i++) {
				$("#sqmenu").val(j[i].sqmenu);
				$("#nome").val(j[i].nome);
				$("#ordem").val(j[i].ordem);
				$("#nivelmenu").val(j[i].nivelmenu);
				$("#temsubmenu").prop("checked", (j[i].temsubmenu == 1));
				$("#submenu").val(j[i].submenu);
				$("#classe").val(j[i].classe);
				$("#link").val(j[i].link);
				$("#nome").focus();
			}
		});
	}
}

function LimpaCampos()
{
	$("#sqmenu").val("");
}
