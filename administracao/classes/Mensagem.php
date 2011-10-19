<?php

class Mensagem{
	protected $id;
	protected $nome;
	protected $email;
	protected $topico;
	protected $artigo;
	protected $justificativa;
	protected $sugestao;
	protected $matricula;
	protected $siape;

	public function Mensagem($pid = null, $pnome = null, $pemail=null, $ptopico=null,$partigo=null,$pjustificativa=null,$psugestao=null,$pmatricula=null, $psiape=null) {
		$this->id = $pid;
		$this->nome = $pnome;
		$this->email=$pemail;
		$this->topico=$ptopico;
		$this->artigo=$partigo;
		$this->justificativa=$pjustificativa;
		$this->sugestao=$psugestao;
		$this->matricula=$pmatricula;
		$this->siape=$psiape;
        }
        
        public function Inserir($sock) {
		$ssql = "insert into mensagem (nome, email, topico, artigo, justificativa, sugestao, matricula, siape) values ";
		$ssql .= "('".$this->nome."'". "," . "'". $this->email . "'"."," . "'" . $this->topico."'";
		$ssql .= "," . "'".$this->artigo."'". "," . "'". $this->justificativa . "'"."," . "'" . $this->sugestao."'";
                $ssql .= "," . $this->matricula . "," . $this->siape . ")";        
                        		              
                $rs = mysql_query($ssql, $sock);
		$linha = mysql_affected_rows();
                
 		if ($linha >0) {
			return true;
		} else {
			return false;
		}
	}
}