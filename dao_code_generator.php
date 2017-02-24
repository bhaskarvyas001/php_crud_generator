<?php 	
	//Our MySQL connection details.
	define('MYSQL_SERVER', 'localhost');
	define('MYSQL_DATABASE_NAME', 'kistyle');
	define('MYSQL_USERNAME', 'root');
	define('MYSQL_PASSWORD', 'password');
	define('CLASS_NAME', 'saloonDAO');
	 
	//Instantiate the PDO object and connect to MySQL.
	$pdo = new PDO(
	        'mysql:host=' . MYSQL_SERVER . ';dbname=' . MYSQL_DATABASE_NAME, 
	        MYSQL_USERNAME, 
	        MYSQL_PASSWORD
	);

	
	//The name of the table that we want the structure of.
	$tablesToDescribe = array();
	$alltables = $pdo->query("SHOW TABLES",PDO::FETCH_NUM);
	while($result = $alltables->fetch()){
		array_push($tablesToDescribe, $result[0]);
	}
	
	$fileData = "<?php 
	require_once 'Controller.php';
	require_once 'queriesHelper.php';
	
	class ".CLASS_NAME."  extends Controller {";
	
	foreach ($tablesToDescribe as $tableToDescribe) {
		//Query MySQL with the PDO objecy.
		//The SQL statement is: DESCRIBE [INSERT TABLE NAME]
		$statement = $pdo->query('DESCRIBE ' . $tableToDescribe);
		 
		//Fetch our result.
		$result = $statement->fetchAll(PDO::FETCH_ASSOC);
		
		/* echo "Printing for table ---> ".$tableToDescribe."</br>";
		foreach($result as $column){
		    echo $column['Field'] . ' - ' . $column['Type'], '<br>';
		}
		echo "========================="."</br>"; */
		
		$tableName = ucfirst(str_replace("tbl_","",$tableToDescribe));
		$lTableName = lcfirst(str_replace("tbl_","",$tableToDescribe));
		
		$insertElements = "";
		$updateElements = "";
		$insertQuery = "insert into $tableToDescribe (";
		$updateQuery = "update $tableToDescribe ";
		$deleteQuery = "delete from $tableToDescribe where `id` = ?";
		$selectQuery = "select * from $tableToDescribe --where-- and `isactive` = 'Y' --orderby-- limit ?,?";
		$countQuery = "select count(1) as total from $tableToDescribe --where-- and `isactive` = 'Y'";
		$selectById = "select * from $tableToDescribe  where `id` = ?";
		
		foreach ($result as $key=>$column) {
			$tempStr = $key;
			$tempStr .= "=>$";
			$tempStr .= $lTableName;
			$tempStr .= "->";
			$tempStr .= $column['Field'];
			$tempStr .= ", ";
			
			if($key > 0){
				$insertElements .= $tempStr;
				$updateElements .= $tempStr;
				
				$insertQuery .= "`".$column['Field']."`, ";
				$updateQuery .= "set `".$column['Field']."` = ?, ";
			}
		}
		
		//remove extra commas
		$insertElements = rtrim($insertElements, ", ");
		//append the where condition to the update query
		$updateElements .= sizeof($result);
		$updateElements .= "=>$";
		$updateElements .= $lTableName;
		$updateElements .= "->id"; 
		
		//update the insert query with question marks
		$insertQuery .= ") values (";
		for ($i = 0; $i < sizeof($result)-1; $i++) {
			$insertQuery .= "?, ";
		}
		$insertQuery = rtrim($insertQuery, ", ");
		$insertQuery .= ")";
		
		//update the update query with where condition
		$updateQuery = rtrim($updateQuery, ", ");
		$updateQuery .= " where `id` = ?";
		
		$fileData .= '
				

		//'.$tableName.' related
		public function get'.$tableName.'($key, $paramValue){
			$query = "'.$selectQuery.'";
			if($key == "all"){
				$query = str_replace("--orderby--",getOrderBy($paramValue),$query);
				$query = str_replace("--where--",getWhereClause($paramValue),$query);
				return $this->db->exec($query, getQparameters($paramValue));
			}else{
				$query = '.$selectById.';
				return $this->db->exec($query,array(1=>$key));
			}
		}
		
		public function get'.$tableName.'Total($key, $paramValue){
			$query = "'.$countQuery.'";
			if($key == "all"){
				$query = str_replace("--where--",getWhereClause($paramValue),$query);
				return $this->db->exec($query, getQparameters($paramValue));
			}else{
				return null;
			}
		}
		
		public function add'.$tableName.'($'.$lTableName.'){
			$query = "'.$insertQuery.'";
			$errStr = "SUCCESS";
			try{
				$this->db->exec($query,array('.$insertElements.'));
			}catch(Exception $e){
				$errStr = "Exception occurred : ".$e->getMessage()." at line ".$e->getLine();
			}
		
			$result = "{
				"message" : "$errStr"
			}";
			return $result;
		}
		
		
		public function update'.$tableName.'($'.$lTableName.'){
			$query = "'.$updateQuery.'";
			$errStr = "SUCCESS";
			try{
				$this->db->exec($query,array('.$updateElements.'));
			}catch(Exception $e){
				$errStr = "Exception occurred : ".$e->getMessage()." at line ".$e->getLine();
			}
		
			$result = "{
				"message" : "$errStr"
			}";
			return $result;
		}
						
		
		public function delete'.$tableName.'($'.$lTableName.'Id){
			$query = "'.$deleteQuery.'";
			$errStr = "SUCCESS";
			try{
				$this->db->exec($query,array(1=>$'.$lTableName.'Id));
			}catch(Exception $e){
				$errStr = "Exception occurred : ".$e->getMessage()." at line ".$e->getLine();
			}
			
			$result = "{
				"message" : "$errStr"
			}";
			return $result;
		}
			
		';
		
		$file = fopen(CLASS_NAME.".php","w");
		echo fwrite($file,$fileData);
		fclose($file);
	}
	
?>