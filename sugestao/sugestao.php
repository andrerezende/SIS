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
		var email           = document.getElementById("email");
                var topico          = document.getElementById("topico");
		var artigo          = document.getElementById("artigo");
		var sugestao        = document.getElementById("sugestao");
		var justificativa   = document.getElementById("justificativa");
		var siape           = document.getElementById("siape");
                var matricula       = document.getElementById("matricula");
  
		resultado = true;
		
		if (nome.value == "") {
			alert('Informe o nome!');
			nome.focus();
			resultado = false;
		}else if (email.value == "") {
			alert('Informe o email!');
			email.focus();
			resultado = false;
		}else if (topico.value == "") {
			alert('Informe o tópico!');
			topico.focus();
			resultado = false;
                }else if (artigo.value == "") {
			alert('Informe o artigo/inciso!');
			artigo.focus();
			resultado = false;
		}else if (sugestao.value == "") {
			alert('Informe a sugestão!');
			sugestao.focus();
			resultado = false;
		}else if (justificativa.value == "") {
			alert('Informe a justificativa!');
			justificativa.focus();
			resultado = false;
		}
		<?php
                //Parametros possíveis "D", "T" e "A"
                //"D": Docente
                //"T": Técnico
                //"A": Aluno
                if (isset($tipo) && ($tipo=="A") ){ 
		?>
			else if(matricula.value== "") {
				alert('Informe a Matrícula!');
				matricula.focus();
				resultado = false;
			}
		<?php
		} else { ?> 

			else if(siape.value== "") {
				alert('Informe o SIAPE!');
				siape.focus();
				resultado = false;
			}
		<?php 
		}?>
		return resultado;
	}

	function redireciona() {
		window.location="../index.php"; //redereciona para a página inicial.
	}

	function ValidaCPF(campo) {
		var CPF = campo.value; // Recebe o valor digitado no campo
		// Aqui começa a checagem do CPF
		var POSICAO, I, SOMA, DV, DV_INFORMADO;
		var DIGITO = new Array(10);
		DV_INFORMADO = CPF.substr(9, 2); // Retira os dois últimos dígitos do número informado

		// Desemembra o número do CPF na array DIGITO
		for (I=0; I<=8; I++) {
			DIGITO[I] = CPF.substr( I, 1);
		}

		// Calcula o valor do 10 dígito da verificação
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

		// Calcula o valor do 11 dígito da verificação
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

		// Verifica se os valores dos dígitos verificadores conferem
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
		<h2>Formul&aacute;rio de Sugest&otilde;es</h2>
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
					//Parametros poss�veis "D", "T" e "A"
					//"D": Docente
					//"T": Técnico
                                        //"A": Aluno                                
					if (isset($tipo) && ($tipo=="A") ){ ?>

					<tr>
						<td height="27" align='right'><label for=matricula>Matr&iacute;cula:</label></td>
						<td>
							<input name="matricula" type="text" id="matricula" tabindex=2 onkeypress="javascript:return Onlynumber(event);" value="" size="15" maxlength="11" alt="Matricula" />
							<span class="textoSobrescrito">*</span>
						</td>
					</tr>

				<?php	}else{ ?>

					<tr>
						<td align='right'><label for=siape >SIAPE:</label></td>
						<td>
							<input name="siape" type="text" id="siape" tabindex=4 onkeypress="javascript:return Onlynumber(event);" value="" size="15" maxlength="11" alt="SIAPE" />
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
					<td align='right'><label for=topico>T&oacute;pico:</label></td>
					<td>
						<select name="topico" id="topico" tabindex=7>

                                                    <?
                                                    include_once ("../administracao/classes/DB.php");
                                                    include_once ("../administracao/classes/Topico.php");
                                                    $banco = DB::getInstance();
                                                    $conexao = $banco->ConectarDB();

                                                    $obj_topico = new Topico(null, null);
                                                    $vetor      = $obj_topico->SelectByAll($conexao);

                                                    /* Varaveis auxiliares */
                                                    $i = 0;
                                                    $sel = "selected";
                                                    $total = count($vetor);

                                                    while ($total > $i) {
                                                            $nome   = $vetor[$i]->getNome();
                                                            $codigo = $vetor[$i]->getNome();
                                                            echo("<option value='".$codigo."'".">".strtoupper($nome)."</option>\n");
                                                            $i = $i + 1;
                                                    }
                                                    ?>
                                                </select>
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
					<td align='right'><label for=sugestao>Sugest&atilde;o:</label></td>
					<td>
						<textarea style="text-transform:uppercase" name="sugestao" id="sugestao" tabindex=7 rows ="5" cols="50" alt="Sugest�o"></textarea>
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