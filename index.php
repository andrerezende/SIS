<?php 
//Variáveis de sessão para parametrização - Serão extraídas do Banco de Dados

session_start("SUGESTAO");
$_SESSION["Gnomeprocesso"]	 	= "PLANEJAMENTO INSTITUCIONAL 2012";
$_SESSION["Gdatainicio"]  		= mktime(0, 0, 0, 10, 9, 2011);
$_SESSION["Gdatatermino"]		= mktime(0, 0, 0, 13, 9, 2011); 

$_SESSION["Gpaginaarquivo"] 		= "http://issuu.com/ifbaiano/docs/minuta.final-rg?viewMode=magazine&mode=embed";
$_SESSION["Gusrmail"] 			= "andre.rezende@ifbaiano.edu.br";
$_SESSION["Gpwdmail"] 			= "r3z3nd3";

?>

<?php include_once 'inc.path.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title> <?php echo ($_SESSION["Gnomeprocesso"]);?> </title>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	<link href="estilo_selecao.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div id="tudo">
		<div id="conteudoGeral">
			<div id="topo1">
				<div class="topo1_imagem1">
					<img src="imgs/topo1/ministerio_educacao.jpg" alt="Minist&eacute;rio de Educa&ccedil;&a&atilde;o" />
				</div>
				<!--<div class="topo1_imagem2">
					<img src="imgs/topo1/brasil_um_pais_para_todos.jpg" alt="Brasil, um País para Todos" />
				</div>-->

				<div id="topo1_destaqueGoveno">
					<form action="">
						<select name="destaque_governo" id="destaque_governo" onchange="if (this.value != '0')window.open(this.value);">
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
				<img src="imgs/topo2/topo2.png" alt="Instituto Federal Baiano" />
				
				<div id="topo2Texto">
					<?php echo ($_SESSION["Gnomeprocesso"]);?>
				</div>
				
			</div>						
			<div id="meioGeral">
				<div id="colunaEsquerda">
					<div class="conteudoColunaEsquerda">
						<div id="menuEsquerdo">
							<div id="menu2">
								<ul class="menu">
									<li><a href="index.php?sc=Inicial">P&aacute;gina Inicial</a></li>
									<li><a href="index.php?sc=contribuir">Sugest&otilde;es</a></li>
									<li><a href="<?php echo ($_SESSION["Gpaginaarquivo"]);?>" target="blank">Documento para consulta</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>

				<div id="colunaMeio">
					<div id="tituloPrincipal"><?php  echo $scTitulo ?></div>
					<div class="conteudoColunaMeio">
						<?php
						if ((isset($sc)) and (file_exists($sc))) {
							include($sc);
						} else {
							echo "<p><strong>A p&aacute;gina solicitada n�o existe!</strong></p><p><a href=\"javascript:history.back();\">Voltar</a></p>";
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