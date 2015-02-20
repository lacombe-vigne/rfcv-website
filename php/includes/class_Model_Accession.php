<?php
include_once('bibliFonc.php');
class Accession {

	private $CodeIntro = null;
	private $NomIntro = null;
	private $nomVar = null;
	private $Partenaire = null;
	private $PaysProvenance = null;
	private $communeProvnance = null;
	private $AnneeEntree = null;
	private $CodeVar = null;
	private $CodePartenaireIntro = null;
	private $CouleurPe = null;
	private $CouleurPu = null;
	private $Pepins = null;
	private $Saveur = null;
	private $Sexe = null;
	private $Statut = null;
	private $DateEntre = null;
	private $Collecteur = null;
	private $AdressProvenance=null;
	private $SiteProvenance=null;
	private $CodePartenaire=null;
	private $UniteIntro=null;
	private $AnneeAgrement=null;
	
	
	private $ProDCollecteur=null;
	private $ProDTypeCollecteur=null;
	private $ProDcontientProvenance=null;
	private $ProDCommuneProvenance=null;
	private $ProDCodPostProvenance=null;
	private $ProDSiteProvenance=null;
	private $ProDAdresProvenance=null;
	private $ProDProprietProvenance=null;
	private $ProDParcelleProvenance=null;
	private $ProDTypeParcelleProvenance=null;
	private $ProDRangProvenance=null;
	private $ProDSoucheProvenance=null;
	private $ProDSoucheTheoriqueProvenance=null;
	private $ProDPaysProvenance=null;
	private $ProDRegionProvenance=null;
	private $ProDDepartProvenance=null;
	private $ProDLatitude=null;
	private $ProDLongitude=null;
	private $ProDAltitude=null;
	private $ProDJour=null;
	private $ProDMois=null;
	private $ProDAnnee=null;
	private $ProDCodeIntroPorvenance=null;
	private $ProDCodeEntree=null;
	private $ProDReIntroduit=null;
	private $ProDIssuTraitement=null;
	private $ProDColoneTraite=null;
	private $ProDRemarquesProvenance=null;
	
	
	private $ProACollecteur=null;
	private $ProATypeCollecteur=null;
	private $ProAContinentProvenance=null;
	private $ProACommuneProvenance=null;
	private $ProACodPostProvenance=null;
	private $ProASiteProvenance=null;
	private $ProAAdresProvenance=null;
	private $ProAProprietProvenance=null;
	private $ProAParcelleProvenance=null;
	private $ProATypeParcelleProvenance=null;
	private $ProARangProvenance=null;
	private $ProASoucheProvenance=null;
	private $ProASoucheTheoriqueProvenance=null;
	private $ProAPaysProvenance=null;
	private $ProARegionProvenance=null;
	private $ProADepartProvenance=null;
	private $ProACodeIntroProvenanceAnt=null;
	
	
	private $caracIdentification=null;
	private $caracIdenMorphologique=null;
	private $caracIdenGenetique=null;
	private $caracBibliographie=null;
	private $caracIdenAutre=null;
	private $caracVolume=null;
	private $caracPage=null;
	private $caracRemarqueAccessionName=null;
	private $caracCouleurPe=null;
	private $caracCouleurPu=null;
	private $caracSaveur=null;
	private $caracPepins=null;
	private $caracSexe=null;
	
	private $AgreNumTempCTPS=null;
	private $AgreDelegONIVINS=null;
	private $AgreAgrement=null;
	private $AgreDepartAgrementClone=null;
	private $AgreAnneeAgrement=null;
	private $AgreSiteAgrementClone=null;
	private $AgreAnneeNonCertifiable=null;
	private $AgreLieuDepotMatInitial=null;
	private $AgreSurfMulti=null;
	private $AgreNomPartenaire=null;
	private $AgreNomPartenaire2=null;
	private $AgreFamilleSanitaire=null;
	private $AgreAgrementCTPS=null;
	private $AgreNumCloneCTPS=null;
	
	private $remarquesMaintienEnCollection=null;
	private $remarquesRestrictionDiffusion=null;
	private $remarquesremarquesIntro=null;
	
	public function getCodeIntro(){return $this->CodeIntro;}
	public function getNomIntro(){return $this->NomIntro;}
	public function getnomVar(){return $this->nomVar;}
	public function getPartenaire(){return $this->Partenaire;}
	public function getPaysProvenance(){return $this->PaysProvenance;}
	public function getcommuneProvnance(){return $this->communeProvnance;}
	public function getAnneeEntree(){return $this->AnneeEntree;}
	public function getCodeVar(){return $this->CodeVar;}
	public function getCodePartenaireIntro(){return $this->CodePartenaireIntro;}
	public function getCouleurPe(){return $this->CouleurPe;}
	public function getCouleurPu(){return $this->CouleurPu;}
	public function getPepins(){return $this->Pepins;}
	public function getSaveur(){return $this->Saveur;}
	public function getSexe(){return $this->Sexe;}
	public function getStatut(){return $this->Statut;}
	public function getDateEntre(){return $this->DateEntre;}
	public function getCollecteur(){return $this->Collecteur;}
	public function getAdressProvenance(){return $this->AdressProvenance;}
	public function getSiteProvenance(){return $this->SiteProvenance;}
	public function getCodePartenaire(){return $this->CodePartenaire;}
	public function getUniteIntro(){return $this->UniteIntro;}
	public function getAnneeAgrement(){return $this->AnneeAgrement;}
	
	public function getProDCollecteur(){return $this->ProDCollecteur;}
	public function getProDTypeCollecteur(){return $this->ProDTypeCollecteur;}
	public function getProDcontientProvenance(){return $this->ProDcontientProvenance;}
	public function getProDCommuneProvenance(){return $this->ProDCommuneProvenance;}
	public function getProDCodPostProvenance(){return $this->ProDCodPostProvenance;}
	public function getProDSiteProvenance(){return $this->ProDSiteProvenance;}
	public function getProDAdresProvenance(){return $this->ProDAdresProvenance;}
	public function getProDProprietProvenance(){return $this->ProDProprietProvenance;}
	public function getProDParcelleProvenance(){return $this->ProDParcelleProvenance;}
	public function getProDTypeParcelleProvenance(){return $this->ProDTypeParcelleProvenance;}
	public function getProDRangProvenance(){return $this->ProDRangProvenance;}
	public function getProDSoucheProvenance(){return $this->ProDSoucheProvenance;}
	public function getProDSoucheTheoriqueProvenance(){return $this->ProDSoucheTheoriqueProvenance;}
	public function getProDPaysProvenance(){return $this->ProDPaysProvenance;}
	public function getProDRegionProvenance(){return $this->ProDRegionProvenance;}
	public function getProDDepartProvenance(){return $this->ProDDepartProvenance;}
	public function getProDLatitude(){return $this->ProDLatitude;}
	public function getProDLongitude(){return $this->ProDLongitude;}
	public function getProDAltitude(){return $this->ProDAltitude;}
	public function getProDJour(){return $this->ProDJour;}
	public function getProDMois(){return $this->ProDMois;}
	public function getProDAnnee(){return $this->ProDAnnee;}
	public function getProDCodeIntroPorvenance(){return $this->ProDCodeIntroPorvenance;}
	public function getProDCodeEntree(){return $this->ProDCodeEntree;}
	public function getProDReIntroduit(){return $this->ProDReIntroduit;}
	public function getProDIssuTraitement(){return $this->ProDIssuTraitement;}
	public function getProDColoneTraite(){return $this->ProDColoneTraite;}
	public function getProDRemarquesProvenance(){return $this->ProDRemarquesProvenance;}
		
	public function getProACollecteur(){return $this->ProACollecteur;}
	public function getProATypeCollecteur(){return $this->ProATypeCollecteur;}
	public function getProAContinentProvenance(){return $this->ProAContinentProvenance;}
	public function getProACommuneProvenance(){return $this->ProACommuneProvenance;}
	public function getProACodPostProvenance(){return $this->ProACodPostProvenance;}
	public function getProASiteProvenance(){return $this->ProASiteProvenance;}
	public function getProAAdresProvenance(){return $this->ProAAdresProvenance;}
	public function getProAProprietProvenance(){return $this->ProAProprietProvenance;}
	public function getProAParcelleProvenance(){return $this->ProAParcelleProvenance;}
	public function getProATypeParcelleProvenance(){return $this->ProATypeParcelleProvenance;}
	public function getProARangProvenance(){return $this->ProARangProvenance;}
	public function getProASoucheProvenance(){return $this->ProASoucheProvenance;}
	public function getProASoucheTheoriqueProvenance(){return $this->ProASoucheTheoriqueProvenance;}
	public function getProAPaysProvenance(){return $this->ProAPaysProvenance;}
	public function getProARegionProvenance(){return $this->ProARegionProvenance;}
	public function getProADepartProvenance(){return $this->ProADepartProvenance;}
	public function getProACodeIntroProvenanceAnt(){return $this->ProACodeIntroProvenanceAnt;}

	public function getcaracIdentification(){return $this->caracIdentification;}
	public function getcaracIdenMorphologique(){return $this->caracIdenMorphologique;}
	public function getcaracIdenGenetique(){return $this->caracIdenGenetique;}
	public function getcaracBibliographie(){return $this->caracBibliographie;}
	public function getcaracIdenAutre(){return $this->caracIdenAutre;}
	public function getcaracVolume(){return $this->caracVolume;}
	public function getcaracPage(){return $this->caracPage;}
	public function getcaracRemarqueAccessionName(){return $this->caracRemarqueAccessionName;}
	public function getcaracCouleurPe(){return $this->caracCouleurPe;}
	public function getcaracCouleurPu(){return $this->caracCouleurPu;}
	public function getcaracSaveur(){return $this->caracSaveur;}
	public function getcaracPepins(){return $this->caracPepins;}
	public function getcaracSexe(){return $this->caracSexe;}
	
	public function getAgreNumTempCTPS(){return $this->AgreNumTempCTPS;}
	public function getAgreDelegONIVINS(){return $this->AgreDelegONIVINS;}
	public function getAgreAgrement(){return $this->AgreAgrement;}
	public function getAgreDepartAgrementClone(){return $this->AgreDepartAgrementClone;}
	public function getAgreAnneeAgrement(){return $this->AgreAnneeAgrement;}
	public function getAgreSiteAgrementClone(){return $this->AgreSiteAgrementClone;}
	public function getAgreAnneeNonCertifiable(){return $this->AgreAnneeNonCertifiable;}
	public function getAgreLieuDepotMatInitial(){return $this->AgreLieuDepotMatInitial;}
	public function getAgreSurfMulti(){return $this->AgreSurfMulti;}
	public function getAgreNomPartenaire(){return $this->AgreNomPartenaire;}
	public function getAgreNomPartenaire2(){return $this->AgreNomPartenaire2;}
	public function getAgreFamilleSanitaire(){return $this->AgreFamilleSanitaire;}
	public function getAgreAgrementCTPS(){return $this->AgreAgrementCTPS;}
	public function getAgreNumCloneCTPS(){return $this->AgreNumCloneCTPS;}
	
	public function getremarquesMaintienEnCollection(){return $this->remarquesMaintienEnCollection;}
	public function getremarquesRestrictionDiffusion(){return $this->remarquesRestrictionDiffusion;}
	public function getremarquesremarquesIntro(){return $this->remarquesremarquesIntro;}
	
	function __construct($CodeIntro,$NomIntro,$nomVar,$Partenaire,$PaysProvenance,$communeProvnance,$AnneeEntree,$CodeVar,$CodePartenaireIntro,$CouleurPe,$CouleurPu,$Pepins,$Saveur,$Sexe,$Statut,$DateEntre,$Collecteur,$AdressProvenance,$SiteProvenance,$CodePartenaire,$UniteIntro,$AnneeAgrement,$ProDCollecteur,$ProDTypeCollecteur,$ProDcontientProvenance,$ProDCommuneProvenance,$ProDCodPostProvenance,$ProDSiteProvenance,$ProDAdresProvenance,$ProDProprietProvenance,$ProDParcelleProvenance,$ProDTypeParcelleProvenance,$ProDRangProvenance,$ProDSoucheProvenance,$ProDSoucheTheoriqueProvenance,$ProDPaysProvenance,$ProDRegionProvenance,$ProDDepartProvenance,$ProDLatitude,$ProDLongitude,$ProDAltitude,$ProDJour,$ProDMois,$ProDAnnee,$ProDCodeIntroPorvenance,$ProDCodeEntree,$ProDReIntroduit,$ProDIssuTraitement,$ProDColoneTraite,$ProDRemarquesProvenance,$ProACollecteur,$ProATypeCollecteur,$ProAContinentProvenance,$ProACommuneProvenance,$ProACodPostProvenance,$ProASiteProvenance,$ProAAdresProvenance,$ProAProprietProvenance,$ProAParcelleProvenance,$ProATypeParcelleProvenance,$ProARangProvenance,$ProASoucheProvenance,$ProASoucheTheoriqueProvenance,$ProAPaysProvenance,$ProARegionProvenance,$ProADepartProvenance,$ProACodeIntroProvenanceAnt,$caracIdentification,$caracIdenMorphologique,$caracIdenGenetique,$caracBibliographie,$caracIdenAutre,$caracVolume,$caracPage,$caracRemarqueAccessionName,$caracCouleurPe,$caracCouleurPu,$caracSaveur,$caracPepins,$caracSexe,$AgreNumTempCTPS,$AgreDelegONIVINS,$AgreAgrement,$AgreDepartAgrementClone,$AgreAnneeAgrement,$AgreSiteAgrementClone,$AgreAnneeNonCertifiable,$AgreLieuDepotMatInitial,$AgreSurfMulti,$AgreNomPartenaire,$AgreNomPartenaire2,$AgreFamilleSanitaire,$AgreAgrementCTPS,$AgreNumCloneCTPS,$remarquesMaintienEnCollection,$remarquesRestrictionDiffusion,$remarquesremarquesIntro){
		$this->CodeIntro = $CodeIntro;
		$this->NomIntro = $NomIntro;
		$this->nomVar = $nomVar;
		$this->Partenaire = $Partenaire;
		$this->PaysProvenance = $PaysProvenance;
		$this->communeProvnance = $communeProvnance;
		$this->AnneeEntree = $AnneeEntree;
		$this->CodeVar = $CodeVar;
		$this->CodePartenaireIntro = $CodePartenaireIntro;
		$this->CouleurPe = $CouleurPe;
		$this->CouleurPu = $CouleurPu;
		$this->Pepins = $Pepins;
		$this->Saveur = $Saveur;
		$this->Sexe = $Sexe;
		$this->Statut = $Statut;
		$this->DateEntre = $DateEntre;
		$this->Collecteur = $Collecteur;
		$this->AdressProvenance = $AdressProvenance;
		$this->SiteProvenance=$SiteProvenance;
		$this->CodePartenaire=$CodePartenaire;
		$this->UniteIntro=$UniteIntro;
		$this->AnneeAgrement=$AnneeAgrement;
		
		$this->ProDCollecteur=$ProDCollecteur;
		$this->ProDTypeCollecteur=$ProDTypeCollecteur;
		$this->ProDcontientProvenance=$ProDcontientProvenance;
		$this->ProDCommuneProvenance=$ProDCommuneProvenance;
		$this->ProDCodPostProvenance=$ProDCodPostProvenance;
		$this->ProDSiteProvenance=$ProDSiteProvenance;
		$this->ProDAdresProvenance=$ProDAdresProvenance;
		$this->ProDProprietProvenance=$ProDProprietProvenance;
		$this->ProDParcelleProvenance=$ProDParcelleProvenance;
		$this->ProDTypeParcelleProvenance=$ProDTypeParcelleProvenance;
		$this->ProDRangProvenance=$ProDRangProvenance;
		$this->ProDSoucheProvenance=$ProDSoucheProvenance;
		$this->ProDSoucheTheoriqueProvenance=$ProDSoucheTheoriqueProvenance;
		$this->ProDPaysProvenance=$ProDPaysProvenance;
		$this->ProDRegionProvenance=$ProDRegionProvenance;
		$this->ProDDepartProvenance=$ProDDepartProvenance;
		$this->ProDLatitude=$ProDLatitude;
		$this->ProDLongitude=$ProDLongitude;
		$this->ProDAltitude=$ProDAltitude;
		$this->ProDJour=$ProDJour;
		$this->ProDMois=$ProDMois;
		$this->ProDAnnee=$ProDAnnee;
		$this->ProDCodeIntroPorvenance=$ProDCodeIntroPorvenance;
		$this->ProDCodeEntree=$ProDCodeEntree;
		$this->ProDReIntroduit=$ProDReIntroduit;
		$this->ProDIssuTraitement=$ProDIssuTraitement;
		$this->ProDColoneTraite=$ProDColoneTraite;
		$this->ProDRemarquesProvenance=$ProDRemarquesProvenance;
		
		$this->ProACollecteur=$ProACollecteur;
		$this->ProATypeCollecteur=$ProATypeCollecteur;
		$this->ProAContinentProvenance=$ProAContinentProvenance;
		$this->ProACommuneProvenance=$ProACommuneProvenance;
		$this->ProACodPostProvenance=$ProACodPostProvenance;
		$this->ProASiteProvenance=$ProASiteProvenance;
		$this->ProAAdresProvenance=$ProAAdresProvenance;
		$this->ProAProprietProvenance=$ProAProprietProvenance;
		$this->ProAParcelleProvenance=$ProAParcelleProvenance;
		$this->ProATypeParcelleProvenance=$ProATypeParcelleProvenance;
		$this->ProARangProvenance=$ProARangProvenance;
		$this->ProASoucheProvenance=$ProASoucheProvenance;
		$this->ProASoucheTheoriqueProvenance=$ProASoucheTheoriqueProvenance;
		$this->ProAPaysProvenance=$ProAPaysProvenance;
		$this->ProARegionProvenance=$ProARegionProvenance;
		$this->ProADepartProvenance=$ProADepartProvenance;
		$this->ProACodeIntroProvenanceAnt=$ProACodeIntroProvenanceAnt;
		
		$this->caracIdentification=$caracIdentification;
		$this->caracIdenMorphologique=$caracIdenMorphologique;
		$this->caracIdenGenetique=$caracIdenGenetique;
		$this->caracBibliographie=$caracBibliographie;
		$this->caracIdenAutre=$caracIdenAutre;
		$this->caracVolume=$caracVolume;
		$this->caracPage=$caracPage;
		$this->caracRemarqueAccessionName=$caracRemarqueAccessionName;
		$this->caracCouleurPe=$caracCouleurPe;
		$this->caracCouleurPu=$caracCouleurPu;
		$this->caracSaveur=$caracSaveur;
		$this->caracPepins=$caracPepins;
		$this->caracSexe=$caracSexe;
		
		$this->AgreNumTempCTPS=$AgreNumTempCTPS;
		$this->AgreDelegONIVINS=$AgreDelegONIVINS;
		$this->AgreAgrement=$AgreAgrement;
		$this->AgreDepartAgrementClone=$AgreDepartAgrementClone;
		$this->AgreAnneeAgrement=$AgreAnneeAgrement;
		$this->AgreSiteAgrementClone=$AgreSiteAgrementClone;
		$this->AgreAnneeNonCertifiable=$AgreAnneeNonCertifiable;
		$this->AgreLieuDepotMatInitial=$AgreLieuDepotMatInitial;
		$this->AgreSurfMulti=$AgreSurfMulti;
		$this->AgreNomPartenaire=$AgreNomPartenaire;
		$this->AgreNomPartenaire2=$AgreNomPartenaire2;
		$this->AgreFamilleSanitaire=$AgreFamilleSanitaire;
		$this->AgreAgrementCTPS=$AgreAgrementCTPS;
		$this->AgreNumCloneCTPS=$AgreNumCloneCTPS;
		
		$this->remarquesMaintienEnCollection=$remarquesMaintienEnCollection;
		$this->remarquesRestrictionDiffusion=$remarquesRestrictionDiffusion;
		$this->remarquesremarquesIntro=$remarquesremarquesIntro;
	}
	
	function getListeAccession(){
		$contents_accession=array();
		$contents_accession['codeIntro']=$this->getCodeIntro();
		$contents_accession['NomIntro']=$this->getNomIntro();
		$contents_accession['nomVar']=$this->getnomVar();
		$contents_accession['Partenaire']=$this->getPartenaire();
		$contents_accession['PaysProvenance']=$this->getPaysProvenance();
		$contents_accession['communeProvenance']=$this->getcommuneProvnance();
		$contents_accession['AnneeEntree']=$this->getAnneeEntree();
		return $contents_accession;
	}
	function getFicherAccession(){
		$contents=array();
		$contents['CodeIntro']=$this->getCodeIntro();
		$contents['NomIntro']=$this->getNomIntro();
		$contents['Collecteur']=$this->getCollecteur();
		$contents['AdresProvenance']=$this->getAdressProvenance();
		$contents['CommuneProvenance']=$this->getcommuneProvnance();
		$contents['SiteProvenance']=$this->getSiteProvenance();
		$contents['DateEntre']=$this->getDateEntre();
		$contents['Partenaire']=$this->getPartenaire();
		$contents['CodePartenaire']=$this->getCodePartenaire();
		$contents['NomVar']=$this->getnomVar();
		$contents['CodeVar']=$this->getCodeVar();
		$contents['PayP']=$this->getPaysProvenance();
		$contents['CouleurPe']=$this->getCouleurPe();
		$contents['CouleurPu']=$this->getCouleurPu();
		$contents['Saveur']=$this->getSaveur();
		$contents['Pepins']=$this->getPepins();
		$contents['Sexe']=$this->getSexe();
		$contents['Statut']=$this->getStatut();
		$contents['UniteIntro']=$this->getUniteIntro();
		$contents['AnneeAgrement']=$this->getAnneeAgrement();
		$contents['CodeIntroPartenaire']=$this->getCodePartenaireIntro();
		return $contents;
	}
	function getFicherAccessionTab(){
		$ProD=array();
		$ProA=array();
		$carac=array();
		$Agre=array();
		$remarques=array();
		
		$ProD['Collecteur']=$this->getProDCollecteur();
		$ProD['TypeCollecteur']=$this->getProDTypeCollecteur();
		$ProD['ContinentProvenance']=$this->getProDcontientProvenance();
		$ProD['CommuneProvenance']=$this->getProDCommuneProvenance();
		$ProD['CodPostProvenance']=$this->getProDCodPostProvenance();
		$ProD['SiteProvenance']=$this->getProDSiteProvenance();
		$ProD['AdresProvenance']=$this->getProDAdresProvenance();
		$ProD['ProprietProvenance']=$this->getProDProprietProvenance();
		$ProD['ParcelleProvenance']=$this->getProDParcelleProvenance();
		$ProD['TypeParcelleProvenance']=$this->getProDTypeParcelleProvenance();
		$ProD['RangProvenance']=$this->getProDRangProvenance();
		$ProD['SoucheProvenance']=$this->getProDSoucheProvenance();
		$ProD['SoucheTheoriqueProvenance']=$this->getProDSoucheTheoriqueProvenance();
		$ProD['PaysProvenance']=$this->getProDPaysProvenance();
		$ProD['RegionProvenance']=$this->getProDRegionProvenance();
		$ProD['DepartProvenance']=$this->getProDDepartProvenance();
		$ProD['Latitude']=$this->getProDLatitude();
		$ProD['Longitude']=$this->getProDLongitude();
		$ProD['Altitude']=$this->getProDAltitude();
		$ProD['Jour']=$this->getProDJour();
		$ProD['Mois']=$this->getProDMois();
		$ProD['Annee']=$this->getProDAnnee();
		$ProD['CodeIntroPorvenance']=$this->getProDCodeIntroPorvenance();
		$ProD['CodeEntree']=$this->getProDCodeEntree();
		$ProD['ReIntroduit']=$this->getProDReIntroduit();
		$ProD['IssuTraitement']=$this->getProDIssuTraitement();
		$ProD['ColoneTraite']=$this->getProDColoneTraite();
		$ProD['RemarquesProvenance']=$this->getProDRemarquesProvenance();
		
		$ProA['Collecteur']=$this->getProACollecteur();
		$ProA['TypeCollecteur']=$this->getProATypeCollecteur();
		$ProA['ContinentProvenance']=$this->getProAContinentProvenance();
		$ProA['CommuneProvenance']=$this->getProACommuneProvenance();
		$ProA['CodPostProvenance']=$this->getProACodPostProvenance();
		$ProA['SiteProvenance']=$this->getProASiteProvenance();
		$ProA['AdresProvenance']=$this->getProAAdresProvenance();
		$ProA['ProprietProvenance']=$this->getProAProprietProvenance();
		$ProA['ParcelleProvenance']=$this->getProAParcelleProvenance();
		$ProA['TypeParcelleProvenance']=$this->getProATypeParcelleProvenance();
		$ProA['RangProvenance']=$this->getProARangProvenance();
		$ProA['SoucheProvenance']=$this->getProASoucheProvenance();
		$ProA['SoucheTheoriqueProvenance']=$this->getProASoucheTheoriqueProvenance();
		$ProA['PaysProvenance']=$this->getProAPaysProvenance();
		$ProA['RegionProvenance']=$this->getProARegionProvenance();
		$ProA['DepartProvenance']=$this->getProADepartProvenance();
		$ProA['CodeIntroProvenanceAnt']=$this->getProACodeIntroProvenanceAnt();
		
		$carac['Identification']=$this->getcaracIdentification();
		$carac['IdenMorphologique']=$this->getcaracIdenMorphologique();
		$carac['IdenGenetique']=$this->getcaracIdenGenetique();
		$carac['Bibliographie']=$this->getcaracBibliographie();
		$carac['IdenAutre']=$this->getcaracIdenAutre();
		$carac['Volume']=$this->getcaracVolume();
		$carac['Page']=$this->getcaracPage();
		$carac['RemarqueAccessionName']=$this->getcaracRemarqueAccessionName();
		$carac['CouleurPe']=$this->getcaracCouleurPe();
		$carac['CouleurPu']=$this->getcaracCouleurPu();
		$carac['Saveur']=$this->getcaracSaveur();
		$carac['Pepins']=$this->getcaracPepins();
		$carac['Sexe']=$this->getcaracSexe();
		
		$Agre['NumTempCTPS']=$this->getAgreNumTempCTPS();
		$Agre['DelegONIVINS']=$this->getAgreDelegONIVINS();
		$Agre['Agrement']=$this->getAgreAgrement();
		$Agre['DepartAgrementClone']=$this->getAgreDepartAgrementClone();
		$Agre['AnneeAgrement']=$this->getAgreAnneeAgrement();
		$Agre['SiteAgrementClone']=$this->getAgreSiteAgrementClone();
		$Agre['AnneeNonCertifiable']=$this->getAgreAnneeNonCertifiable();
		$Agre['LieuDepotMatInitial']=$this->getAgreLieuDepotMatInitial();
		$Agre['SurfMulti']=$this->getAgreSurfMulti();
		$Agre['NomPartenaire']=$this->getAgreNomPartenaire();
		$Agre['NomPartenaire2']=$this->getAgreNomPartenaire2();
		$Agre['FamilleSanitaire']=$this->getAgreFamilleSanitaire();
		$Agre['AgrementCTPS']=$this->getAgreAgrementCTPS();
		$Agre['NumCloneCTPS']=$this->getAgreNumCloneCTPS();
		
		
		$remarques['MaintienEnCollection']=$this->getremarquesMaintienEnCollection();
		$remarques['RestrictionDiffusion']=$this->getremarquesRestrictionDiffusion();
		$remarques['remarquesIntro']=$this->getremarquesremarquesIntro();
		$contents_tab=array('ProD'=>supprNull($ProD),'ProA'=>supprNull($ProA),'Agre'=>supprNull($Agre),'carac'=>supprNull($carac),'remarques'=>supprNull($remarques));
		return $contents_tab;
	}
	function getSelectionAccession(){
		$contents_accession=array();
		$contents_accession['codeIntro']=$this->getCodeIntro();
		$contents_accession['NomIntro']=$this->getNomIntro();
		$contents_accession['nomVar']=$this->getnomVar();
		$contents_accession['Partenaire']=$this->getPartenaire();
		$contents_accession['PaysProvenance']=$this->getPaysProvenance();
		$contents_accession['communeProvenance']=$this->getcommuneProvnance();
		$contents_accession['AnneeEntree']=$this->getAnneeEntree();
		$contents_accession['CodeVar']=$this->getCodeVar();
		return $contents_accession;
	}
}
?>