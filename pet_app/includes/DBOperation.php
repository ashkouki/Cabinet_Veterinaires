<?php

class DBOperation
{
	
	private $con;

	function __construct()
	{
		include_once("../database/db.php");
		$db = new Database();
		$this->con = $db->connect();
	}



public function addclient($Nom_c,$Prenom_c,$tel,$adresse,$Date_suv,$type_a,$nom_a,$age,$jma,$couleur,$date_v,$sexe){
	
		$pre_stmt = $this->con->prepare('INSERT INTO clients (nom,prenom,tel,Adresse,Date_Suivi) VALUES (?,?,?,?,?)');		
		$result=$pre_stmt->execute([$Nom_c,$Prenom_c,$tel,$adresse,$Date_suv]); //or die($this->con->error);

			$pre_stmt = $this->con->prepare('INSERT INTO animaux (nom,prenom,tel,Adresse,Date_Suivi) VALUES (?,?,?,?,?)');		
		$result=$pre_stmt->execute([$Nom_c,$Prenom_c,$tel,$adresse,$Date_suv]); //or die($this->con->error);
		
		$invoice_no = $this->con->lastInsertID();
		for ($i=0; $i < count($nom_a) ; $i++) {
			$insert_product = $this->con->prepare("INSERT INTO `animaux`(`id_client`, `type_a`, `nom_a`,`age`,`jma`,`couleur`,`Date_naissance`,`sexe`) VALUES (?,?,?,?,?,?,?,?)");
				$insert_product->execute([$invoice_no,$type_a[$i],$nom_a[$i],$age[$i],$jma[$i],$couleur[$i],$date_v[$i],$sexe[$i]]);
				}
	 return $invoice_no;
	
	
	}



	public function addvacc($type_a,$date_Vac,$date_Vaccin,$tels,$Motif_Vaccin){
		$status = 0;
		$pre_stmt = $this->con->prepare('INSERT INTO vaccination(id_animaux,date_Vaccin,prochain_vaccin,tel,Motif_Vaccin,status) VALUES (?,?,?,?,?,?)');		
		$result = $pre_stmt->execute([$type_a,$date_Vac,$date_Vaccin,$tels,$Motif_Vaccin,$status]);// or die($this->con->error);
		if ($result>0) return "ok";
		else return "no";
	}
	
		public function addcons($type_a,$date_Con,$Motif_Con,$tels,$Retour_Con){
		$status = 0;
		$pre_stmt = $this->con->prepare('INSERT INTO consultation(id_animaux,date_consultation,Motif_consultation,tel,Retour_Con) VALUES (?,?,?,?,?)');		
		$result = $pre_stmt->execute([$type_a,$date_Con,$Motif_Con,$tels,$Retour_Con]);// or die($this->con->error);
		if ($result>0) return "ok";
		else return "no";
	}

	public function addtype($Type_an){
		$status = 1;
		$pre_stmt = $this->con->prepare('INSERT INTO type_animals(type) VALUES (?)');		
		$result = $pre_stmt->execute([$Type_an]);// or die($this->con->error);
		if ($result>0) return "ok";
		else return "no";
	}



	public function getAgent2($mat){
		$pre_stmt = $this->con->prepare("SELECT * FROM clients where tel=".$mat);
		$pre_stmt->execute();// or die($agent_name->con->error);
		$rows = $pre_stmt->fetchAll(PDO::FETCH_ASSOC);
		if ($rows>0) return $rows;
		else return "no";
	}


	public function getanimauxByid($mat){
		$pre_stmt = $this->con->prepare("SELECT * FROM pets where tel=".$mat);
		$pre_stmt->execute();// or die($agent_name->con->error);
		$rows = $pre_stmt->fetchAll(PDO::FETCH_ASSOC);
		if ($rows>0) return $rows;
		else return "no";
	}

}	


?>