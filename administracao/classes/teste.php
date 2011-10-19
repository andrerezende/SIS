<?php

    $pid= null;
    $pnome= "nome";
    $pemail= "email";
    $ptopico= "topico";
    $partigo= "artigo";
    $pjustificativa= "justificativa";
    $psugestao= "sugestao";
    $pmatricula= "99888772";
    $psiape= "888282";
    
    include_once ("DB.php");
    include_once ("Mensagem.php");
    
    $banco = DB::getInstance();
    $conexao = $banco->ConectarDB();

    $obj_mensagem = new Mensagem($pid, $pnome, $pemail, $ptopico,$partigo,$pjustificativa,$psugestao,$pmatricula, $psiape);
    $valor        = $obj_mensagem ->Inserir($conexao);
    
    echo($valor);
?>
