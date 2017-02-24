<?php
	date_default_timezone_set('Asia/Kolkata');
	$sqldate = date('Y-m-d H:i:s');
	
	
	//{"sort-by":"status","sort-order":"asc","page":"1","count":"100"}
	function getQparameters($paramValue){
		$queryParams = array();
		$paramValue = json_decode($paramValue, true);
		if(sizeof($paramValue) > 0 && isset($paramValue["page"]) && isset($paramValue["count"])){
			$queryParams[1] = (((int)$paramValue["page"])-1)* (int)$paramValue["count"];
			$queryParams[2] = (int)$paramValue["count"];
		}else{
			$queryParams[1] = 0;
			$queryParams[2] = 99999;
		}
		return $queryParams;
	}
	
	function getOrderBy($paramValue){
		$paramValue = json_decode($paramValue, true);
		$orderBy = "";
		if(sizeof($paramValue) > 0){
			$orderBy .= " order by ". $paramValue["sort-by"] ." " . $paramValue["sort-order"];
		}
		return $orderBy; 
	}
	
	function getWhereClause($paramValue){
		$where = " where 1 ";
		$paramValue = json_decode($paramValue, true);
		$passParams = array("sort-by","sort-order","page","count");
		foreach (array_keys((array)$paramValue) as $key) {
			if(!in_array($key,$passParams)){
				$paramVal = trim($paramValue[$key]);
				if(strpos($key, 'date') !== false)
					$where .= " and $key = '$paramVal'";
				else if(strpos($key, '_id') !== false)
					$where .= " and $key = '$paramVal'";
				else
					$where .= " and $key like '%$paramVal%'";
			}
		}
		return $where;
	}
	
	function getWhereClauseWithAlias($paramValue, $aliasChar){
		$where = " where 1 ";
		$paramValue = json_decode($paramValue, true);
		$passParams = array("sort-by","sort-order","page","count");
		foreach (array_keys((array)$paramValue) as $key) {
			if(!in_array($key,$passParams)){
				$paramVal = trim($paramValue[$key]);
				if(strpos($key, 'date') !== false)
					$where .= " and $key = '$paramVal'";
				else if(strpos($key, '_id') !== false)
					$where .= " and $key = '$paramVal'";
				else
					$where .= " and $aliasChar.$key like '%$paramVal%'";
			}
		}
		return $where;
	}
?>