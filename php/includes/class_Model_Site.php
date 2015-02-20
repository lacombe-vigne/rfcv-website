<?php

class Site {

	private $CodeSite = null;
	private $NomSite = null;
	private $RegionSite = null;
	private $DepartSite = null;
	private $CommuneSite = null;
	private $CodPostSite = null;
	private $AdresseSite = null;
	private $LatSite = null;
	private $LongSite = null;
	private $AltSite = null;
	private $SecRegENTAV = null;
	private $ProprietaireSite = null;
	private $ExploitSite = null;
	private $ResponsSite = null;
	private $TelSite = null;
	private $FaxSite = null;
	private $MailSite = null;
	private $AnneeCreationSite = null;
	private $VarMajoritairesSite = null;
	private $PresentationSite = null;

	

	public function getCodeSite(){return $this->CodeSite;}
	public function getNomSite(){return $this->NomSite;}
	public function getRegionSite(){return $this->RegionSite;}
	public function getDepartSite(){return $this->DepartSite;}
	public function getCommuneSite(){return $this->CommuneSite;}
	public function getCodPostSite(){return $this->CodPostSite;}
	public function getAdresseSite(){return $this->AdresseSite;}
	public function getLatSite(){return $this->LatSite;}
	public function getLongSite(){return $this->LongSite;}
	public function getAltSite(){return $this->AltSite;}
	public function getSecRegENTAV(){return $this->SecRegENTAV;}
	public function getProprietaireSite(){return $this->ProprietaireSite;}
	public function getExploitSite(){return $this->ExploitSite;}
	public function getResponsSite(){return $this->ResponsSite;}
	public function getTelSite(){return $this->TelSite;}
	public function getFaxSite(){return $this->FaxSite;}
	public function getMailSite(){return $this->MailSite;}
	public function getAnneeCreationSite(){return $this->AnneeCreationSite;}
	public function getVarMajoritairesSite(){return $this->VarMajoritairesSite;}
	public function getPresentationSite(){return $this->PresentationSite;}
	
	function __construct($CodeSite,$NomSite,$RegionSite,$DepartSite,$CommuneSite,$CodPostSite,$AdresseSite,$LatSite,$LongSite,$AltSite,$SecRegENTAV,$ProprietaireSite,$ExploitSite,$ResponsSite,$TelSite,$FaxSite,$MailSite,$AnneeCreationSite,$VarMajoritairesSite,$PresentationSite){
		$this->CodeSite = $CodeSite;
		$this->NomSite = $NomSite;
		$this->RegionSite = $RegionSite;
		$this->DepartSite = $DepartSite;
		$this->CommuneSite = $CommuneSite;
		$this->CodPostSite = $CodPostSite;
		$this->AdresseSite = $AdresseSite;
		$this->LatSite = $LatSite;
		$this->LongSite = $LongSite;
		$this->AltSite = $AltSite;
		$this->SecRegENTAV = $SecRegENTAV;
		$this->ProprietaireSite = $ProprietaireSite;
		$this->ExploitSite = $ExploitSite;
		$this->ResponsSite = $ResponsSite;
		$this->TelSite = $TelSite;
		$this->FaxSite = $FaxSite;
		$this->MailSite = $MailSite;
		$this->AnneeCreationSite = $AnneeCreationSite;
		$this->VarMajoritairesSite = $VarMajoritairesSite;
		$this->PresentationSite = $PresentationSite;
	}

	function getListeSite(){
		$contents=array();
		$contents['CodeSite']=$this->getCodeSite();
		$contents['NomSite']=$this->getNomSite();
		$contents['RegionSite']=$this->getRegionSite();
		$contents['DepartSite']=$this->getDepartSite();
		return $contents;
		
	}
	function getFicherSite(){
		$contents=array();
		$contents['CodeSite'] =$this->getCodeSite();
		$contents['NomSite'] =$this->getNomSite();
		$contents['RegionSite'] =$this->getRegionSite();
		$contents['DepartSite'] =$this->getDepartSite();
		$contents['CommuneSite'] =$this->getCommuneSite();
		$contents['CodPostSite'] =$this->getCodPostSite();
		$contents['AdresseSite'] =$this->getAdresseSite();
		$contents['LatSite'] =$this->getLatSite();
		$contents['LongSite'] =$this->getLongSite();
		$contents['AltSite']=$this->getAltSite();
		$contents['SecRegENTAV']=$this->getSecRegENTAV();
		$contents['ProprietaireSite']=$this->getProprietaireSite();
		$contents['ExploitSite']=$this->getExploitSite();
		$contents['ResponsSite'] =$this->getResponsSite();
		$contents['TelSite'] =$this->getTelSite();
		$contents['FaxSite'] =$this->getFaxSite();
		$contents['MailSite'] =$this->getMailSite();
		$contents['AnneeCreationSite'] =$this->getAnneeCreationSite();
		$contents['VarMajoritairesSite']=$this->getVarMajoritairesSite();
		$contents['PresentationSite']=$this->getPresentationSite();
		return $contents;
		
	}
}
?>