<?php
session_start("SELECAO"); //sempre session_start antes de usar sessions

//Controle de t�rmino do processo seletivo
$data_incio   = $_SESSION["Gdatainicio"];
$data_fim     = $_SESSION["Gdatatermino"];
$data_atual   = strtotime(date("d/m/Y")); 

?>

<?php session_start();

@$sc = $_REQUEST['sc'];
@$scTitulo;

if ($sc == "") {
	$scTitulo = "P&aacute;gina Inicial";
	$sc = "inicial/pagina_inicial.php";
} elseif ($sc == "Inicial") {
	$scTitulo = "P&aacute;gina Inicial";
	$sc = "inicial/pagina_inicial.php";
} elseif ($sc == "contribuir") {

	$scTitulo = "Sugest&otilde;es";

	if ($data_fim >= $data_atual){
		$sc = "inscricao/sugestao_aberta.html";
	}else{
		$sc = "inscricao/sugestao_encerrada.html";
	}

} 