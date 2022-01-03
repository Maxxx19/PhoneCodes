<?php 

namespace Classes;

class Table
{
	private $table;
	function get_table($data){
		$this->table="<table border=\"1\">";
		$this->table.="<tr>";
		$this->table.="<th> Customer ID </th>";
		$this->table.="<th> Same continent calls count </th>";
		$this->table.="<th> Same continent calls duration </th>";
		$this->table.="<th> All calls count </th>";
		$this->table.="<th> All calls duration </th>";
		$this->table.="<tr>";

		foreach($data as $key=> $val){
					$this->table.="<tr>";
 			$this->table.="<td> $key </td>";
 	foreach($val as $row){
 		//foreach($row as $value){
 			$this->table.="<td> $row </td>";
 		//}
 	}
 }
 			$this->table.="</tr>";
	$this->table.="</table>";
		return $this->table;
}
}

