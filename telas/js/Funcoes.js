function ValidaCPF(strCPF) {
	document.getElementById("cpf").style.border="solid 0px #000";
	var Soma;
	var Resto;
	Soma = 0;
	
	if (strCPF.length != 11 || cpf == "00000000000" || cpf == "11111111111" ||  cpf == "22222222222" ||
	cpf == "33333333333" || cpf == "44444444444" || cpf == "55555555555" || cpf == "66666666666" ||
	cpf == "77777777777" || cpf == "88888888888" ||   cpf == "99999999999")
	{
		document.getElementById("cpf").style.border="solid 2px #FA8072";
		document.getElementById("cpf").select() ;
		document.getElementById("cpf").focus();
		document.getElementById("cpf").value='';
		document.getElementById("cpf").placeholder ='Cpf Inválido';
		return false;
	}
	for (i=1; i<=9; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (11 - i);
	Resto = (Soma * 10) % 11;
	
	if ((Resto == 10) || (Resto == 11))
	Resto = 0;
	
	if (Resto != parseInt(strCPF.substring(9, 10)) )
	{
		document.getElementById("cpf").style.border="solid 2px #FA8072";
		document.getElementById("cpf").select() ;
		document.getElementById("cpf").focus();
		document.getElementById("cpf").value='';
		document.getElementById("cpf").placeholder ='Cpf Inválido';
		return false;
	}
	Soma = 0;
	for (i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (12 - i);
	Resto = (Soma * 10) % 11;
	
	if ((Resto == 10) || (Resto == 11))  Resto = 0;
	if (Resto != parseInt(strCPF.substring(10, 11) ) )
	{
		document.getElementById("cpf").select() ;
		document.getElementById("cpf").focus();
		document.getElementById("cpf").value='';
		document.getElementById("cpf").placeholder ='Cpf Inválido';
		return false;
	}
	return true;
}


function validarCNPJ(cnpj) {
	document.getElementById("cpf").style.border="solid 0px #000";
 
    cnpj = cnpj.replace(/[^\d]+/g,'');
 
	if(cnpj == '') 
	{
		document.getElementById("cpf").style.border="solid 2px #FA8072";
		document.getElementById("cpf").select() ;
		document.getElementById("cpf").focus();
		document.getElementById("cpf").value='';
		document.getElementById("cpf").placeholder ='Cnpj Inválido';
		return false;
	}
    if (cnpj.length != 14)
    {
		document.getElementById("cpf").style.border="solid 2px #FA8072";
		document.getElementById("cpf").select() ;
		document.getElementById("cpf").focus();
		document.getElementById("cpf").value='';
		document.getElementById("cpf").placeholder ='Cnpj Inválido';
		return false;
	}
    
 
    // Elimina CNPJs invalidos conhecidos
    if (cnpj == "00000000000000" || 
        cnpj == "11111111111111" || 
        cnpj == "22222222222222" || 
        cnpj == "33333333333333" || 
        cnpj == "44444444444444" || 
        cnpj == "55555555555555" || 
        cnpj == "66666666666666" || 
        cnpj == "77777777777777" || 
        cnpj == "88888888888888" || 
        cnpj == "99999999999999")
		{
			document.getElementById("cpf").style.border="solid 2px #FA8072";
			document.getElementById("cpf").select() ;
			document.getElementById("cpf").focus();
			document.getElementById("cpf").value='';
			document.getElementById("cpf").placeholder ='Cnpj Inválido';
			return false;
		}
		
         
    // Valida DVs
    tamanho = cnpj.length - 2
    numeros = cnpj.substring(0,tamanho);
    digitos = cnpj.substring(tamanho);
    soma = 0;
    pos = tamanho - 7;
    for (i = tamanho; i >= 1; i--) {
      soma += numeros.charAt(tamanho - i) * pos--;
      if (pos < 2)
            pos = 9;
    }
    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    if (resultado != digitos.charAt(0))
	{
		document.getElementById("cpf").style.border="solid 2px #FA8072";
		document.getElementById("cpf").select() ;
		document.getElementById("cpf").focus();
		document.getElementById("cpf").value='';
		document.getElementById("cpf").placeholder ='Cnpj Inválido';
		return false;
	}
    
         
    tamanho = tamanho + 1;
    numeros = cnpj.substring(0,tamanho);
    soma = 0;
    pos = tamanho - 7;
    for (i = tamanho; i >= 1; i--) {
      soma += numeros.charAt(tamanho - i) * pos--;
      if (pos < 2)
            pos = 9;
    }
    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    if (resultado != digitos.charAt(1))
	{
		document.getElementById("cpf").style.border="solid 2px #FA8072";
		document.getElementById("cpf").select() ;
		document.getElementById("cpf").focus();
		document.getElementById("cpf").value='';
		document.getElementById("cpf").placeholder ='Cnpj Inválido';
		return false;
	}
    
           
    return true;
    
}


function VerificaPessoa()
{
 	var radios = document.getElementsByName('tppessoa');
 	var tppessoa;
 	for (var i = 0, length = radios.length; i < length; i++)
	{
 	  if (radios[i].checked)
 		{
  		  tppessoa = (radios[i].value);
		  break;
        }
	}

	if (tppessoa == "J")
	{
		
		document.getElementById('datanascimento').setAttribute('disabled',true);
		document.getElementById('sexo').setAttribute('disabled',true);
	}
	else
	{
		document.getElementById('datanascimento').removeAttribute('disabled');
		document.getElementById('sexo').removeAttribute('disabled');
	}
return tppessoa;
}


function MontaMascara(strCPF)
{
	var tipo = VerificaPessoa();
	if(tipo == "F")
	{	
		ValidaCPF(strCPF);
		
	}
	else
	{	
		validarCNPJ(strCPF);
		
	}

}
