<?php
/*
 * Permet la création d'un objet Partenaire avec ses attributs
 */
class Partenaire {

	private $CodePartenaire = null;
	private $NomPartenaire = null;
	private $SiglePartenaire = null;
	private $SectionRegionaleENTAV = null;
	private $RegionPartenaire = null;
	private $DepartPartenaire = null;
	private $ResponsablesPartenaire = null;
	private $TelephonePartenaire = null;
	private $Email = null;
	private $AdressePartenaire = null;
	private $CodPostPartenaire = null;
	private $CommunePartenaire = null;
	

	public function getCodePartenaire(){return $this->CodePartenaire;}
	public function getNomPartenaire(){return $this->NomPartenaire;}
	public function getSiglePartenaire(){return $this->SiglePartenaire;}
	public function getSectionRegionaleENTAV(){return $this->SectionRegionaleENTAV;}
	public function getRegionPartenaire(){return $this->RegionPartenaire;}
	public function getDepartPartenaire(){return $this->DepartPartenaire;}
	public function getResponsablesPartenaire(){return $this->ResponsablesPartenaire;}
	public function getTelephonePartenaire(){return $this->TelephonePartenaire;}
	public function getEmail(){return $this->Email;}
	public function getAdressePartenaire(){return $this->AdressePartenaire;}
	public function getCodPostPartenaire(){return $this->CodPostPartenaire;}
	public function getCommunePartenaire(){return $this->CommunePartenaire;}
	
	function __construct($CodePartenaire,$NomPartenaire,$SiglePartenaire,$SectionRegionaleENTAV,$RegionPartenaire,$DepartPartenaire,$ResponsablesPartenaire,$TelephonePartenaire,$Email,$AdressePartenaire,$CodPostPartenaire,$CommunePartenaire){
		$this->CodePartenaire = $CodePartenaire;
		$this->NomPartenaire = $NomPartenaire;
		$this->SiglePartenaire = $SiglePartenaire;
		$this->SectionRegionaleENTAV = $SectionRegionaleENTAV;
		$this->RegionPartenaire = $RegionPartenaire;
		$this->DepartPartenaire = $DepartPartenaire;
		$this->ResponsablesPartenaire = $ResponsablesPartenaire;
		$this->TelephonePartenaire = $TelephonePartenaire;
		$this->Email = $Email;
		$this->AdressePartenaire = $AdressePartenaire;
		$this->CodPostPartenaire = $CodPostPartenaire;
		$this->CommunePartenaire = $CommunePartenaire;
	}

	function getListePartenaire(){
		$contents=array();
		$contents['CodePartenaire']=$this->getCodePartenaire();
		$contents['NomPartenaire']=$this->getNomPartenaire();
		$contents['SiglePartenaire']=$this->getSiglePartenaire();
		$contents['SectionRegionaleENTAV']=$this->getSectionRegionaleENTAV();
		return $contents;
		
	}
	function getFicherPartenaire(){
		$contents=array();
		$contents['CodePartenaire'] =$this->getCodePartenaire();
		$contents['NomPartenaire'] =$this->getNomPartenaire();
		$contents['SiglePartenaire'] =$this->getSiglePartenaire();
		$contents['SectionRegionaleENTAV'] =$this->getSectionRegionaleENTAV();
		$contents['RegionPartenaire'] =$this->getRegionPartenaire();
		$contents['DepartPartenaire'] =$this->getDepartPartenaire();
		$contents['ResponsablesPartenaire'] =$this->getResponsablesPartenaire();
		$contents['TelephonePartenaire'] =$this->getTelephonePartenaire();
		$contents['Email']=$this->getEmail();
		$contents['AdressePartenaire']=$this->getAdressePartenaire();
		$contents['CodPostPartenaire']=$this->getCodPostPartenaire();
		$contents['CommunePartenaire']=$this->getCommunePartenaire();
		return $contents;
		
	}
}
?>