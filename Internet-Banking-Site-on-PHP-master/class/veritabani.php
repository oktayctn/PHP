<?php
class veritabani {
	public $vtAdi;
	public $vtServer;
	public $vtKullanici;
	public $vtSifre;
	public $vt;
	
	public function baglan() {
		$this->vt = mysql_connect($this->vtServer,$this->vtKullanici, $this->vtSifre);
		
		mysql_select_db($this->vtAdi, $this->vt) or die("Baglanamadi");
		mysql_query("SET NAMES 'UTF8'");
	}//public function baglan() { sonu
	
	
	public function baglantiyiKes() {
		mysql_close($this->vt);
	}//public function baglantiyiKes() { sonu
}//class veritabani { sonu
?>