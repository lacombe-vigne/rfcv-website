<?php

class Espece {

	private $CodeEsp = null;
	private $Espece = null;
	private $Botqniste = null;
	private $Genre = null;
	private $CompoGenet = null;
	private $SousGenre = null;
	private $Validite = null;
	private $Tronc = null;
	private $RemarqueEsp = null;
	
	public function getCodeEsp(){return $this->CodeEsp;}
	public function getEspece(){return $this->Espece;}
	public function getBotqniste(){return $this->Botqniste;}
	public function getGenre(){return $this->Genre;}
	public function getCompoGenet(){return $this->CompoGenet;}
	public function getSousGenre(){return $this->SousGenre;}
	public function getValidite(){return $this->Validite;}
	public function getTronc(){return $this->Tronc;}
	public function getRemarqueEsp(){return $this->RemarqueEsp;}

	function __construct($CodeEsp, $Espece, $Botqniste, $Genre, $CompoGenet, $SousGenre, $Validite, $Tronc, $RemarqueEsp){
		$this->CodeEsp = $CodeEsp;
		$this->Espece = $Espece;
		$this->Botqniste = $Botqniste;
		$this->Genre = $Genre;
		$this->CompoGenet = $CompoGenet;
		$this->SousGenre = $SousGenre;
		$this->Validite = $Validite;
		$this->Tronc = $Tronc;
		$this->RemarqueEsp = $RemarqueEsp;
	}
	public function getListeEspece(){
		$contents_espece=array();
		$contents_espece['codeEspece']=$this->getCodeEsp();
		$contents_espece['nomEspece']=$this->getEspece();
		$contents_espece['botaniste']=$this->getBotqniste();
		$contents_espece['tronc']=$this->getTronc();
		return $contents_espece;
	}
	public function getFicherEspece(){
		$contents=array();
		$contents['CodeEsp']=$this->getCodeEsp();
		$contents['Espece']=$this->getEspece();
		$contents['Botaniste']=$this->getBotqniste();
		$contents['Genre']=$this->getGenre();
		$contents['CompoGenet']=$this->getCompoGenet();
		$contents['SousGenre']=$this->getSousGenre();
		$contents['Validite']=$this->getValidite();
		$contents['Tronc']=$this->getTronc();
		$contents['RemarqueEsp']=$this->getRemarqueEsp();
		return $contents;
	}

}
?>