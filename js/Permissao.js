$(function() {
});

function CarregaPermissoes()
{
		var id = $("#selgrupo").val();

		$.getJSON('./ajax_forms/PermissaoCarregar.ajax.php?id=' + id , function(j){
				var checkbox = '';
				for (var i = 0; i < j.length; i++) {
					checkbox += '<div class="form-group">'+
												'<div class="col-lg-8">' +
													'<label class="col-lg-6 control-label" for="' + j[i].sqmenu + '">' + j[i].menu + '</label>';

					if (j[i].ativo == 1)
					{
						checkbox +=	'<input class="col-lg-2 control-label" type="checkbox" id="sqmenu' + j[i].sqmenu + '" name="sqmenu' + j[i].sqmenu + '" checked>';
					}
					else
					{

						checkbox +=	'<input class="col-lg-2 control-label" type="checkbox" id="sqmenu' + j[i].sqmenu + '" name="sqmenu' + j[i].sqmenu + '">';
					}

					checkbox +=   '</div>'+
											 '</div>';
				}
				$('#checkboxs').html(checkbox).show();
		});

}
