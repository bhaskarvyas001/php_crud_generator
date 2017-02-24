<?php 
	require_once 'Controller.php';
	require_once 'queriesHelper.php';
	
	class saloonDAO  extends Controller {
				

		//Branches related
		public function getBranches($key, $paramValue){
			$query = "select * from tbl_branches --where-- and `isactive` = 'Y' --orderby-- limit ?,?";
			if($key == "all"){
				$query = str_replace("--orderby--",getOrderBy($paramValue),$query);
				$query = str_replace("--where--",getWhereClause($paramValue),$query);
				return $this->db->exec($query, getQparameters($paramValue));
			}else{
				$query = select * from tbl_branches  where `id` = ?;
				return $this->db->exec($query,array(1=>$key));
			}
		}
		
		public function getBranchesTotal($key, $paramValue){
			$query = "select count(1) as total from tbl_branches --where-- and `isactive` = 'Y'";
			if($key == "all"){
				$query = str_replace("--where--",getWhereClause($paramValue),$query);
				return $this->db->exec($query, getQparameters($paramValue));
			}else{
				return null;
			}
		}
		
		public function addBranches($branches){
			$query = "insert into tbl_branches (`branch_code`, `branch_name`, `address`, `email`, `contact`, `alt_contact`, `latitude`, `longitude`, `isactive`, ) values (?, ?, ?, ?, ?, ?, ?, ?, ?)";
			$errStr = "SUCCESS";
			try{
				$this->db->exec($query,array(1=>$branches->branch_code, 2=>$branches->branch_name, 3=>$branches->address, 4=>$branches->email, 5=>$branches->contact, 6=>$branches->alt_contact, 7=>$branches->latitude, 8=>$branches->longitude, 9=>$branches->isactive));
			}catch(Exception $e){
				$errStr = "Exception occurred : ".$e->getMessage()." at line ".$e->getLine();
			}
		
			$result = "{
				"message" : "$errStr"
			}";
			return $result;
		}
		
		
		public function updateBranches($branches){
			$query = "update tbl_branches set `branch_code` = ?, set `branch_name` = ?, set `address` = ?, set `email` = ?, set `contact` = ?, set `alt_contact` = ?, set `latitude` = ?, set `longitude` = ?, set `isactive` = ? where `id` = ?";
			$errStr = "SUCCESS";
			try{
				$this->db->exec($query,array(1=>$branches->branch_code, 2=>$branches->branch_name, 3=>$branches->address, 4=>$branches->email, 5=>$branches->contact, 6=>$branches->alt_contact, 7=>$branches->latitude, 8=>$branches->longitude, 9=>$branches->isactive, 10=>$branches->id));
			}catch(Exception $e){
				$errStr = "Exception occurred : ".$e->getMessage()." at line ".$e->getLine();
			}
		
			$result = "{
				"message" : "$errStr"
			}";
			return $result;
		}
						
		
		public function deleteBranches($branchesId){
			$query = "delete from tbl_branches where `id` = ?";
			$errStr = "SUCCESS";
			try{
				$this->db->exec($query,array(1=>$branchesId));
			}catch(Exception $e){
				$errStr = "Exception occurred : ".$e->getMessage()." at line ".$e->getLine();
			}
			
			$result = "{
				"message" : "$errStr"
			}";
			return $result;
		}
			
		
				

		//Brands related
		public function getBrands($key, $paramValue){
			$query = "select * from tbl_brands --where-- and `isactive` = 'Y' --orderby-- limit ?,?";
			if($key == "all"){
				$query = str_replace("--orderby--",getOrderBy($paramValue),$query);
				$query = str_replace("--where--",getWhereClause($paramValue),$query);
				return $this->db->exec($query, getQparameters($paramValue));
			}else{
				$query = select * from tbl_brands  where `id` = ?;
				return $this->db->exec($query,array(1=>$key));
			}
		}
		
		public function getBrandsTotal($key, $paramValue){
			$query = "select count(1) as total from tbl_brands --where-- and `isactive` = 'Y'";
			if($key == "all"){
				$query = str_replace("--where--",getWhereClause($paramValue),$query);
				return $this->db->exec($query, getQparameters($paramValue));
			}else{
				return null;
			}
		}
		
		public function addBrands($brands){
			$query = "insert into tbl_brands (`name`, `isactive`, ) values (?, ?)";
			$errStr = "SUCCESS";
			try{
				$this->db->exec($query,array(1=>$brands->name, 2=>$brands->isactive));
			}catch(Exception $e){
				$errStr = "Exception occurred : ".$e->getMessage()." at line ".$e->getLine();
			}
		
			$result = "{
				"message" : "$errStr"
			}";
			return $result;
		}
		
		
		public function updateBrands($brands){
			$query = "update tbl_brands set `name` = ?, set `isactive` = ? where `id` = ?";
			$errStr = "SUCCESS";
			try{
				$this->db->exec($query,array(1=>$brands->name, 2=>$brands->isactive, 3=>$brands->id));
			}catch(Exception $e){
				$errStr = "Exception occurred : ".$e->getMessage()." at line ".$e->getLine();
			}
		
			$result = "{
				"message" : "$errStr"
			}";
			return $result;
		}
						
		
		public function deleteBrands($brandsId){
			$query = "delete from tbl_brands where `id` = ?";
			$errStr = "SUCCESS";
			try{
				$this->db->exec($query,array(1=>$brandsId));
			}catch(Exception $e){
				$errStr = "Exception occurred : ".$e->getMessage()." at line ".$e->getLine();
			}
			
			$result = "{
				"message" : "$errStr"
			}";
			return $result;
		}
			
		
				

		//Employees related
		public function getEmployees($key, $paramValue){
			$query = "select * from tbl_employees --where-- and `isactive` = 'Y' --orderby-- limit ?,?";
			if($key == "all"){
				$query = str_replace("--orderby--",getOrderBy($paramValue),$query);
				$query = str_replace("--where--",getWhereClause($paramValue),$query);
				return $this->db->exec($query, getQparameters($paramValue));
			}else{
				$query = select * from tbl_employees  where `id` = ?;
				return $this->db->exec($query,array(1=>$key));
			}
		}
		
		public function getEmployeesTotal($key, $paramValue){
			$query = "select count(1) as total from tbl_employees --where-- and `isactive` = 'Y'";
			if($key == "all"){
				$query = str_replace("--where--",getWhereClause($paramValue),$query);
				return $this->db->exec($query, getQparameters($paramValue));
			}else{
				return null;
			}
		}
		
		public function addEmployees($employees){
			$query = "insert into tbl_employees (`name`, `gender`, `branch_id`, `contact`, `email`, `address`, `comission`, `comission_type`, `role`, `isactive`, ) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
			$errStr = "SUCCESS";
			try{
				$this->db->exec($query,array(1=>$employees->name, 2=>$employees->gender, 3=>$employees->branch_id, 4=>$employees->contact, 5=>$employees->email, 6=>$employees->address, 7=>$employees->comission, 8=>$employees->comission_type, 9=>$employees->role, 10=>$employees->isactive));
			}catch(Exception $e){
				$errStr = "Exception occurred : ".$e->getMessage()." at line ".$e->getLine();
			}
		
			$result = "{
				"message" : "$errStr"
			}";
			return $result;
		}
		
		
		public function updateEmployees($employees){
			$query = "update tbl_employees set `name` = ?, set `gender` = ?, set `branch_id` = ?, set `contact` = ?, set `email` = ?, set `address` = ?, set `comission` = ?, set `comission_type` = ?, set `role` = ?, set `isactive` = ? where `id` = ?";
			$errStr = "SUCCESS";
			try{
				$this->db->exec($query,array(1=>$employees->name, 2=>$employees->gender, 3=>$employees->branch_id, 4=>$employees->contact, 5=>$employees->email, 6=>$employees->address, 7=>$employees->comission, 8=>$employees->comission_type, 9=>$employees->role, 10=>$employees->isactive, 11=>$employees->id));
			}catch(Exception $e){
				$errStr = "Exception occurred : ".$e->getMessage()." at line ".$e->getLine();
			}
		
			$result = "{
				"message" : "$errStr"
			}";
			return $result;
		}
						
		
		public function deleteEmployees($employeesId){
			$query = "delete from tbl_employees where `id` = ?";
			$errStr = "SUCCESS";
			try{
				$this->db->exec($query,array(1=>$employeesId));
			}catch(Exception $e){
				$errStr = "Exception occurred : ".$e->getMessage()." at line ".$e->getLine();
			}
			
			$result = "{
				"message" : "$errStr"
			}";
			return $result;
		}
			
		
				

		//Product_types related
		public function getProduct_types($key, $paramValue){
			$query = "select * from tbl_product_types --where-- and `isactive` = 'Y' --orderby-- limit ?,?";
			if($key == "all"){
				$query = str_replace("--orderby--",getOrderBy($paramValue),$query);
				$query = str_replace("--where--",getWhereClause($paramValue),$query);
				return $this->db->exec($query, getQparameters($paramValue));
			}else{
				$query = select * from tbl_product_types  where `id` = ?;
				return $this->db->exec($query,array(1=>$key));
			}
		}
		
		public function getProduct_typesTotal($key, $paramValue){
			$query = "select count(1) as total from tbl_product_types --where-- and `isactive` = 'Y'";
			if($key == "all"){
				$query = str_replace("--where--",getWhereClause($paramValue),$query);
				return $this->db->exec($query, getQparameters($paramValue));
			}else{
				return null;
			}
		}
		
		public function addProduct_types($product_types){
			$query = "insert into tbl_product_types (`name`, `isactive`, ) values (?, ?)";
			$errStr = "SUCCESS";
			try{
				$this->db->exec($query,array(1=>$product_types->name, 2=>$product_types->isactive));
			}catch(Exception $e){
				$errStr = "Exception occurred : ".$e->getMessage()." at line ".$e->getLine();
			}
		
			$result = "{
				"message" : "$errStr"
			}";
			return $result;
		}
		
		
		public function updateProduct_types($product_types){
			$query = "update tbl_product_types set `name` = ?, set `isactive` = ? where `id` = ?";
			$errStr = "SUCCESS";
			try{
				$this->db->exec($query,array(1=>$product_types->name, 2=>$product_types->isactive, 3=>$product_types->id));
			}catch(Exception $e){
				$errStr = "Exception occurred : ".$e->getMessage()." at line ".$e->getLine();
			}
		
			$result = "{
				"message" : "$errStr"
			}";
			return $result;
		}
						
		
		public function deleteProduct_types($product_typesId){
			$query = "delete from tbl_product_types where `id` = ?";
			$errStr = "SUCCESS";
			try{
				$this->db->exec($query,array(1=>$product_typesId));
			}catch(Exception $e){
				$errStr = "Exception occurred : ".$e->getMessage()." at line ".$e->getLine();
			}
			
			$result = "{
				"message" : "$errStr"
			}";
			return $result;
		}
			
		
				

		//Products related
		public function getProducts($key, $paramValue){
			$query = "select * from tbl_products --where-- and `isactive` = 'Y' --orderby-- limit ?,?";
			if($key == "all"){
				$query = str_replace("--orderby--",getOrderBy($paramValue),$query);
				$query = str_replace("--where--",getWhereClause($paramValue),$query);
				return $this->db->exec($query, getQparameters($paramValue));
			}else{
				$query = select * from tbl_products  where `id` = ?;
				return $this->db->exec($query,array(1=>$key));
			}
		}
		
		public function getProductsTotal($key, $paramValue){
			$query = "select count(1) as total from tbl_products --where-- and `isactive` = 'Y'";
			if($key == "all"){
				$query = str_replace("--where--",getWhereClause($paramValue),$query);
				return $this->db->exec($query, getQparameters($paramValue));
			}else{
				return null;
			}
		}
		
		public function addProducts($products){
			$query = "insert into tbl_products (`name`, `brand_id`, `type_id`, `unit_id`, `description`, `quantity`, `use`, `warning_level`, `commision`, `commision_type`, `isactive`, ) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
			$errStr = "SUCCESS";
			try{
				$this->db->exec($query,array(1=>$products->name, 2=>$products->brand_id, 3=>$products->type_id, 4=>$products->unit_id, 5=>$products->description, 6=>$products->quantity, 7=>$products->use, 8=>$products->warning_level, 9=>$products->commision, 10=>$products->commision_type, 11=>$products->isactive));
			}catch(Exception $e){
				$errStr = "Exception occurred : ".$e->getMessage()." at line ".$e->getLine();
			}
		
			$result = "{
				"message" : "$errStr"
			}";
			return $result;
		}
		
		
		public function updateProducts($products){
			$query = "update tbl_products set `name` = ?, set `brand_id` = ?, set `type_id` = ?, set `unit_id` = ?, set `description` = ?, set `quantity` = ?, set `use` = ?, set `warning_level` = ?, set `commision` = ?, set `commision_type` = ?, set `isactive` = ? where `id` = ?";
			$errStr = "SUCCESS";
			try{
				$this->db->exec($query,array(1=>$products->name, 2=>$products->brand_id, 3=>$products->type_id, 4=>$products->unit_id, 5=>$products->description, 6=>$products->quantity, 7=>$products->use, 8=>$products->warning_level, 9=>$products->commision, 10=>$products->commision_type, 11=>$products->isactive, 12=>$products->id));
			}catch(Exception $e){
				$errStr = "Exception occurred : ".$e->getMessage()." at line ".$e->getLine();
			}
		
			$result = "{
				"message" : "$errStr"
			}";
			return $result;
		}
						
		
		public function deleteProducts($productsId){
			$query = "delete from tbl_products where `id` = ?";
			$errStr = "SUCCESS";
			try{
				$this->db->exec($query,array(1=>$productsId));
			}catch(Exception $e){
				$errStr = "Exception occurred : ".$e->getMessage()." at line ".$e->getLine();
			}
			
			$result = "{
				"message" : "$errStr"
			}";
			return $result;
		}
			
		
				

		//Service_product_map related
		public function getService_product_map($key, $paramValue){
			$query = "select * from tbl_service_product_map --where-- and `isactive` = 'Y' --orderby-- limit ?,?";
			if($key == "all"){
				$query = str_replace("--orderby--",getOrderBy($paramValue),$query);
				$query = str_replace("--where--",getWhereClause($paramValue),$query);
				return $this->db->exec($query, getQparameters($paramValue));
			}else{
				$query = select * from tbl_service_product_map  where `id` = ?;
				return $this->db->exec($query,array(1=>$key));
			}
		}
		
		public function getService_product_mapTotal($key, $paramValue){
			$query = "select count(1) as total from tbl_service_product_map --where-- and `isactive` = 'Y'";
			if($key == "all"){
				$query = str_replace("--where--",getWhereClause($paramValue),$query);
				return $this->db->exec($query, getQparameters($paramValue));
			}else{
				return null;
			}
		}
		
		public function addService_product_map($service_product_map){
			$query = "insert into tbl_service_product_map (`product_id`, `product_quantity`, `product_quantity_unit`, `isactive`, ) values (?, ?, ?, ?)";
			$errStr = "SUCCESS";
			try{
				$this->db->exec($query,array(1=>$service_product_map->product_id, 2=>$service_product_map->product_quantity, 3=>$service_product_map->product_quantity_unit, 4=>$service_product_map->isactive));
			}catch(Exception $e){
				$errStr = "Exception occurred : ".$e->getMessage()." at line ".$e->getLine();
			}
		
			$result = "{
				"message" : "$errStr"
			}";
			return $result;
		}
		
		
		public function updateService_product_map($service_product_map){
			$query = "update tbl_service_product_map set `product_id` = ?, set `product_quantity` = ?, set `product_quantity_unit` = ?, set `isactive` = ? where `id` = ?";
			$errStr = "SUCCESS";
			try{
				$this->db->exec($query,array(1=>$service_product_map->product_id, 2=>$service_product_map->product_quantity, 3=>$service_product_map->product_quantity_unit, 4=>$service_product_map->isactive, 5=>$service_product_map->id));
			}catch(Exception $e){
				$errStr = "Exception occurred : ".$e->getMessage()." at line ".$e->getLine();
			}
		
			$result = "{
				"message" : "$errStr"
			}";
			return $result;
		}
						
		
		public function deleteService_product_map($service_product_mapId){
			$query = "delete from tbl_service_product_map where `id` = ?";
			$errStr = "SUCCESS";
			try{
				$this->db->exec($query,array(1=>$service_product_mapId));
			}catch(Exception $e){
				$errStr = "Exception occurred : ".$e->getMessage()." at line ".$e->getLine();
			}
			
			$result = "{
				"message" : "$errStr"
			}";
			return $result;
		}
			
		
				

		//Services related
		public function getServices($key, $paramValue){
			$query = "select * from tbl_services --where-- and `isactive` = 'Y' --orderby-- limit ?,?";
			if($key == "all"){
				$query = str_replace("--orderby--",getOrderBy($paramValue),$query);
				$query = str_replace("--where--",getWhereClause($paramValue),$query);
				return $this->db->exec($query, getQparameters($paramValue));
			}else{
				$query = select * from tbl_services  where `id` = ?;
				return $this->db->exec($query,array(1=>$key));
			}
		}
		
		public function getServicesTotal($key, $paramValue){
			$query = "select count(1) as total from tbl_services --where-- and `isactive` = 'Y'";
			if($key == "all"){
				$query = str_replace("--where--",getWhereClause($paramValue),$query);
				return $this->db->exec($query, getQparameters($paramValue));
			}else{
				return null;
			}
		}
		
		public function addServices($services){
			$query = "insert into tbl_services (`name`, `code`, `category`, `description`, `type`, `time_needed`, `time_unit`, `comission`, `comission_type`, `isactive`, ) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
			$errStr = "SUCCESS";
			try{
				$this->db->exec($query,array(1=>$services->name, 2=>$services->code, 3=>$services->category, 4=>$services->description, 5=>$services->type, 6=>$services->time_needed, 7=>$services->time_unit, 8=>$services->comission, 9=>$services->comission_type, 10=>$services->isactive));
			}catch(Exception $e){
				$errStr = "Exception occurred : ".$e->getMessage()." at line ".$e->getLine();
			}
		
			$result = "{
				"message" : "$errStr"
			}";
			return $result;
		}
		
		
		public function updateServices($services){
			$query = "update tbl_services set `name` = ?, set `code` = ?, set `category` = ?, set `description` = ?, set `type` = ?, set `time_needed` = ?, set `time_unit` = ?, set `comission` = ?, set `comission_type` = ?, set `isactive` = ? where `id` = ?";
			$errStr = "SUCCESS";
			try{
				$this->db->exec($query,array(1=>$services->name, 2=>$services->code, 3=>$services->category, 4=>$services->description, 5=>$services->type, 6=>$services->time_needed, 7=>$services->time_unit, 8=>$services->comission, 9=>$services->comission_type, 10=>$services->isactive, 11=>$services->id));
			}catch(Exception $e){
				$errStr = "Exception occurred : ".$e->getMessage()." at line ".$e->getLine();
			}
		
			$result = "{
				"message" : "$errStr"
			}";
			return $result;
		}
						
		
		public function deleteServices($servicesId){
			$query = "delete from tbl_services where `id` = ?";
			$errStr = "SUCCESS";
			try{
				$this->db->exec($query,array(1=>$servicesId));
			}catch(Exception $e){
				$errStr = "Exception occurred : ".$e->getMessage()." at line ".$e->getLine();
			}
			
			$result = "{
				"message" : "$errStr"
			}";
			return $result;
		}
			
		
				

		//Unit_of_measure related
		public function getUnit_of_measure($key, $paramValue){
			$query = "select * from tbl_unit_of_measure --where-- and `isactive` = 'Y' --orderby-- limit ?,?";
			if($key == "all"){
				$query = str_replace("--orderby--",getOrderBy($paramValue),$query);
				$query = str_replace("--where--",getWhereClause($paramValue),$query);
				return $this->db->exec($query, getQparameters($paramValue));
			}else{
				$query = select * from tbl_unit_of_measure  where `id` = ?;
				return $this->db->exec($query,array(1=>$key));
			}
		}
		
		public function getUnit_of_measureTotal($key, $paramValue){
			$query = "select count(1) as total from tbl_unit_of_measure --where-- and `isactive` = 'Y'";
			if($key == "all"){
				$query = str_replace("--where--",getWhereClause($paramValue),$query);
				return $this->db->exec($query, getQparameters($paramValue));
			}else{
				return null;
			}
		}
		
		public function addUnit_of_measure($unit_of_measure){
			$query = "insert into tbl_unit_of_measure (`name`, `isactive`, ) values (?, ?)";
			$errStr = "SUCCESS";
			try{
				$this->db->exec($query,array(1=>$unit_of_measure->name, 2=>$unit_of_measure->isactive));
			}catch(Exception $e){
				$errStr = "Exception occurred : ".$e->getMessage()." at line ".$e->getLine();
			}
		
			$result = "{
				"message" : "$errStr"
			}";
			return $result;
		}
		
		
		public function updateUnit_of_measure($unit_of_measure){
			$query = "update tbl_unit_of_measure set `name` = ?, set `isactive` = ? where `id` = ?";
			$errStr = "SUCCESS";
			try{
				$this->db->exec($query,array(1=>$unit_of_measure->name, 2=>$unit_of_measure->isactive, 3=>$unit_of_measure->id));
			}catch(Exception $e){
				$errStr = "Exception occurred : ".$e->getMessage()." at line ".$e->getLine();
			}
		
			$result = "{
				"message" : "$errStr"
			}";
			return $result;
		}
						
		
		public function deleteUnit_of_measure($unit_of_measureId){
			$query = "delete from tbl_unit_of_measure where `id` = ?";
			$errStr = "SUCCESS";
			try{
				$this->db->exec($query,array(1=>$unit_of_measureId));
			}catch(Exception $e){
				$errStr = "Exception occurred : ".$e->getMessage()." at line ".$e->getLine();
			}
			
			$result = "{
				"message" : "$errStr"
			}";
			return $result;
		}
			
		
				

		//Users related
		public function getUsers($key, $paramValue){
			$query = "select * from tbl_users --where-- and `isactive` = 'Y' --orderby-- limit ?,?";
			if($key == "all"){
				$query = str_replace("--orderby--",getOrderBy($paramValue),$query);
				$query = str_replace("--where--",getWhereClause($paramValue),$query);
				return $this->db->exec($query, getQparameters($paramValue));
			}else{
				$query = select * from tbl_users  where `id` = ?;
				return $this->db->exec($query,array(1=>$key));
			}
		}
		
		public function getUsersTotal($key, $paramValue){
			$query = "select count(1) as total from tbl_users --where-- and `isactive` = 'Y'";
			if($key == "all"){
				$query = str_replace("--where--",getWhereClause($paramValue),$query);
				return $this->db->exec($query, getQparameters($paramValue));
			}else{
				return null;
			}
		}
		
		public function addUsers($users){
			$query = "insert into tbl_users (`name`, `username`, `password`, `type`, `branch_id`, `inserted_on`, `isactive`, ) values (?, ?, ?, ?, ?, ?, ?)";
			$errStr = "SUCCESS";
			try{
				$this->db->exec($query,array(1=>$users->name, 2=>$users->username, 3=>$users->password, 4=>$users->type, 5=>$users->branch_id, 6=>$users->inserted_on, 7=>$users->isactive));
			}catch(Exception $e){
				$errStr = "Exception occurred : ".$e->getMessage()." at line ".$e->getLine();
			}
		
			$result = "{
				"message" : "$errStr"
			}";
			return $result;
		}
		
		
		public function updateUsers($users){
			$query = "update tbl_users set `name` = ?, set `username` = ?, set `password` = ?, set `type` = ?, set `branch_id` = ?, set `inserted_on` = ?, set `isactive` = ? where `id` = ?";
			$errStr = "SUCCESS";
			try{
				$this->db->exec($query,array(1=>$users->name, 2=>$users->username, 3=>$users->password, 4=>$users->type, 5=>$users->branch_id, 6=>$users->inserted_on, 7=>$users->isactive, 8=>$users->id));
			}catch(Exception $e){
				$errStr = "Exception occurred : ".$e->getMessage()." at line ".$e->getLine();
			}
		
			$result = "{
				"message" : "$errStr"
			}";
			return $result;
		}
						
		
		public function deleteUsers($usersId){
			$query = "delete from tbl_users where `id` = ?";
			$errStr = "SUCCESS";
			try{
				$this->db->exec($query,array(1=>$usersId));
			}catch(Exception $e){
				$errStr = "Exception occurred : ".$e->getMessage()." at line ".$e->getLine();
			}
			
			$result = "{
				"message" : "$errStr"
			}";
			return $result;
		}
			
		
				

		//Vendors related
		public function getVendors($key, $paramValue){
			$query = "select * from tbl_vendors --where-- and `isactive` = 'Y' --orderby-- limit ?,?";
			if($key == "all"){
				$query = str_replace("--orderby--",getOrderBy($paramValue),$query);
				$query = str_replace("--where--",getWhereClause($paramValue),$query);
				return $this->db->exec($query, getQparameters($paramValue));
			}else{
				$query = select * from tbl_vendors  where `id` = ?;
				return $this->db->exec($query,array(1=>$key));
			}
		}
		
		public function getVendorsTotal($key, $paramValue){
			$query = "select count(1) as total from tbl_vendors --where-- and `isactive` = 'Y'";
			if($key == "all"){
				$query = str_replace("--where--",getWhereClause($paramValue),$query);
				return $this->db->exec($query, getQparameters($paramValue));
			}else{
				return null;
			}
		}
		
		public function addVendors($vendors){
			$query = "insert into tbl_vendors (`name`, `contact`, `email`, `address`, `isactive`, ) values (?, ?, ?, ?, ?)";
			$errStr = "SUCCESS";
			try{
				$this->db->exec($query,array(1=>$vendors->name, 2=>$vendors->contact, 3=>$vendors->email, 4=>$vendors->address, 5=>$vendors->isactive));
			}catch(Exception $e){
				$errStr = "Exception occurred : ".$e->getMessage()." at line ".$e->getLine();
			}
		
			$result = "{
				"message" : "$errStr"
			}";
			return $result;
		}
		
		
		public function updateVendors($vendors){
			$query = "update tbl_vendors set `name` = ?, set `contact` = ?, set `email` = ?, set `address` = ?, set `isactive` = ? where `id` = ?";
			$errStr = "SUCCESS";
			try{
				$this->db->exec($query,array(1=>$vendors->name, 2=>$vendors->contact, 3=>$vendors->email, 4=>$vendors->address, 5=>$vendors->isactive, 6=>$vendors->id));
			}catch(Exception $e){
				$errStr = "Exception occurred : ".$e->getMessage()." at line ".$e->getLine();
			}
		
			$result = "{
				"message" : "$errStr"
			}";
			return $result;
		}
						
		
		public function deleteVendors($vendorsId){
			$query = "delete from tbl_vendors where `id` = ?";
			$errStr = "SUCCESS";
			try{
				$this->db->exec($query,array(1=>$vendorsId));
			}catch(Exception $e){
				$errStr = "Exception occurred : ".$e->getMessage()." at line ".$e->getLine();
			}
			
			$result = "{
				"message" : "$errStr"
			}";
			return $result;
		}
			
		