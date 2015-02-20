<?php

class Doc {
	private $Code_doc = null;
	private $Titre = null;
	private $Auteur = null;
	private $Editeur = null;
	private $Date_doc = null;
	private $Langue = null;
	private $NbPages = null;
	private $CodeRangement = null;
	private $Volume = null;
	private $Pages = null;
	private $TypeDoc = null;
	private $FichierDocPdf = null;
	private $CodeVar = null;
	private $NomVar = null;
	private $CodeAcc = null;
	private $NomAcc = null;
	
	public function getCode_doc(){return $this->Code_doc;}
	public function getTitre(){return $this->Titre;}
	public function getAuteur(){return $this->Auteur;}
	public function getEditeur(){return $this->Editeur;}
	public function getDate_doc(){return $this->Date_doc;}
	public function getLangue(){return $this->Langue;}
	public function getNbPages(){return $this->NbPages;}
	public function getCodeRangement(){return $this->CodeRangement;}
	public function getVolume(){return $this->Volume;}
	public function getPages(){return $this->Pages;}
	public function getTypeDoc(){return $this->TypeDoc;}
	public function getFichierDocPdf(){return $this->FichierDocPdf;}
	public function getCodeVar(){return $this->CodeVar;}
	public function getNomVar(){return $this->NomVar;}
	public function getCodeAcc(){return $this->CodeAcc;}
	public function getNomAcc(){return $this->NomAcc;}
	
	function __construct($Code_doc,$Titre,$Auteur,$Editeur,$Date_doc,$Langue,$NbPages,$CodeRangement,$Volume,$Pages,$TypeDoc,$FichierDocPdf,$CodeVar,$NomVar,$CodeAcc,$NomAcc){
	
		$this->Code_doc = $Code_doc;
		$this->Titre = $Titre;
		$this->Auteur = $Auteur;
		$this->Editeur = $Editeur;
		$this->Date_doc = $Date_doc;
		$this->Langue = $Langue;
		$this->NbPages = $NbPages;
		$this->CodeRangement=$CodeRangement;
		$this->Volume=$Volume;
		$this->Pages=$Pages;
		$this->TypeDoc=$TypeDoc;
		$this->FichierDocPdf=$FichierDocPdf;
		$this->CodeVar=$CodeVar;
		$this->NomVar=$NomVar;
		$this->CodeAcc=$CodeAcc;
		$this->NomAcc=$NomAcc;
	}
	function getListeDoc(){
		$contents=array();
		$contents['Code_doc']=$this->getCode_doc();
		$contents['Titre']=$this->getTitre();
		$contents['Auteur']=$this->getAuteur();
		$contents['Editeur']=$this->getEditeur();
		$contents['Date_doc']=$this->getDate_doc();
		$contents['Langue']=$this->getLangue();
		$contents['NbPages']=$this->getNbPages();
		$contents['CodeRangement']=$this->getCodeRangement();
		$contents['Volume']=$this->getVolume();
		$contents['Pages']=$this->getPages();
		$contents['TypeDoc']=$this->getTypeDoc();
		$contents['FichierDocPdf']="http://bioweb.supagro.inra.fr/collection_vigne2014/DocumentsPdfVignes/".$this->getFichierDocPdf();
		return $contents;
	}
	function getSelectionDoc(){
		$contents=array();
		$contents['Code_doc']=$this->getCode_doc();
		$contents['Titre']=$this->getTitre();
		$contents['Auteur']=$this->getAuteur();
		$contents['Editeur']=$this->getEditeur();
		$contents['Date_doc']=$this->getDate_doc();
		$contents['Langue']=$this->getLangue();
		$contents['NbPages']=$this->getNbPages();
		$contents['CodeRangement']=$this->getCodeRangement();
		$contents['Volume']=$this->getVolume();
		$contents['Pages']=$this->getPages();
		$contents['TypeDoc']=$this->getTypeDoc();
		$contents['FichierDocPdf']="http://bioweb.supagro.inra.fr/collection_vigne2014/DocumentsPdfVignes/".$this->getFichierDocPdf();
		$contents['CodeVar']=$this->getCodeVar();
		$contents['NomVar']=$this->getNomVar();
		$contents['CodeAcc']=$this->getCodeAcc();
		$contents['NomAcc']=$this->getNomAcc();
		return $contents;
	}
}
?>