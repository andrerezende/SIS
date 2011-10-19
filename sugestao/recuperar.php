<?php session_start("SUGESTAO"); ?>

<?php

/*Informações a serem enviadas*/
$nome   		= addslashes($_POST['nome']);	
$email  		= addslashes($_POST['email']);		
$topico         	= addslashes($_POST['topico']);
$artigo         	= addslashes($_POST['artigo']);
$justificativa  	= addslashes($_POST['justificativa']);
$sugestao         	= addslashes($_POST['sugestao']);

$matricula      	= addslashes($_POST['matricula']);
$siape          	= addslashes($_POST['siape']);	

require_once 'email/swift-mailer/lib/swift_required.php';

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
									<li><a href="../index.php?sc=Inicial">P&aacute;gina Inicial</a></li>
									<li><a href="../index.php?sc=contribuir">Sugest&otilde;es</a></li>
									<li><a href="<?php echo ($_SESSION["Gpaginaarquivo"]);?>" target="blank">Documento para consulta</a></li>
								</ul>
							</div>
						</div>
					</div>
			</div>
			<div id="colunaMeio">
				<div id="tituloPrincipal">Registro de Sugest&otilde;es</div>
				<div class="conteudoColunaMeio">
<?php	
        //PARAMETRIZAR
	//*Informação do e-mail da comissao*/
        $emailcomissao 		= $_SESSION["Gusrmail"];

	/*Informa��es de conex�o do servidor de e-mail*/
        $servidorSMTP 		= 'smtp.ifbaiano.edu.br';
	$usuarioSMTP 		= $_SESSION["Gusrmail"];
	$senhaSMTP 		= $_SESSION["Gpwdmail"];
	$configSmtp 		= Swift_SmtpTransport::newInstance($servidorSMTP, 25)
						->setUsername($usuarioSMTP)
						->setPassword($senhaSMTP)
	;
	
	$mailer = Swift_Mailer::newInstance($configSmtp);

	$mensagem = Swift_Message::newInstance()
		->setSubject($_SESSION["Gnomeprocesso"])
		->setFrom(array($usuarioSMTP => 'Sistema Informatizado de Sugestões'))
		->setTo(array($emailcomissao => 'Sistema Informatizado de Sugestões'))
		->setBody(
			'<p>Nome: <b>' .$nome. '</b></p>' .
			''.
			'<p>SIAPE: <b>' .$siape. '</b></p>'.			
			''.
			'<p>Matrícula: <b>' .$matricula. '</b></p>'.
			''.
			'<p>Tópico: <b>' .$topico. '</b></p>'.
                        ''.
			'<p>Artigo/Inciso: <b>' .$artigo. '</b></p>'.
			''.
			'<p>E-mail: <b>' .$email. '</b></p>'.                 
			''.
			'<p>Justificativa: <b>' .$justificativa. '</b></p>'.
			''.
			'<p>Sugest&atilde;o: <b>' .$sugestao. '</b></p>',
		'text/html')
		->setSender($usuarioSMTP)
		->setPriority(2)
	;
	$result = $mailer->send($mensagem);
	if ($result) {
            
            echo("<p class='textoDestaque2'>A sugest&atilde;o foi enviada ao email da comiss&atilde;o.</p>");
            
            //Gravar no banco de dados os e-mails enviados
            include_once ("../administracao/classes/DB.php");
            include_once ("../administracao/classes/Mensagem.php");

            $banco = DB::getInstance();
            $conexao = $banco->ConectarDB();

            $obj_mensagem = new Mensagem($pid, $nome, $email, $topico,$artigo,$justificativa,$sugestao,$matricula, $siape);
            $valor        = $obj_mensagem ->Inserir($conexao);    
                
	} else {
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
