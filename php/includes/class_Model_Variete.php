<?php
/*
 * Permet la création d'un objet Variete avec ses attributs
 */
include_once('bibliFonc.php');
class Variete {

	private $CodeVar = null;
	private $NomVar = null;
	private $SynoMajeur = null;
	private $NumVarOnivins = null;
	private $InscriptionFrance = null;
	private $AnneeInscriptionFrance = null;
	private $UniteVar = null;
	private $Type = null;
	private $Espece = null;
	private $CouleurPe = null;
	private $CouleurPu = null;
	private $Saveur = null;
	private $Pepins = null;
	private $Obtenteur = null;
	private $Utilite = null;
	private $codeEspece = null;
	private $sexe=null;
	private $OIpays=null;
	private $OIregion=null;
	private $OIdeparte=null;
	private $OIinscriptionFrance=null;
	private $OIanneeInscriptionFrance=null;
	private $OInumVarOnivins=null;
	private $OIinscriptionEurop=null;
	private $Pobtenteur=null;
	private $PmereReelle=null;
	private $PanneeObtention=null;
	private $PcodeVarMereReelle=null;
	private $PmereObt=null;
	private $PprerReel=null;
	private $PcodeCroismentINRA=null;
	private $PcodeVarPereReel=null;
	private $PpereObt=null;
	private $PremarqueParenteReelle=null;
	private $RstatutEnCollection=null;
	private $RremarquesVar=null;
	
	public function getCodeVar(){return $this->CodeVar;}
	public function getNomVar(){return $this->NomVar;}
	public function getSynoMajeur(){return $this->SynoMajeur;}
	public function getNumVarOnivins(){return $this->NumVarOnivins;}
	public function getInscriptionFrance(){return $this->InscriptionFrance;}
	public function getAnneeInscriptionFrance(){return $this->AnneeInscriptionFrance;}
	public function getUniteVar(){return $this->UniteVar;}
	public function getType(){return $this->Type;}
	public function getEspece(){return $this->Espece;}
	public function getCouleurPe(){return $this->CouleurPe;}
	public function getCouleurPu(){return $this->CouleurPu;}
	public function getSaveur(){return $this->Saveur;}
	public function getPepins(){return $this->Pepins;}
	public function getObtenteur(){return $this->Obtenteur;}
	public function getUtilite(){return $this->Utilite;}
	public function getCodeEspece(){return $this->codeEspece;}
	public function getSexe(){return $this->sexe;}
	public function getOIpays(){return $this->OIpays;}
	public function getOIregion(){return $this->OIregion;}
	public function getOIdeparte(){return $this->OIdeparte;}
	public function getOIinscriptionFrance(){return $this->OIinscriptionFrance;}
	public function getOIanneeInscriptionFrance(){return $this->OIanneeInscriptionFrance;}
	public function getOInumVarOnivins(){return $this->OInumVarOnivins;}
	public function getOIinscriptionEurop(){return $this->OIinscriptionEurop;}
	public function getPobtenteur(){return $this->Pobtenteur;}
	public function getPmereReelle(){return $this->PmereReelle;}
	public function getPanneeObtention(){return $this->PanneeObtention;}
	public function getPcodeVarMereReelle(){return $this->PcodeVarMereReelle;}
	public function getPprerReel(){return $this->PprerReel;}
	public function getPmereObt(){return $this->PmereObt;}
	public function getPcodeCroismentINRA(){return $this->PcodeCroismentINRA;}
	public function getPcodeVarPereReel(){return $this->PcodeVarPereReel;}
	public function getPpereObt(){return $this->PpereObt;}
	public function getPremarqueParenteReelle(){return $this->PremarqueParenteReelle;}
	public function getRstatutEnCollection(){return $this->RstatutEnCollection;}
	public function getRremarquesVar(){return $this->RremarquesVar;}


	function __construct($CodeVar,$NomVar,$SynoMajeur,$NumVarOnivins,$InscriptionFrance,$AnneeInscriptionFrance,$UniteVar,$Type,$Espece,$CouleurPe,$CouleurPu,$Saveur,$Pepins,$Obtenteur,$Utilite,$codeEspece,$sexe,$OIpays,$OIregion,$OIdeparte,$OIinscriptionFrance,$OIanneeInscriptionFrance,$OInumVarOnivins,$OIinscriptionEurop,$Pobtenteur,$PmereReelle,$PanneeObtention,$PcodeVarMereReelle,$PmereObt,$PprerReel,$PcodeCroismentINRA,$PcodeVarPereReel,$PpereObt,$PremarqueParenteReelle,$RstatutEnCollection,$RremarquesVar){
		$this->CodeVar = $CodeVar;
		$this->NomVar = $NomVar;
		$this->SynoMajeur = $SynoMajeur;
		$this->NumVarOnivins = $NumVarOnivins;
		$this->InscriptionFrance = $InscriptionFrance;
		$this->AnneeInscriptionFrance = $AnneeInscriptionFrance;
		$this->UniteVar = $UniteVar;
		$this->Type = $Type;
		$this->Espece = $Espece;
		$this->CouleurPe = $CouleurPe;
		$this->CouleurPu = $CouleurPu;
		$this->Saveur = $Saveur;
		$this->Pepins = $Pepins;
		$this->Obtenteur = $Obtenteur;
		$this->Utilite = $Utilite;
		$this->codeEspece = $codeEspece;
		$this->sexe= $sexe;
		$this->OIpays= $OIpays;
		$this->OIregion= $OIregion;
		$this->OIdeparte= $OIdeparte;
		$this->OIinscriptionFrance= $OIinscriptionFrance;
		$this->OIanneeInscriptionFrance= $OIanneeInscriptionFrance;
		$this->OInumVarOnivins= $OInumVarOnivins;
		$this->OIinscriptionEurop= $OIinscriptionEurop;
		$this->Pobtenteur= $Pobtenteur;
		$this->PmereReelle= $PmereReelle;
		$this->PanneeObtention= $PanneeObtention;
		$this->PcodeVarMereReelle= $PcodeVarMereReelle;
		$this->PmereObt= $PmereObt;
		$this->PprerReel= $PprerReel;
		$this->PcodeCroismentINRA= $PcodeCroismentINRA;
		$this->PcodeVarPereReel= $PcodeVarPereReel;
		$this->PpereObt= $PpereObt;
		$this->PremarqueParenteReelle= $PremarqueParenteReelle;
		$this->RstatutEnCollection= $RstatutEnCollection;
		$this->RremarquesVar= $RremarquesVar;
	}
        
        function getFichePDFVariete(){/*Permet d'exporter les données en PDF*/
            $contents=array();
                $contents['CodeVar']=$this->getCodeVar();
		$contents['NomVar']=$this->getNomVar();
		$contents['SynoMajeur']=$this->getSynoMajeur();
		$contents['NumVarOnivins']=$this->getNumVarOnivins();
		$contents['InscriptionFrance']=$this->getInscriptionFrance();
		$contents['AnneeInscriptionFrance']=$this->getAnneeInscriptionFrance();
		$contents['UniteVar']=$this->getUniteVar();
		$contents['Type']=$this->getType();
		$contents['Espece']=$this->getEspece();
		$contents['codeEspece']=$this->getCodeEspece();
		$contents['CouleurPe']=$this->getCouleurPe();
		$contents['CouleurPu']=$this->getCouleurPu();
		$contents['Saveur']=$this->getSaveur();
		$contents['Pepins']=$this->getPepins();
		$contents['Obtenteur']=$this->getObtenteur();
		$contents['Utilite']=$this->getUtilite();
		$contents['OIpays']=$this->getOIpays();
                $contents['StatutEnCollection']=$this->getRstatutEnCollection();
		$contents['RemarquesVar']=$this->getRremarquesVar();
		$contents['Obtenteur']=$this->getPobtenteur();
		$contents['MereReelle']=$this->getPmereReelle();
		$contents['PereReel']=$this->getPprerReel();
		$contents['CodeCroisementINRA']=$this->getPcodeCroismentINRA();
		$contents['AnneeObtention']=$this->getPanneeObtention();
		$contents['CodeVarMereReelle']=$this->getPcodeVarMereReelle();
		$contents['CodeVarPereReel']=$this->getPcodeVarPereReel();
		$contents['RemarqueParenteReelle']=$this->getPremarqueParenteReelle();
		$contents['MereObt']=$this->getPmereObt();
		$contents['PereObt']=$this->getPpereObt();
		$contents['PaysOrigine']=$this->getOIpays();
		$contents['RegionOrigine']=$this->getOIregion();
		$contents['DepartOrigine']=$this->getOIdeparte();
		$contents['InscriptionFrance']=$this->getOIinscriptionFrance();
		$contents['NumVarOnivins']=$this->getOInumVarOnivins();
		$contents['AnneeInscriptionFrance']=$this->getOIanneeInscriptionFrance();
		$contents['InscriptionEurope']=$this->getOIinscriptionEurop();
                return $contents;
        }
	function getListeVariete(){
		$contents_variete=array();
		$contents_variete['codeVar']=$this->getCodeVar();
		$contents_variete['nomVar']=$this->getNomVar();
		$contents_variete['SynoMajeur']=$this->getSynoMajeur();
		$contents_variete['utilite']=$this->getUtilite();
		$contents_variete['couleurPel']=$this->getCouleurPe();
		$contents_variete['saveur']=$this->getSaveur();
		$contents_variete['pepins']=$this->getPepins();
		$contents_variete['sexe']=$this->getSexe();
		$contents_variete['paysorigine']=$this->getOIpays();
		return $contents_variete;
	}
	function getFicherVariete(){
		$contents=array();
		$contents['CodeVar']=$this->getCodeVar();
		$contents['NomVar']=$this->getNomVar();
		$contents['SynoMajeur']=$this->getSynoMajeur();
		$contents['NumVarOnivins']=$this->getNumVarOnivins();
		$contents['InscriptionFrance']=$this->getInscriptionFrance();
		$contents['AnneeInscriptionFrance']=$this->getAnneeInscriptionFrance();
		$contents['UniteVar']=$this->getUniteVar();
		$contents['Type']=$this->getType();
		$contents['Espece']=$this->getEspece();
		$contents['codeEspece']=$this->getCodeEspece();
		$contents['CouleurPe']=$this->getCouleurPe();
		$contents['CouleurPu']=$this->getCouleurPu();
		$contents['Saveur']=$this->getSaveur();
		$contents['Pepins']=$this->getPepins();
		$contents['Obtenteur']=$this->getObtenteur();
		$contents['Utilite']=$this->getUtilite();
		$contents['OIpays']=$this->getOIpays(); 
		return $contents;
	}
	function getFicherVarieteTab(){
		$remarque=array();
		$parente=array();
		$origine=array();
		$contents_tab=array();
		$remarque['StatutEnCollection']=$this->getRstatutEnCollection();
		$remarque['RemarquesVar']=$this->getRremarquesVar();
		$parente['Obtenteur']=$this->getPobtenteur();
		$parente['MereReelle']=$this->getPmereReelle();
		$parente['PereReel']=$this->getPprerReel();
		$parente['CodeCroisementINRA']=$this->getPcodeCroismentINRA();
		$parente['AnneeObtention']=$this->getPanneeObtention();
		$parente['CodeVarMereReelle']=$this->getPcodeVarMereReelle();
		$parente['CodeVarPereReel']=$this->getPcodeVarPereReel();
		$parente['RemarqueParenteReelle']=$this->getPremarqueParenteReelle();
		$parente['MereObt']=$this->getPmereObt();
		$parente['PereObt']=$this->getPpereObt();
		$origine['PaysOrigine']=$this->getOIpays();
		$origine['RegionOrigine']=$this->getOIregion();
		$origine['DepartOrigine']=$this->getOIdeparte();
		$origine['InscriptionFrance']=$this->getOIinscriptionFrance();
		$origine['NumVarOnivins']=$this->getOInumVarOnivins();
		$origine['AnneeInscriptionFrance']=$this->getOIanneeInscriptionFrance();
		$origine['InscriptionEurope']=$this->getOIinscriptionEurop();
		$contents_tab=array("remarque"=>supprNull($remarque),"parente"=>supprNull($parente),"origine"=>supprNull($origine));
		return $contents_tab;
	}
	function getSelectionVariete(){
		$contents_variete=array();
		$contents_variete['codeVar']=$this->getCodeVar();
		$contents_variete['nomVar']=$this->getNomVar();
		$contents_variete['SynoMajeur']=$this->getSynoMajeur();
		$contents_variete['utilite']=$this->getUtilite();
		$contents_variete['couleurPel']=$this->getCouleurPe();
		$contents_variete['saveur']=$this->getSaveur();
		$contents_variete['pepins']=$this->getPepins();
		$contents_variete['sexe']=$this->getSexe();
		$contents_variete['paysorigine']=$this->getOIpays();
		$contents_variete['CodeEsp']=$this->getCodeEspece();
		return $contents_variete;
	}
}
?>