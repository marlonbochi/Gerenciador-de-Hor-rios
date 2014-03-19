$(document).ready(function($) {
 	$("input,select,textarea").not("[type=submit]").jqBootstrapValidation();
 	$('input[placeholder], textarea[placeholder]').placeholder();
	$(".data").mask("99/99/9999");
	$(".hora").mask("99:99");
	

	//Validação do Fomulário referente a agenda.
	$(".esconder_alert").css('display','none');
	$('.form_agenda').submit(function() {
		var data_inicial = $('.data_inicial').val();
		var hora_inicial = $('.hora_inicial').val();

		var data_final = $('.data_final').val();
		var hora_final = $('.hora_final').val();

		var flag = true;
		var msg = '';

		if(validaData(data_inicial) == false) {
		    msg += 'Preencha corretamente a data inicial.</br>';
		    flag = false;
		}

		if(verifica_hora(hora_inicial) == false) {
		    msg += 'Preencha corretamente a hora inicial.</br>';
		    flag = false;
		}

		if(validaData(data_final) == false) {
		    msg += 'Preencha corretamente a data final.</br>';
		    flag = false;
		}

		if(verifica_hora(hora_final) == false) {
		    msg += 'Preencha corretamente a hora final.</br>';
		    flag = false;
		} 
		
		if(flag == false){
			$(".alert-error").html('');
			$(".alert-error").append(msg);
			$(".alert-error").fadeIn('fast');
			return false;
		}
	});
	//Validação do Fomulário referente a agenda.

 });

function validaData(valor) {
	var date = valor;
	var ardt = new Array;
	var ExpReg = new RegExp("(0[1-9]|[12][0-9]|3[01])/(0[1-9]|1[012])/[12][0-9]{3}");
	ardt = date.split("/");
	erro = false;

	if ( date.search(ExpReg)==-1){
		erro = true;
	}
	else if (((ardt[1]==4)||(ardt[1]==6)||(ardt[1]==9)||(ardt[1]==11))&&(ardt[0]>30)){
		erro = true;
	}
	else if ( ardt[1]==2) {
		if ((ardt[0]>28)&&((ardt[2]%4)!=0))
			erro = true;
		if ((ardt[0]>29)&&((ardt[2]%4)==0))
			erro = true;
	}
	if (erro) {
		return false;
	}
	return true;
}

function verifica_hora(hora){ 
	hrs = (hora.substring(0,2)); 
	min = (hora.substring(3,5)); 
	               
	estado = ""; 
	if ((hrs < 00 ) || (hrs > 23) || ( min < 00) ||( min > 59)){ 
		estado = "errada"; 
	} 
	               
	if (hora == "") { 
		estado = "errada"; 
	} 
	 
	if (estado == "errada") { 
		return false;
	}else{
		return true;
	}
}