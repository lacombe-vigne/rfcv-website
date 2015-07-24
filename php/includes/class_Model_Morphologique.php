<?php
/*
 * Permet la création d'un objet Morphologique avec ses attributs
 */
class Morphologique {

	private $id = null;
	private $Code = null;
	private $Description = null;
	private $Critaire = null;
	private $CaractereOIV = null;
	
	private $CodeAmpelo = null;
        private $nomVar = null;
	private $CodeVar = null;
	private $nomAcc = null;
	private $CodeAcc = null;
	private $Descripteur = null;
	private $CodeDescripteur = null;
	private $Caractere = null;
	private $CodeCaractere = null;
	private $Experimentateur=null;
	private $Partenaire=null;
	private $CodePartenaire=null;
	private $JourExp=null;
	private $MoisExp=null;
	private $AnneeExp=null;
	private $LieuExp=null;
	private $SiteExp=null;
	private $CodeSite=null;
	private $Emplamcement=null;

	public function getid(){return $this->id;}
	public function getCode(){return $this->Code;}
	public function getDescription(){return $this->Description;}
	public function getCritaire(){return $this->Critaire;}
	public function getCaractereOIV(){return $this->CaractereOIV;}
	
	public function getCodeAmpelo(){return $this->CodeAmpelo;}
        public function getnomVar(){return $this->nomVar;}
	public function getCodeVar(){return $this->CodeVar;}
	public function getnomAcc(){return $this->nomAcc;}
	public function getCodeAcc(){return $this->CodeAcc;}
	public function getDescripteur(){return $this->Descripteur;}
	public function getCodeDescripteur(){return $this->CodeDescripteur;}
	public function getCaractere(){return $this->Caractere;}
	public function getCodeCaractere(){return $this->CodeCaractere;}
	public function getExperimentateur(){return $this->Experimentateur;}
	public function getPartenaire(){return $this->Partenaire;}
	public function getCodePartenaire(){return $this->CodePartenaire;}
	public function getJourExp(){return $this->JourExp;}
	public function getMoisExp(){return $this->MoisExp;}
	public function getAnneeExp(){return $this->AnneeExp;}
	public function getLieuExp(){return $this->LieuExp;}
	public function getSiteExp(){return $this->SiteExp;}
	public function getCodeSite(){return $this->CodeSite;}
	public function getEmplamcement(){return $this->Emplamcement;}
	
	function __construct($id,$Code,$Description,$Critaire,$CaractereOIV,$CodeAmpelo,$nomVar,$CodeVar,$nomAcc,$CodeAcc,$Descripteur,$CodeDescripteur,$Caractere,$CodeCaractere,$Experimentateur,$Partenaire,$CodePartenaire,$JourExp,$MoisExp,$AnneeExp,$LieuExp,$SiteExp,$CodeSite,$Emplamcement){
		$this->id = $id;
		$this->Code = $Code;
		$this->Description = $Description;
		$this->Critaire = $Critaire;
		$this->CaractereOIV = $CaractereOIV;
		
		$this->CodeAmpelo = $CodeAmpelo;
                $this->nomVar = $nomVar;
		$this->CodeVar = $CodeVar;
		$this->nomAcc = $nomAcc;
		$this->CodeAcc = $CodeAcc;
		$this->Descripteur = $Descripteur;
		$this->CodeDescripteur = $CodeDescripteur;
		$this->Caractere = $Caractere;
		$this->CodeCaractere = $CodeCaractere;
		$this->Experimentateur=$Experimentateur;
		$this->Partenaire=$Partenaire;
		$this->CodePartenaire=$CodePartenaire;
		$this->JourExp=$JourExp;
		$this->MoisExp=$MoisExp;
		$this->AnneeExp=$AnneeExp;
		$this->LieuExp=$LieuExp;
		$this->SiteExp=$SiteExp;
		$this->CodeSite=$CodeSite;
		$this->Emplamcement=$Emplamcement;
	}

	function getListeMorphologique(){
		$contents=array();
		$contents['id']=$this->getid();
		$contents['Code']=$this->getCode();
		$contents['Description']=$this->getDescription();
		$contents['Critaire']=$this->getCritaire();
		$contents['CaractereOIV']=$this->getCaractereOIV();
		return $contents;
	}
	function getFicherMorphologique(){
		$contents=array();
		$contents['CodeAmpelo']=$this->getCodeAmpelo();
                $contents['nomVar']=$this->getnomVar();
		$contents['CodeVar']=$this->getCodeVar();
		$contents['nomAcc']=$this->getnomAcc();
		$contents['CodeAcc']=$this->getCodeAcc();
		$contents['Descripteur']=$this->getDescripteur();
		$contents['CodeDescripteur']=$this->getCodeDescripteur();
		$contents['Caractere']=$this->getCaractere();
		$contents['CodeCaractere']=$this->getCodeCaractere();
		$contents['Experimentateur']=$this->getExperimentateur();
		$contents['Partenaire']=$this->getPartenaire();
		$contents['CodePartenaire']=$this->getCodePartenaire();
		$contents['JourExp']=$this->getJourExp();
		$contents['MoisExp']=$this->getMoisExp();
		$contents['AnneeExp']=$this->getAnneeExp();
		$contents['LieuExp']=$this->getLieuExp();
		$contents['SiteExp']=$this->getSiteExp();
		$contents['CodeSite']=$this->getCodeSite();
		$contents['Emplamcement']=$this->getEmplamcement();
		return $contents;
	}
	function getSelectionMorphologique(){
		$contents=array();
		$contents['id']=$this->getid();
		$contents['Code']=$this->getCode();
		$contents['Description']=$this->getDescription();
		$contents['Critaire']=$this->getCritaire();
		$contents['CaractereOIV']=$this->getCaractereOIV();
		$contents['CodeAcc']=$this->getCodeAcc();
                $contents['CodeVar']=$this->getCodeVar();
		return $contents;
	}
}
?>