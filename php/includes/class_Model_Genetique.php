<?php
/*
 * Permet la création d'un objet Genetique avec ses attributs
 */
class Genetique {

	private $Code = null;
	private $Margueur = null;
	private $Allele1 = null;
	private $Allele2 = null;
	private $Partenaire = null;
	private $Date_gen = null;
	
        private $nomVar = null;
	private $CodeVar = null;
	private $nomAcc = null;
	private $CodeAcc = null;
	private $EmplacemRecolte = null;
	private $SouchePrelev = null;
        private $DateRecolte = null;
	private $IdProtocoleRecolte = null;
	private $TypeOrgane = null;
	private $IdStockADN = null;
	private $IdProtocolePCR = null;
	private $DatePCR = null;
	private $DateRun = null;
	private $CodePartenaire = null;


	public function getCode(){return $this->Code;}
	public function getMargueur(){return $this->Margueur;}
	public function getAllele1(){return $this->Allele1;}
	public function getAllele2(){return $this->Allele2;}
	public function getPartenaire(){return $this->Partenaire;}
	public function getDate_gen(){return $this->Date_gen;}
	
        public function getnomVar(){return $this->nomVar;}
	public function getCodeVar(){return $this->CodeVar;}
	public function getnomAcc(){return $this->nomAcc;}
	public function getCodeAcc(){return $this->CodeAcc;}
	public function getEmplacemRecolte(){return $this->EmplacemRecolte;}
	public function getSouchePrelev(){return $this->SouchePrelev;}
        public function getDateRecolte(){return $this->DateRecolte;}
	public function getIdProtocoleRecolte(){return $this->IdProtocoleRecolte;}
	public function getTypeOrgane(){return $this->TypeOrgane;}
	public function getIdStockADN(){return $this->IdStockADN;}
	public function getIdProtocolePCR(){return $this->IdProtocolePCR;}
	public function getDatePCR(){return $this->DatePCR;}
	public function getDateRun(){return $this->DateRun;}
	public function getCodePartenaire(){return $this->CodePartenaire;}
	
	function __construct($Code,$Margueur,$Allele1,$Allele2,$Partenaire,$Date_gen,$nomVar,$CodeVar ,$nomAcc,$CodeAcc,$EmplacemRecolte,$SouchePrelev,$DateRecolte,$IdProtocoleRecolte,$TypeOrgane,$IdStockADN,$IdProtocolePCR,$DatePCR,$DateRun,$CodePartenaire){
		$this->Code = $Code;
		$this->Margueur = $Margueur;
		$this->Allele1 = $Allele1;
		$this->Allele2 = $Allele2;
		$this->Partenaire = $Partenaire;
		$this->Date_gen = $Date_gen;
		
                $this->nomVar = $nomVar;
		$this->CodeVar = $CodeVar;
		$this->nomAcc = $nomAcc;
		$this->CodeAcc = $CodeAcc;
		$this->EmplacemRecolte = $EmplacemRecolte;
		$this->SouchePrelev = $SouchePrelev;
                $this->DateRecolte = $DateRecolte;
		$this->IdProtocoleRecolte = $IdProtocoleRecolte;
		$this->TypeOrgane = $TypeOrgane;
		$this->IdStockADN = $IdStockADN;
		$this->IdProtocolePCR=$IdProtocolePCR;
		$this->DatePCR=$DatePCR;
		$this->DateRun=$DateRun;
		$this->CodePartenaire=$CodePartenaire;
	}

	function getListeGenetique(){
		$contents_genetique=array();
		$contents_genetique['Code']=$this->getCode();
		$contents_genetique['Margueur']=$this->getMargueur();
		$contents_genetique['Allele1']=$this->getAllele1();
		$contents_genetique['Allele2']=$this->getAllele2();
		$contents_genetique['Partenaire']=$this->getPartenaire();
		$contents_genetique['Date']=$this->getDate_gen();
		return $contents_genetique;
	}
	function getFicherGenetique(){
		$contents=array();
		$contents['Code']=$this->getCode();
                $contents['nomVar']=$this->getnomVar();
		$contents['CodeVar']=$this->getCodeVar();
		$contents['nomAcc']=$this->getnomAcc();
		$contents['CodeAcc']=$this->getCodeAcc();
		$contents['Marqueur']=$this->getMargueur();
		$contents['ValeurCodee1']=$this->getAllele1();
		$contents['ValeurCodee2']=$this->getAllele2();
		$contents['EmplacemRecolte']=$this->getEmplacemRecolte();
		$contents['SouchePrelev']=$this->getSouchePrelev();
		$contents['DateRecolte']=$this->getDateRecolte();
		$contents['IdProtocoleRecolte']=$this->getIdProtocoleRecolte();
		$contents['TypeOrgane']=$this->getTypeOrgane();
		$contents['IdStockADN']=$this->getIdStockADN();
		$contents['IdProtocolePCR']=$this->getIdProtocolePCR();
		$contents['DatePCR']=$this->getDatePCR();
		$contents['DateRun']=$this->getDateRun();
		$contents['Partenaire']=$this->getPartenaire();
		$contents['CodePartenaire']=$this->getCodePartenaire();
		return $contents;
	}
	function getSelectionGenetique(){
		$contents_genetique=array();
		$contents_genetique['Code']=$this->getCode();
		$contents_genetique['Margueur']=$this->getnomAcc();
		$contents_genetique['Allele1']=$this->getAllele1();
		$contents_genetique['Allele2']=$this->getAllele2();
		$contents_genetique['Partenaire']=$this->getPartenaire();
		$contents_genetique['Date']=$this->getDate_gen();
		$contents_genetique['CodeAcc']=$this->getCodeAcc();
		$contents_genetique['CodeVar']=$this->getCodeVar();
		return $contents_genetique;
	}
}
?>