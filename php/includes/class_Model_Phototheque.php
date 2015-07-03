<?php
/*
 * Permet la création d'un objet Phototheque avec ses attributs
 */
class Phototheque {

	private $Code_photo = null;
	private $OrganePhoto = null;
	private $CouleurPhoto = null;
	private $TypePhoto = null;
	private $FondPhoto = null;
	private $SitePhoto = null;
	private $DatePhoto = null;
	private $FichierPhoto = null;
	private $Photographe = null;
	private $CodePartenaire = null;
	private $Partenaire = null;
	
	public function getCode_photo(){return $this->Code_photo;}
	public function getOrganePhoto(){return $this->OrganePhoto;}
	public function getCouleurPhoto(){return $this->CouleurPhoto;}
	public function getTypePhoto(){return $this->TypePhoto;}
	public function getFondPhoto(){return $this->FondPhoto;}
	public function getSitePhoto(){return $this->SitePhoto;}
	public function getDatePhoto(){return $this->DatePhoto;}
	public function getFichierPhoto(){return $this->FichierPhoto;}
	public function getPhotographe(){return $this->Photographe;}
	public function getCodePartenaire(){return $this->CodePartenaire;}
	public function getPartenaire(){return $this->Partenaire;}
	
	function __construct($Code_photo,$OrganePhoto,$CouleurPhoto,$TypePhoto,$FondPhoto,$SitePhoto,$DatePhoto,$FichierPhoto,$Photographe,$CodePartenaire,$Partenaire){
		$this->Code_photo = $Code_photo;
		$this->OrganePhoto = $OrganePhoto;
		$this->CouleurPhoto = $CouleurPhoto;
		$this->TypePhoto = $TypePhoto;
		$this->FondPhoto = $FondPhoto;
		$this->SitePhoto = $SitePhoto;
		$this->DatePhoto = $DatePhoto;
		$this->FichierPhoto = $FichierPhoto;
		$this->Photographe = $Photographe;
		$this->CodePartenaire = $CodePartenaire;
		$this->Partenaire = $Partenaire;
	}

	function getListePhototheque(){
		$contents=array();
		$contents['Code_photo']=$this->getCode_photo();
		$contents['OrganePhoto']=$this->getOrganePhoto();
		$contents['CouleurPhoto']=$this->getCouleurPhoto();
		$contents['TypePhoto']=$this->getTypePhoto();
		$contents['FondPhoto']=$this->getFondPhoto();
		$contents['SitePhoto']=$this->getSitePhoto();
		$contents['DatePhoto']=$this->getDatePhoto();
		$contents['FichierPhoto']=$this->getFichierPhoto();
		$contents['Photographe']=$this->getPhotographe();
		$contents['CodePartenaire']=$this->getCodePartenaire();
		$contents['Partenaire']=$this->getPartenaire();
		return $contents;
	}
}
?>