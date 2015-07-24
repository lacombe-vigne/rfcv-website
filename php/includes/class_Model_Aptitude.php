<?php
/*
 * Permet la création d'un objet Aptitude avec ses attributs
 */
class Aptitude {

	private $CodeDonnee = null;
	private $CodeVariete = null;
	private $AptitudeMesure = null;
	private $ValeurMesure = null;
	private $UniteMesure = null;
	private $PonderationValeur = null;
	private $date_apt = null;
	private $SiteMesure = null;
	private $PartenaireMesure = null;

	private $codeAptitude = null;
	private $nomVar = null;
	private $CodeVar = null;
	private $nomAcc = null;
	private $CodeAcc = null;
	private $Caracteristique = null;
	private $Valeur = null;
	private $Unite = null;
	private $Ponderation=null;
	private $Experimentateur=null;
	private $Partenaire=null;
	private $CodePartenaire=null;
	private $JourExp=null;
	private $MoisExp=null;
	private $AnneeExp=null;
	private $LieuExp=null;
	private $SiteExp=null;
	private $CodeSite=null;
	private $EmplacementExp=null;

	public function getCodeDonnee(){return $this->CodeDonnee;}
	public function getCodeVariete(){return $this->CodeVariete;}
	public function getAptitudeMesure(){return $this->AptitudeMesure;}
	public function getValeurMesure(){return $this->ValeurMesure;}
	public function getUniteMesure(){return $this->UniteMesure;}
	public function getPonderationValeur(){return $this->PonderationValeur;}
	public function getdate_apt(){return $this->date_apt;}
	public function getSiteMesure(){return $this->SiteMesure;}
	public function getPartenaireMesure(){return $this->PartenaireMesure;}
		
	public function getcodeAptitude(){return $this->codeAptitude;}
	public function getnomVar(){return $this->nomVar;}
	public function getCodeVar(){return $this->CodeVar;}
	public function getnomAcc(){return $this->nomAcc;}
	public function getCodeAcc(){return $this->CodeAcc;}
	public function getCaracteristique(){return $this->Caracteristique;}
	public function getValeur(){return $this->Valeur;}
	public function getUnite(){return $this->Unite;}
	public function getPonderation(){return $this->Ponderation;}
	public function getExperimentateur(){return $this->Experimentateur;}
	public function getPartenaire(){return $this->Partenaire;}
	public function getCodePartenaire(){return $this->CodePartenaire;}
	public function getJourExp(){return $this->JourExp;}
	public function getMoisExp(){return $this->MoisExp;}
	public function getAnneeExp(){return $this->AnneeExp;}
	public function getLieuExp(){return $this->LieuExp;}
	public function getSiteExp(){return $this->SiteExp;}
	public function getCodeSite(){return $this->CodeSite;}
	public function getEmplacementExp(){return $this->EmplacementExp;}

	function __construct($CodeDonnee,$CodeVariete,$AptitudeMesure,$ValeurMesure,$UniteMesure,$PonderationValeur,$date_apt,$SiteMesure,$PartenaireMesure,$codeAptitude,$nomVar,$CodeVar,$nomAcc,$CodeAcc,$Caracteristique,$Valeur,$Unite,$Ponderation,$Experimentateur,$Partenaire,$CodePartenaire,$JourExp,$MoisExp,$AnneeExp,$LieuExp,$SiteExp,$CodeSite,$EmplacementExp){
		$this->CodeDonnee = $CodeDonnee;
		$this->CodeVariete = $CodeVariete;
		$this->AptitudeMesure = $AptitudeMesure;
		$this->ValeurMesure = $ValeurMesure;
		$this->UniteMesure = $UniteMesure;
		$this->PonderationValeur = $PonderationValeur;
		$this->date_apt = $date_apt;
		$this->SiteMesure = $SiteMesure;
		$this->PartenaireMesure = $PartenaireMesure;
		
		$this->codeAptitude = $codeAptitude;
		$this->nomVar = $nomVar;
		$this->CodeVar = $CodeVar;
		$this->nomAcc = $nomAcc;
		$this->CodeAcc = $CodeAcc;
		$this->Caracteristique = $Caracteristique;
		$this->Valeur = $Valeur;
		$this->Unite = $Unite;
		$this->Ponderation=$Ponderation;
		$this->Experimentateur=$Experimentateur;
		$this->Partenaire=$Partenaire;
		$this->CodePartenaire=$CodePartenaire;
		$this->JourExp=$JourExp;
		$this->MoisExp=$MoisExp;
		$this->AnneeExp=$AnneeExp;
		$this->LieuExp=$LieuExp;
		$this->SiteExp=$SiteExp;
		$this->CodeSite=$CodeSite;
		$this->EmplacementExp=$EmplacementExp;
	}

	function getListeAptitude(){
		$contents=array();
		$contents['CodeDonnee']=$this->getCodeDonnee();
		$contents['CodeVariete']=$this->getCodeVariete();
		$contents['AptitudeMesure']=$this->getAptitudeMesure();
		$contents['ValeurMesure']=$this->getValeurMesure();
		$contents['UniteMesure']=$this->getUniteMesure();
		$contents['PonderationValeur']=$this->getPonderationValeur();
		$contents['date']=$this->getdate_apt();
		//$contents['SiteMesure']=$this->getSiteMesure();
		$contents['PartenaireMesure']=$this->getPartenaireMesure();
		return $contents;
		
	}
	function getFicherAptitude(){
		$contents=array();
		$contents['codeAptitude'] =$this->getcodeAptitude();
		$contents['nomVar'] =$this->getnomVar();
		$contents['CodeVar'] =$this->getCodeVar();
		$contents['nomAcc'] =$this->getnomAcc();
		$contents['CodeAcc'] =$this->getCodeAcc();
		$contents['Caracteristique'] =$this->getCaracteristique();
		$contents['Valeur'] =$this->getValeur();
		$contents['Unite'] =$this->getUnite();
		$contents['Ponderation']=$this->getPonderation();
		$contents['Experimentateur']=$this->getExperimentateur();
		$contents['Partenaire']=$this->getPartenaire();
		$contents['CodePartenaire']=$this->getCodePartenaire();
		$contents['JourExp']=$this->getJourExp();
		$contents['MoisExp']=$this->getMoisExp();
		$contents['AnneeExp']=$this->getAnneeExp();
		$contents['LieuExp']=$this->getLieuExp();
		$contents['SiteExp']=$this->getSiteExp();
		$contents['CodeSite']=$this->getCodeSite();
		$contents['EmplacementExp']=$this->getEmplacementExp();
		return $contents;
		
	}
	function getSelectionAptitude(){
		$contents=array();
		$contents['CodeDonnee']=$this->getCodeDonnee();
		$contents['AptitudeMesure']=$this->getAptitudeMesure();
		$contents['ValeurMesure']=$this->getValeurMesure();
		$contents['UniteMesure']=$this->getUniteMesure();
		$contents['PonderationValeur']=$this->getPonderationValeur();
		$contents['date']=$this->getdate_apt();
		$contents['SiteMesure']=$this->getSiteMesure();
		$contents['PartenaireMesure']=$this->getPartenaireMesure();
		$contents['CodeVar']=$this->getCodeVar();
		$contents['CodeAcc']=$this->getCodeAcc();
		return $contents;
		
	}
}
?>