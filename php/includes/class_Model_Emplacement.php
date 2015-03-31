<?php

class Emplacement {

	private $CodeEmplacem = null;
	private $CodeSite = null;
	private $Parcelle = null;
	private $Rang = null;
	private $PremiereSouche = null;
	private $DerniereSouche = null;
	private $NomIntro = null;
	private $CodeIntro = null;
        private $NomVar = null;
	private $CodeVar = null;
	private $CodeIntroPartenaire = null;
	private $NumCloneCTPS = null;
	private $AnneePlantation = null;
	
	
	private $nomAcc = null;
	private $CodeAcc = null;
	private $Site = null;
	private $Zone = null;
	private $SousPartie = null;
	private $NbreEtatNormal = null;
	private $NbreEtatMoyen = null;
	private $NbreEtatMoyFaible=null;
	private $NbreEtatFaible=null;
	private $NbreEtatTresFaible=null;
	private $NbreEtatMort=null;
	private $TypeSouche=null;
	private $AnneeElimination=null;
	private $CategMateriel=null;
	private $Greffe=null;
	private $PorteGreffe=null;

	public function getCodeEmplacem(){return $this->CodeEmplacem;}
	public function getCodeSite(){return $this->CodeSite;}
	public function getParcelle(){return $this->Parcelle;}
	public function getRang(){return $this->Rang;}
	public function getPremiereSouche(){return $this->PremiereSouche;}
	public function getDerniereSouche(){return $this->DerniereSouche;}
	public function getNomIntro(){return $this->NomIntro;}
	public function getCodeIntro(){return $this->CodeIntro;}
        public function getNomVar(){return $this->NomVar;}
	public function getCodeVar(){return $this->CodeVar;}
	public function getCodeIntroPartenaire(){return $this->CodeIntroPartenaire;}
	public function getNumCloneCTPS(){return $this->NumCloneCTPS;}
	public function getAnneePlantation(){return $this->AnneePlantation;}
	
	public function getnomAcc(){return $this->nomAcc;}
	public function getCodeAcc(){return $this->CodeAcc;}
	public function getSite(){return $this->Site;}
	public function getZone(){return $this->Zone;}
	public function getSousPartie(){return $this->SousPartie;}
	public function getNbreEtatNormal(){return $this->NbreEtatNormal;}
	public function getNbreEtatMoyen(){return $this->NbreEtatMoyen;}
	public function getNbreEtatMoyFaible(){return $this->NbreEtatMoyFaible;}
	public function getNbreEtatFaible(){return $this->NbreEtatFaible;}
	public function getNbreEtatTresFaible(){return $this->NbreEtatTresFaible;}
	public function getNbreEtatMort(){return $this->NbreEtatMort;}
	public function getTypeSouche(){return $this->TypeSouche;}
	public function getAnneeElimination(){return $this->AnneeElimination;}
	public function getCategMateriel(){return $this->CategMateriel;}
	public function getGreffe(){return $this->Greffe;}
	public function getPorteGreffe(){return $this->PorteGreffe;}
	
	function __construct($CodeEmplacem,$CodeSite,$Parcelle,$Rang,$PremiereSouche,$DerniereSouche,$NomIntro,$CodeIntro,$NomVar,$CodeVar,$CodeIntroPartenaire,$NumCloneCTPS,$AnneePlantation,$nomAcc,$CodeAcc,$Site,$Zone,$SousPartie,$NbreEtatNormal,$NbreEtatMoyen,$NbreEtatMoyFaible,$NbreEtatFaible,$NbreEtatTresFaible,$NbreEtatMort,$TypeSouche,$AnneeElimination,$CategMateriel,$Greffe,$PorteGreffe){
		$this->CodeEmplacem = $CodeEmplacem;
		$this->CodeSite = $CodeSite;
		$this->Parcelle = $Parcelle;
		$this->Rang = $Rang;
		$this->PremiereSouche = $PremiereSouche;
		$this->DerniereSouche = $DerniereSouche;
		$this->NomIntro = $NomIntro;
		$this->CodeIntro = $CodeIntro;
                $this->NomVar = $NomVar;
		$this->CodeVar = $CodeVar;
		$this->CodeIntroPartenaire = $CodeIntroPartenaire;
		$this->NumCloneCTPS = $NumCloneCTPS;
		$this->AnneePlantation = $AnneePlantation;
		
		$this->nomAcc = $nomAcc;
		$this->CodeAcc = $CodeAcc;
		$this->Site = $Site;
		$this->Zone = $Zone;
		$this->SousPartie = $SousPartie;
		$this->NbreEtatNormal = $NbreEtatNormal;
		$this->NbreEtatMoyen = $NbreEtatMoyen;
		$this->NbreEtatMoyFaible=$NbreEtatMoyFaible;
		$this->NbreEtatFaible=$NbreEtatFaible;
		$this->NbreEtatTresFaible=$NbreEtatTresFaible;
		$this->NbreEtatMort=$NbreEtatMort;
		$this->TypeSouche=$TypeSouche;
		$this->AnneeElimination=$AnneeElimination;
		$this->CategMateriel=$CategMateriel;
		$this->Greffe=$Greffe;
		$this->PorteGreffe=$PorteGreffe;
	}

	function getListeEmplaclemnt(){
		$Em_Contents=array();
		$Em_Contents['CodeEmplacem']=$this->getCodeEmplacem();
		$Em_Contents['CodeSite']=$this->getCodeSite();
		$Em_Contents['Parcelle']=$this->getParcelle();
		$Em_Contents['Rang']=$this->getRang();
		$Em_Contents['AnneePlantation']=$this->getAnneePlantation();
		$Em_Contents['NomIntro']=$this->getNomIntro();
		$Em_Contents['CodeIntro']=$this->getCodeIntro();
		$Em_Contents['CodeIntroPartenaire']=$this->getCodeIntroPartenaire();
		
		return $Em_Contents;
	}
	function getFicherEmplacement(){
		$contents=array();
		$contents['CodeEmplacemen']=$this->getCodeEmplacem();
		$contents['nomAcc']=$this->getnomAcc();
		$contents['CodeAcc']=$this->getCodeAcc();
                $contents['CodeVar']=$this->getCodeVar();
		$contents['NomVar']=$this->getNomVar();
		$contents['Site']=$this->getSite();
		$contents['CodeSite']=$this->getCodeSite();
		$contents['Zone']=$this->getZone();
		$contents['Parcelle']=$this->getParcelle();
		$contents['SousPartie']=$this->getSousPartie();
		$contents['NbreEtatNormal']=$this->getNbreEtatNormal();
		$contents['NbreEtatMoyen']=$this->getNbreEtatMoyen();
		$contents['NbreEtatMoyFaible']=$this->getNbreEtatMoyFaible();
		$contents['NbreEtatFaible']=$this->getNbreEtatFaible();
		$contents['NbreEtatTresFaible']=$this->getNbreEtatTresFaible();
		$contents['NbreEtatMort']=$this->getNbreEtatMort();
		$contents['Rang']=$this->getRang();
		$contents['TypeSouche']=$this->getTypeSouche();
		$contents['PremiereSouche']=$this->getPremiereSouche();
		$contents['DerniereSouche']=$this->getDerniereSouche();
		$contents['AnneePlantation']=$this->getAnneePlantation();
		$contents['AnneeElimination']=$this->getAnneeElimination();
		$contents['CategMateriel']=$this->getCategMateriel();
		$contents['Greffe']=$this->getGreffe();
		$contents['PorteGreffe']=$this->getPorteGreffe();
		$contents['NumCloneCTPS']=$this->getNumCloneCTPS();
		return $contents;
	}
}
?>