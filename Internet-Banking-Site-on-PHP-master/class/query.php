<?php
class query
{
 public $str;	
 public $sorgu;
	public $veri;
	public function veri()
	{
	$this->sorgu=mysql_query($this->str);	
	
		while($veri=mysql_fetch_array($this->sorgu))
		{
		echo $this->veri[0];
		
		}
	}
}

?>