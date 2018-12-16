<?php

class SeadiseeModule {
	public function __construct() {
		Template::assign('page_title', 'Kafići');
		Template::assign('selected', 'kafe');
	}
	
	public function main() {
		if (isset($_GET['success']))
			Template::assign('success', (int)$_GET['success']);
	
		$request = DB::query(
			'SELECT s.id AS id, s.name, s.address, COUNT(v.sto_id) AS num_s
			FROM {db_prefix}products AS s
				LEFT JOIN {db_prefix}stolovi AS v ON (v.idk = s.id) 
			GROUP BY s.id'
		);
		
		$companies = array();
		while ($row = $request->fetch())
			$companies[] = $row;
		
		Template::assign('companies', $companies);
		Template::display('services.tpl');
	}
	
	public function add($error = false) {
		$data = array(
			'name' => '', 
			'address' => '',
			'token' => '', 
			'phone' => '', 
			'description'=> '',
			'address' => '',
			'password'=> '',
			'menu'=> '',
		);
		
		if ($error) {
			$data = $_POST;
		}
		
		Template::assign('data', $data);
		
		Template::assign('form_title', 'Dodaj novi kafić');
		Template::assign('action', '/seadisee/add2');
		Template::display('service-add.tpl');
	}
	
	public function add2() {
		//$error_code = $this->check_fields($phones, $rates);
		
		
		
		// Check the uniqueness
		$request = DB::query(
			'SELECT id FROM {db_prefix}products  
			WHERE token = :token', 
			array(
				'token' => $_POST['token']
			)
		);
		
		if ($request->rowCount() > 0) {
			Template::assign('error', 3);
			$this->add(true);
			exit;
		}
		
		DB::query(
			'INSERT INTO {db_prefix}products SET
			name = :name, 
			address = :address, 
			token = :token, 
			password = :password,
			phone= :phone,
			description= :description,
			menu= :menu',
			array(
				'name' => $_POST['name'], 
				'address' => $_POST['address'], 
				'token' => $_POST['token'],
				'password' => $_POST['password'],
				'phone'=> $_POST['phone'],
				'description'=> $_POST['description'],
				'menu'=>$_POST['menu']
			)
		);
		
		$id = DB::lastInsertId();
		
		
		
		redirect('/seadisee/?success=1');
	}
	
	public function edit($error = false) {
		$id = (int)Router::get_param(0, 0);
		
		$request = DB::query(
			'SELECT name, address, token,menu, password, description,phone 
			FROM {db_prefix}products 
			WHERE id = :id',
			array(
				'id' => $id
			)
		);
		
		if ($request->rowCount() < 1) {
			redirect('/seadisee');
			exit;
		}
		
		$data = $request->fetch();
		
		// Phone numbers.
		
		
		
		
		
		if ($error) {
			$data = $_POST;
		}
		
		Template::assign('data', $data);
		
		Template::assign('form_title', 'Izmeni kafić');
		Template::assign('action', '/seadisee/edit2/' . $id);
		Template::display('service-add.tpl');
	}
	
	public function edit2() {
		$id = (int)Router::get_param(0, 0);
		
		$request = DB::query(
			'SELECT name
			FROM {db_prefix}products
			WHERE id = :id',
			array(
				'id' => $id
			)
		);
		if ($request->rowCount() < 1) {
			redirect('/seadisee');
			exit;
		}
		
		
		
		
		
		//if ($error_code > 0) {
			//Template::assign('error', $error_code);
			//$this->edit(true);
			//exit;
		//}
		
		// Check the uniqueness
		$request = DB::query(
			'SELECT id FROM {db_prefix}products
			WHERE token = :token 
				AND id != :id', 
			array(
				'token' => $_POST['token'], 
				'id' => $id
			)
		);
		
		if ($request->rowCount() > 0) {
			Template::assign('error', 3);
			$this->edit(true);
			exit;
		}
		
		DB::query(
			'UPDATE {db_prefix}products SET
			name = :name, 
			address = :address, 
			token = :token, 
			password = :password,
			phone= :phone,
			description= :description,
			menu= :menu',
			array(
				'name' => $_POST['name'], 
				'address' => $_POST['address'], 
				'token' => $_POST['token'],
				'password' => $_POST['password'],
				'phone'=> $_POST['phone'],
				'description'=> $_POST['description'],
				'menu'=>$_POST['menu']
			)
		);
		
		
		
		redirect('/seadisee/?success=2');
	}
	
	private function check_fields() {
		if (empty($_POST['name']) || empty($_POST['address']) || empty($_POST['token']) || empty ($_POST['menu']) ) {
			return 1;
		}
		
		
		
	
		
		if (strlen($_POST['token']) != 16) {
			return 2;
		}
		
		return 0; // Everything is OK.
	}
	
	public function delete() {
		$id = (int)Router::get_param(0, 0);
		
		//DB::query(
			//'DELETE FROM {db_prefix}stolovi
		//	WHERE idk = :id', 
			//array(
			//	'idk' => $id
			//)
		//);
		
		
		DB::query(
			'DELETE FROM {db_prefix}products
			WHERE id = :id', 
			array(
				'id' => $id
			)
		);
		
		redirect('/seadisee?success=3');
	}
	
	public function new_token() {
		$token = substr(md5(mt_rand()), 0, 16);
		
		$response = array(
			'status' => 'ok', 
			'value' => $token
		);
		
		output_json($response);
	}
	
	public static function actions() {
		return array(
			'main', 
			'add', 
			'add2',
			'edit',
			'edit2',
			'delete', 
			'new_token'
		);
	}
}

?>