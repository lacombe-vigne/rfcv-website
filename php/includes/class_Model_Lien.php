<?php
/*
 * Permet la création d'un objet Lien avec ses attributs
 */
class Lien {
	private $Code_lien = null;
	private $Titre = null;
	private $NomSite = null;
	private $Pays = null;
	private $URL = null;
	private $CodeVar = null;
	private $CodeIntro = null;

	
	public function getCode_lien(){return $this->Code_lien;}
	public function getTitre(){return $this->Titre;}
	public function getNomSite(){return $this->NomSite;}
	public function getPays(){return $this->Pays;}
	public function getURL(){return $this->URL;}
	public function getCodeVar(){return $this->CodeVar;}
	public function getCodeIntro(){return $this->CodeIntro;}
	
	function __construct($Code_lien,$Titre,$NomSite,$Pays,$URL,$CodeVar,$CodeIntro){
		$this->Code_lien = $Code_lien;
		$this->Titre=$Titre;
		$this->NomSite=$NomSite;
		$this->Pays=$Pays;
		$this->URL=$URL;
		$this->CodeVar=$CodeVar;
		$this->CodeIntro=$CodeIntro;
	}
	
	function getListeLien(){
		$contents=array();
		$contents['Code_lien']=$this->getCode_lien();
		$contents['Titre']=$this->getTitre();
		$contents['NomSite']=$this->getNomSite();
		$contents['Pays']=$this->getPays();
		$contents['URL']=$this->getURL();

		return $contents;
	}
	function getSelectionLien(){
		$contents=array();
		$contents['Code_lien']=$this->getCode_lien();
		$contents['Titre']=$this->getTitre();
		$contents['NomSite']=$this->getNomSite();
		$contents['Pays']=$this->getPays();
		$contents['URL']=$this->getURL();
		$contents['CodeVar']=$this->getCodeVar();
		$contents['CodeIntro']=$this->getCodeIntro();
	
		return $contents;
	}
}
?>