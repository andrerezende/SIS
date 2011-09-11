<?php session_start("SUGESTAO"); 

$tipo 		= addslashes($_POST['tipo']);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title> <?php echo ($_SESSION["Gnomeprocesso"]);?> </title>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	<link href="../estilo_selecao.css" rel="stylesheet" type="text/css" />
	<script language="JavaScript" type="text/JavaScript">

	function Onlynumber(e){
		var tecla=new Number();

		if (window.event) {
			tecla = e.keyCode;
		} else if (e.which) {
			tecla = e.which;
		} else {
			return true;
		}
		if (((tecla < 48) || (tecla > 57)) && (tecla!=8)) {
			return false;
		}
	}

	function validar() {
		var nome            = document.getElementById("nome");
		var matricula       = document.getElementById("matricula");
		var email           = document.getElementById("email");
		var artigo          = document.getElementById("artigo");
		var sugestao        = document.getElementById("sugestao");
		var justificativa   = document.getElementById("justificativa");
		var rg              = document.getElementById("rg");
		var cpf             = document.getElementById("cpf");
  
		resultado = true;
		
		if (nome.value == "") {
			alert('Informe o nome!');
			nome.focus();
			resultado = false;
		}else if (email.value == "") {
			alert('Informe o email!');
			email.focus();
			resultado = false;
		}else if (artigo.value == "") {
			alert('Informe o Artigo/Inciso!');
			artigo.focus();
			resultado = false;
		}else if (sugestao.value == "") {
			alert('Informe a sugestão!');
			sugestao.focus();
			resultado = false;
		}else if (justificativa.value == "") {
			alert('Informe a Justificativa!');
			justificativa.focus();
			resultado = false;
		}
		<?php
		//Parametros possíveis "E" e "S"
		//"S"> Servidor do IFBaiano
		//"E"> Comunidade\Público Externo
		if (isset($tipo) && ($tipo=="E") ){ 
		?>
			else if(cpf.value== "") {
				alert('Informe o CPF!');
				cpf.focus();
				resultado = false;
			}else if (!ValidaCPF(cpf)) {
				resultado = false;
			}else if (rg.value == "") {
				alert('Informe o RG!');
				rg.focus();
				resultado = false;
			}
		<?php
		} else { ?> 

			else if(matricula.value== "") {
				alert('Informe a Matrícula!');
				matricula.focus();
				resultado = false;
			}
		<?php 
		}?>
		return resultado;
	}

	function redireciona() {
		window.location="../index.php"; //redereciona para a pÃ¡gina inicial.
	}

	function ValidaCPF(campo) {
		var CPF = campo.value; // Recebe o valor digitado no campo
		// Aqui comeÃ§a a checagem do CPF
		var POSICAO, I, SOMA, DV, DV_INFORMADO;
		var DIGITO = new Array(10);
		DV_INFORMADO = CPF.substr(9, 2); // Retira os dois Ãºltimos dÃ­gitos do nÃºmero informado

		// Desemembra o nÃºmero do CPF na array DIGITO
		for (I=0; I<=8; I++) {
			DIGITO[I] = CPF.substr( I, 1);
		}

		// Calcula o valor do 10 dÃ­gito da verificaÃ§Ã£o
		POSICAO = 10;
		SOMA = 0;
		for (I=0; I<=8; I++) {
			SOMA = SOMA + DIGITO[I] * POSICAO;
			POSICAO = POSICAO - 1;
		}
		DIGITO[9] = SOMA % 11;
		if (DIGITO[9] < 2) {
			DIGITO[9] = 0;
		} else {
			DIGITO[9] = 11 - DIGITO[9];
		}

		// Calcula o valor do 11 dÃ­gito da verificaÃ§Ã£o
		POSICAO = 11;
		SOMA = 0;
		for (I=0; I<=9; I++) {
			SOMA = SOMA + DIGITO[I] * POSICAO;
			POSICAO = POSICAO - 1;
		}
		DIGITO[10] = SOMA % 11;
		if (DIGITO[10] < 2) {
			DIGITO[10] = 0;
		} else {
			DIGITO[10] = 11 - DIGITO[10];
		}

		// Verifica se os valores dos dÃ­gitos verificadores conferem
		DV = DIGITO[9] * 10 + DIGITO[10];
		if (DV != DV_INFORMADO) {
			alert('CPF invalido');
			campo.value = '';
			campo.focus();
			return false;
		}
		return true;
	}


	</script>
</head>
<body>

	<div align='center'>
		<img src="../imgs/topo2/topo_formulario.png" alt="Instituto Federal Baiano" />
		<h2><?php echo ($_SESSION["Gnomeprocesso"]);?></h2>
		<h2>Formulário de Sugestões</h2>
		<p><span class="textoDestaque">OBSERVA&Ccedil;&Atilde;O: Os campos marcados com asterisco (*) s&atilde;o de preenchimento obrigat&oacute;rio.</span></p>
	</div>


	
	<div id="formularioInscricao">
		<form id='forminscricao' name='frmincricao' action='recuperar.php' method='post' onsubmit='return validar()' >
			<table width="760" border="0" align='center'>
				<tr>
					<td align="right"><label for=nome>Nome:</label></td>
					<td colspan='2'>
						<input style="text-transform:uppercase" name="nome" id="nome" type="text" tabindex=1 size='65' maxlength="65" alt="Nome Completo" />
						<span class="textoSobrescrito">*</span>
					</td>
				</tr>

				<?php	
					//Parametros possíveis "E" e "S"
					//"E"> Comunidade\Público Externo
					//"S"> Servidor do IFBaiano

					if (isset($tipo) && ($tipo=="S") ){ ?>

					<tr>
						<td height="27" align='right'><label for=matricula>Matrícula:</label></td>
						<td>
							<input name="matricula" type="text" id="matricula" tabindex=2 onkeypress="javascript:return Onlynumber(event);" value="" size="15" maxlength="11" alt="Matricula" />
							<span class="textoSobrescrito">*</span>
						</td>
					</tr>

				<?php	}elseif (isset($tipo) && ($tipo=="E") ){ ?>

					<tr>
						<td align='right'><label for=cpf >CPF:</label></td>
						<td>
							<input name="cpf" type="text" id="cpf" tabindex=3 onkeypress="javascript:return Onlynumber(event);" value="" size="15" maxlength="11" alt="CPF" />
							<span class="textoSobrescrito">* ATEN&Ccedil;&Atilde;O: N&atilde;o ser&aacute; poss&iacute;vel alterar o CPF posteriormente.</span>
						</td>
					</tr>

					<tr>
						<td height="27" align='right'><label for=rg>RG:</label></td>
						<td>
							<input name="rg" type="text" id="rg" tabindex=4 onkeypress="javascript:return Onlynumber(event);" value="" size="15" maxlength="11" alt="RG" />
							<span class="textoSobrescrito">*</span>
						</td>
					</tr>

				<?php	} ?>

				<tr>
					<td align='right'><label for=email>E-mail:</label></td>
					<td>
						<input style="text-transform:uppercase" name="email" id="email" type="text" tabindex=5 size='40' maxlength="40" alt="E-mail" />
						<span class="textoSobrescrito">*</span>
					</td>
				</tr>
				<tr>

					<td align='right'><label for=artigo>Artigo/Inciso:</label></td>
					<td>
						<input style="text-transform:uppercase" name="artigo" id="artigo" type="text" tabindex=6 size='40' maxlength="40" alt="artigo" />
						<span class="textoSobrescrito">*</span>
					</td>
				</tr>
				<tr>
					<td align='right'><label for=sugestao>Sugestão:</label></td>
					<td>
						<textarea style="text-transform:uppercase" name="sugestao" id="sugestao" tabindex=7 rows ="5" cols="50" alt="Sugestão"></textarea>
						<span class="textoSobrescrito">*</span>
					</td>
				</tr>
				<tr>
					<td align='right'><label for=justificativa>Justificativa:</label></td>
					<td>
						<textarea style="text-transform:uppercase" name="justificativa" id="justificativa" tabindex=8 rows ="5" cols="50" alt="Justificativa"></textarea>
						<span class="textoSobrescrito">*</span>
					</td>
				</tr>
				<tr>
					<td colspan='3' align='left'>
						<input name="Gravar" type="submit" id="Gravar" tabindex=9 value="Gravar Dados" />
						<input type="button" value="Cancelar" onclick="javascript:redireciona();" />
					</td>
				</tr>
			</table>
		</form>
	</div>
</body>
</html>