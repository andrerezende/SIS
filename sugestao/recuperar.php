<?php session_start("SUGESTAO"); 

/*Informações a serem enviadas*/
$nome   		= addslashes($_POST['nome']);	
$email  		= addslashes($_POST['email']);		
$idcampus         	= addslashes($_POST['campus']);
$topico         	= addslashes($_POST['topico']);
$artigo         	= addslashes($_POST['artigo']);
$justificativa  	= addslashes($_POST['justificativa']);
$sugestao         	= addslashes($_POST['sugestao']);

$matricula      	= addslashes($_POST['matricula']);
$siape          	= addslashes($_POST['siape']);	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title> <?php echo ($_SESSION["Gnomeprocesso"]);?> </title>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	<link href="../estilo_selecao.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="../../js/jquery-1.3.2.min.js"></script>
</head>
<body>
	<div id="tudo">
		<div id="conteudoGeral">
			<div id="topo1">
				<div class="topo1_imagem1"><img src="../imgs/topo1/ministerio_educacao.jpg" alt="Minist&eacute;rio de Educa&ccedil;&a&atilde;o" /></div>
				<div id="topo1_destaqueGoveno">
					<form action="">
						<select name="destaque_governo" id="destaque_governo" onchange="if( this.value != '0' )window.open(this.value);">
							<option value="0">Destaques do Governo</option>
							<option value="http://www.brasil.gov.br">Portal de Servi&ccedil;os do Governo</option>
							<option value="http://www.radiobras.gov.br/">Portal da Ag&ecirc;ncia de Not&iacute;cias</option>
							<option value="http://www.brasil.gov.br/noticias/em_questao">Em Quest&atilde;o</option>
							<option value="http://www.fomezero.gov.br/">Programa Fome Zero</option>
						</select>
					</form>
				</div>
			</div>
			<div id="topo2">
				<img src="../imgs/topo2/topo2.png" alt="Instituto Federal Baiano" />
				
				<div id="topo2Texto">
					<?php echo ($_SESSION["Gnomeprocesso"]);?>
				</div>
				
			</div>				<div id="meioGeral">
			
			<div id="colunaEsquerda">
					<div class="conteudoColunaEsquerda">
						<div id="menuEsquerdo">
							<div id="menu2">
								<ul class="menu">
									<li><a href="index.php?sc=Inicial">P&aacute;gina Inicial</a></li>
									<li><a href="index.php?sc=contribuir">Sugest&otilde;es</a></li>
<!--									<li><a href="<?php echo ($_SESSION["Gpaginaarquivo"]);?>" target="blank">Documento para consulta on-line</a></li>
									<li><a href="colocar link" target="blank">Documento para consulta no formato PDF</a></li>                                                                        -->
								</ul>
							</div>
						</div>
					</div>
			</div>
			<div id="colunaMeio">
				<div id="tituloPrincipal">Registro de Sugest&otilde;es</div>
				<div class="conteudoColunaMeio">
<?php	
        //Gravar no banco de dados os e-mails enviados
        include_once ("../administracao/classes/DB.php");
        include_once ("../administracao/classes/Campus.php");
        include_once ("../administracao/classes/Mensagem.php");

        $banco = DB::getInstance();
        $conexao = $banco->ConectarDB();
        
        $campus = new Campus(null, null);
        $vetorCampusIncrito = $campus->SelectNomeCampus($conexao, $idcampus);
        $nomecampus = $vetorCampusIncrito->getNome();

	$servidorSMTP 	= 'smtp.ifbaiano.edu.br';
	$usuarioSMTP 	= $_SESSION["Gusrmail"];
	$senhaSMTP 	= $_SESSION["Gpwdmail"];

	$retorno = false;
	$destinatario = $usuarioSMTP ;
	$assunto = "Planejamento Institucional 2012";
	$corpo = "Comissão,\n\nSegue a contribuição no Sistema de Sugestões Eletrônica.\nOs dados são:\n\nNome: ".$nome."\nSIAPE: ".$siape."\nMatrícula: ".$matricula."\nCampus: ".$nomecampus."\nE-mail: ".$email."\nJustificativa: ".$justificativa."\nSugestão: ".$sugestao."";
	$headers = "MIME-Version: 1.1\r\n";
	$headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
	$headers .= "From:".$usuarioSMTP."\r\n";
	$headers .= "Return-Path:".$usuarioSMTP."\r\n";
	$enviar = mail($destinatario,$assunto,$corpo,$headers);       
        
        if ($enviar) {
            
            echo("<p class='textoDestaque2'>A sugest&atilde;o foi enviada ao email da comiss&atilde;o.</p>");
            
            $obj_mensagem = new Mensagem($pid, $nome, $email, $idcampus, $topico,$artigo,$justificativa,$sugestao,$matricula, $siape);
            $valor        = $obj_mensagem ->Inserir($conexao);    
                
	}else {
	    echo("<p class='textoDestaque2'>Problemas ao enviar o email.</p>");
	}
?>
				</div>
				</div>
				<div id="rodape">
					<div id="conteudoRodape">
						<p><b>Instituto Federal de Educa&ccedil;&atilde;o, Ci&ecirc;ncia e Tecnologia Baiano</b><br />
							Reitoria &ndash; Rua do Rouxinol, 115 - Imbu&iacute;<br />
							Salvador &ndash; Bahia &ndash; CEP: 41.720&ndash;052<br />
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
