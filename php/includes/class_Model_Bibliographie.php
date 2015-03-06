<?php

class Bibliograhpie {

	private $CodeCit = null;
	private $CodeVar = null;
	private $Title = null;
	private $Author = null;
	private $Year = null;
	private $PagesCitation = null;
	private $VolumeCitation = null;

	private $nomAcc = null;
	private $nomVar = null;
	private $CodeAcc = null;
	private $TypeDoc = null;
	private $Edition = null;
	private $Publisher = null;
	private $PlacePublished = null;
	private $ISBN = null;
	private $Language = null;
	private $NumberOfVolumes = null;
	private $PagesDoc = null;
	private $CallNumber = null;
	private $AuteurCitation = null;
	private $NomVigneCite = null;
	
	public function getCodeCit(){return $this->CodeCit;}
	public function getCodeVar(){return $this->CodeVar;}
	public function getTitle(){return $this->Title;}
	public function getAuthor(){return $this->Author;}
	public function getYear(){return $this->Year;}
	public function getPagesCitation(){return $this->PagesCitation;}
	public function getVolumeCitation(){return $this->VolumeCitation;}
	
	public function getnomAcc(){return $this->nomAcc;}
	public function getnomVar(){return $this->nomVar;}
	public function getCodeAcc(){return $this->CodeAcc;}
	public function getTypeDoc(){return $this->TypeDoc;}
	public function getEdition(){return $this->Edition;}
	public function getPublisher(){return $this->Publisher;}
	public function getPlacePublished(){return $this->PlacePublished;}
	public function getISBN(){return $this->ISBN;}
	public function getLanguage(){return $this->Language;}
	public function getNumberOfVolumes(){return $this->NumberOfVolumes;}
	public function getPagesDoc(){return $this->PagesDoc;}
	public function getCallNumber(){return $this->CallNumber;}
	public function getAuteurCitation(){return $this->AuteurCitation;}
	public function getNomVigneCite(){return $this->NomVigneCite;}
	
	function __construct($CodeCit,$CodeVar,$Title,$Author,$Year,$PagesCitation,$VolumeCitation,$nomAcc,$nomVar,$CodeAcc,$TypeDoc,$Edition,$Publisher,$PlacePublished,$ISBN,$Language,$NumberOfVolumes,$PagesDoc,$CallNumber,$AuteurCitation,$NomVigneCite){
		$this->CodeCit = $CodeCit;
		$this->CodeVar = $CodeVar;
		$this->Title = $Title;
		$this->Author = $Author;
		$this->Year = $Year;
		$this->PagesCitation = $PagesCitation;
		$this->VolumeCitation = $VolumeCitation;
		
		$this->nomAcc = $nomAcc;
		$this->nomVar = $nomVar;
		$this->CodeAcc = $CodeAcc;
		$this->TypeDoc = $TypeDoc;
		$this->Edition = $Edition;
		$this->Publisher = $Publisher;
		$this->PlacePublished = $PlacePublished;
		$this->ISBN = $ISBN;
		$this->Language=$Language;
		$this->NumberOfVolumes=$NumberOfVolumes;
		$this->PagesDoc=$PagesDoc;
		$this->CallNumber=$CallNumber;
		$this->AuteurCitation = $AuteurCitation;
		$this->NomVigneCite=$NomVigneCite;
	}

	function getListeBibliographie(){
		$BI_Contents=array();
		$BI_Contents['CodeCit']=$this->getCodeCit();
		$BI_Contents['CodeVar']=$this->getCodeVar();
		$BI_Contents['Title']=$this->getTitle();
		$BI_Contents['Author']=$this->getAuthor();
		$BI_Contents['Year']=$this->getYear();
		$BI_Contents['PagesCitation']=$this->getPagesCitation();
		$BI_Contents['VolumeCitation']=$this->getVolumeCitation();
		return $BI_Contents;
	}
	function getFicherBibliographie(){
		$contents=array();
		$contents['Code']=$this->getCodeCit();
		$contents['nomAcc']=$this->getnomAcc();
		$contents['nomVar']=$this->getnomVar();
		$contents['CodeAcc']=$this->getCodeAcc();
		$contents['CodeVar']=$this->getCodeVar();
		$contents['TypeDoc']=$this->getTypeDoc();
		$contents['Title']=$this->getTitle();
		$contents['Author']=$this->getAuthor();
		$contents['Year']=$this->getYear();
		$contents['Edition']=$this->getEdition();
		$contents['Publisher']=$this->getPublisher();
		$contents['PlacePublished']=$this->getPlacePublished();
		$contents['ISBN']=$this->getISBN();
		$contents['Language']=$this->getLanguage();
		$contents['NumberOfVolumes']=$this->getNumberOfVolumes();
		$contents['PagesDoc']=$this->getPagesDoc();
		$contents['CallNumber']=$this->getCallNumber();
		$contents['VolumeCitation']=$this->getVolumeCitation();
		$contents['PagesCitation']=$this->getPagesCitation();
		$contents['AuteurCitation']=$this->getAuteurCitation();
		$contents['NomVigneCite']=$this->getNomVigneCite();
		return $contents;
	}
	function getSelectionBibliographie(){
		$BI_Contents=array();
		$BI_Contents['CodeCit']=$this->getCodeCit();
		$BI_Contents['CodeVar']=$this->getCodeVar();
		$BI_Contents['Title']=$this->getTitle();
		$BI_Contents['Author']=$this->getAuthor();
		$BI_Contents['Year']=$this->getYear();
		$BI_Contents['PagesCitation']=$this->getPagesCitation();
		$BI_Contents['VolumeCitation']=$this->getVolumeCitation();
		$BI_Contents['NomVar']=$this->getnomVar();
		$BI_Contents['CodeAcc']=$this->getCodeAcc();
		$BI_Contents['NomAcc']=$this->getnomAcc();
		return $BI_Contents;
	}
}
?>