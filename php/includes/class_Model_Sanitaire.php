<?php

class Sanitaire {

	private $IdTest = null;
	private $CodeIntro = null;
	private $ResultatTest = null;
	private $CategorieTest = null;
	private $MatTest = null;
	private $Laboratoire = null;
	private $dateTest = null;
	private $LieuTest = null;
	private $SoucheTestee = null;
	private $NomTest = null;
	
	private $CodeSanitaire = null;
        private $nomVar = null;
	private $CodeVar = null;
	private $nomAcc = null;
	private $CodeAcc = null;
	private $PathogeneTeste = null;
	private $CodeEmplacem = null;
	private $Partenaire = null;
	private $CodePartenaire=null;


	public function getIdTest(){return $this->IdTest;}
	public function getCodeIntro(){return $this->CodeIntro;}
	public function getResultatTest(){return $this->ResultatTest;}
	public function getCategorieTest(){return $this->CategorieTest;}
	public function getMatTest(){return $this->MatTest;}
	public function getLaboratoire(){return $this->Laboratoire;}
	public function getdateTest(){return $this->dateTest;}
	public function getLieuTest(){return $this->LieuTest;}
	public function getSoucheTestee(){return $this->SoucheTestee;}
	public function getNomTest(){return $this->NomTest;}

	
	public function getCodeSanitaire(){return $this->CodeSanitaire;}
        public function getnomVar(){return $this->nomVar;}
	public function getCodeVar(){return $this->CodeVar;}
	public function getnomAcc(){return $this->nomAcc;}
	public function getCodeAcc(){return $this->CodeAcc;}
	public function getPathogeneTeste(){return $this->PathogeneTeste;}
	public function getCodeEmplacem(){return $this->CodeEmplacem;}
	public function getPartenaire(){return $this->Partenaire;}
	public function getCodePartenaire(){return $this->CodePartenaire;}
	
	function __construct($IdTest,$CodeIntro,$ResultatTest,$CategorieTest,$MatTest,$Laboratoire,$dateTest,$LieuTest,$SoucheTestee,$NomTest,$CodeSanitaire,$nomAcc,$CodeAcc,$PathogeneTeste,$CodeEmplacem,$Partenaire,$CodePartenaire){
		$this->IdTest = $IdTest;
		$this->CodeIntro = $CodeIntro;
		$this->ResultatTest = $ResultatTest;
		$this->CategorieTest = $CategorieTest;
		$this->MatTest = $MatTest;
		$this->Laboratoire = $Laboratoire;
		$this->dateTest = $dateTest;
		$this->LieuTest = $LieuTest;
		$this->SoucheTestee = $SoucheTestee;
		$this->NomTest = $NomTest;
		
		$this->CodeSanitaire = $CodeSanitaire;
                $this->nomVar = $nomVar;
		$this->CodeVar = $CodeVar;
		$this->nomAcc = $nomAcc;
		$this->CodeAcc = $CodeAcc;
		$this->PathogeneTeste = $PathogeneTeste;
		$this->CodeEmplacem = $CodeEmplacem;
		$this->Partenaire = $Partenaire;
		$this->CodePartenaire=$CodePartenaire;
	}

	function getListeSanitaire(){
		$San_Contents=array();
		$San_Contents['IdTest']=$this->getIdTest();
		$San_Contents['CodeIntro']=$this->getCodeIntro();
                $San_Contents['NomTest']=$this->getNomTest();
                $San_Contents['CategorieTest']=$this->getCategorieTest();
		$San_Contents['ResultatTest']=$this->getResultatTest();		
                $San_Contents['Laboratoire']=$this->getLaboratoire();
		return $San_Contents;
	}
	function getFicherSanitaire(){
		$contents=array();
		$contents['CodeSanitaire']=$this->getCodeSanitaire();
                $contents['nomVar']=$this->getnomVar();
		$contents['CodeVar']=$this->getCodeVar();
		$contents['nomAcc']=$this->getnomAcc();
		$contents['CodeAcc']=$this->getCodeAcc();
		$contents['PathogeneTeste']=$this->getPathogeneTeste();
		$contents['ResultatTest']=$this->getResultatTest();
		$contents['CategorieTest']=$this->getCategorieTest();
		$contents['MatTeste']=$this->getMatTest();
		$contents['CodeEmplacem']=$this->getCodeEmplacem();
		$contents['SoucheTestee']=$this->getSoucheTestee();
		$contents['Laboratoire']=$this->getLaboratoire();
		$contents['DateTest']=$this->getdateTest();
		$contents['Partenaire']=$this->getPartenaire();
		$contents['CodePartenaire']=$this->getCodePartenaire();
		return $contents;
	}
}
?>