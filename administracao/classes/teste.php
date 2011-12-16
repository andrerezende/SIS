<?php

    $pid= null;
    $nome= "nome";
    $email= "email";
    $campus = 2;    
    $topico= "topico";
    $artigo= "artigo";
    $justificativa= "justificativa";
    $sugestao= "sugestao";
    $matricula= "99888772";
    $siape= "888282";
    
    include_once ("DB.php");
    include_once ("Mensagem.php");
    
    $banco = DB::getInstance();
    $conexao = $banco->ConectarDB();

    $obj_mensagem = new Mensagem($pid, $nome, $email, $campus, $topico,$artigo,$justificativa,$sugestao,$matricula, $siape);
    $valor        = $obj_mensagem ->Inserir($conexao);
    
    echo($valor);
?>
