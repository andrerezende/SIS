<?php

class Topico{
	protected $id;
	protected $nome;

	public function Topico($pid = null, $pnome = null) {
		$this->id = $pid;
		$this->nome = $pnome;
        }

	public function getNome() {
		return $this->nome;
	}

	public function setNome($pnome) {
		$this->nome = $pnome;
	}
        
	public function SelectByAll($sock) {
		$ssql = "SELECT id, nome FROM topico A " ;
		$ssql .= " ORDER BY id ASC";
		$rs = mysql_query($ssql, $sock);

		$ar = array();

		while ($linha = mysql_fetch_row($rs)){
			$obj = new Topico($linha[0], $linha[1]);
			$ar[] = $obj;
		}
		return ($ar);
	}   
}