<?php

class Utilisateur {

	private $CodePersonne = null;
	private $nomPersonne = null;
	private $prenomPersonne = null;
	private $CodePartenairePersonne = null;
	private $ProfilPersonne = null;
	private $TelBureau = null;
	private $FaxBureau = null;
	private $MailBureau = null;
	private $MotDePasse = null;
	private $NomPartenaire = null;
	private $PersonneMAJ = null;
	private $DateFinValide = null;
	private $Fonction =null;
	
	
	public function getCodePersonne(){return $this->CodePersonne;}
	public function getnomPersonne(){return $this->nomPersonne;}
	public function getprenomPersonne(){return $this->prenomPersonne;}
	public function getCodePartenairePersonne(){return $this->CodePartenairePersonne;}
	public function getProfilPersonne(){return $this->ProfilPersonne;}
	public function getTelBureau(){return $this->TelBureau;}
	public function getFaxBureau(){return $this->FaxBureau;}
	public function getMailBureau(){return $this->MailBureau;}
	public function getMotDePasse(){return $this->MotDePasse;}
	public function getNomPartenaire(){return $this->NomPartenaire;}
	public function getPersonneMAJ(){return $this->PersonneMAJ;}
	public function getDateFinValide(){return $this->DateFinValide;}
	public function getFonction(){return $this->Fonction;}

	function __construct($CodePersonne,$nomPersonne,$prenomPersonne,$CodePartenairePersonne,$ProfilPersonne,$TelBureau,$FaxBureau,$MailBureau,$MotDePasse,$NomPartenaire,$PersonneMAJ,$DateFinValide,$Fonction){
		$this->CodePersonne = $CodePersonne;
		$this->nomPersonne = $nomPersonne;
		$this->prenomPersonne = $prenomPersonne;
		$this->CodePartenairePersonne = $CodePartenairePersonne;
		$this->ProfilPersonne = $ProfilPersonne;
		$this->TelBureau = $TelBureau;
		$this->FaxBureau = $FaxBureau;
		$this->MailBureau = $MailBureau;
		$this->MotDePasse = $MotDePasse;
		$this->NomPartenaire = $NomPartenaire;
		$this->PersonneMAJ = $PersonneMAJ;
		$this->DateFinValide = $DateFinValide;
		$this->Fonction = $Fonction;
	}
	function getSesInfos(){
		$ses_info=array();
		$ses_info['CodePersonne']=$this->getCodePersonne();
		$ses_info['Nom']=$this->getnomPersonne();
		$ses_info['Prenom']=$this->getprenomPersonne();
		$ses_info['DateFin']=$this->getDateFinValide();
		$ses_info['Tel']=$this->getTelBureau();
		$ses_info['Fax']=$this->getFaxBureau();
		$ses_info['mail']=$this->getMailBureau();
		$ses_info['Fonction']=$this->getMailBureau();
		$ses_info['Partenaire']=$this->getNomPartenaire();
		$ses_info['Fonction']=$this->getFonction();
		return $ses_info;
	}
}
?>