<?php

class StoModule {
	public function __construct() {
		Template::assign('selected', 'kafe');
		Template::assign('page_title', 'Stolovi');
	}
	
	public function main() {
		redirect('/');
	}
	 
	public function show() {
		$id = (int)Router::get_param(0, 0);
		
		$request = DB::query(
			'SELECT name FROM {db_prefix}products
			WHERE id = :id', 
			array(
				'id' => $id
			)
		);
		
		if ($request->rowCount() < 1)
			redirect('/');
		
		list($s_name) = $request->fetch(FETCH_ROW);
		
		$stolovi = array();
		
		$request=DB::query(
		'SELECT sto_id, description, token 
			from stolovi
			WHERE idk=:id',
			array ('id'=>$id )
			);
		
		while ($row = $request->fetch())
			$stolovi[] = $row;
		
		Template::assign('sto', array('iden' => $id));
		Template::assign('stolovi', $stolovi);
		Template::display('stolovi.tpl');
	}
	
	public function add($error = false) {
		$request = DB::query(
			'SELECT id, name 
			FROM {db_prefix}products
			ORDER BY name ASC'
		);
		
		$products = array();
		while ($row = $request->fetch())
			$products[] = $row;
		
		Template::assign('products', $products);
		
		$stolovi = array(
			'idk' => Router::get_param(0, 0),
			'description' => '',
			'token' => ''
		);
		
		if ($error) {
			$stolovi = $_POST;
		}
		
		Template::assign('stolovi', $stolovi);
		
		
		Template::assign('form_title', 'Dodaj novi sto');
		Template::assign('action', '/sto/add2');
		
		Template::assign('page_title', 'Dodaj novi sto');
		Template::display('dodaj-sto.tpl');
	}
	
	public function add2() {
		if (empty($_POST['idk']) || empty($_POST['token'])) {
			Template::assign('error', 1);
			$this->add(true);
			exit;
		}
		
		if (strlen($_POST['token']) != 8 || !is_numeric($_POST['token'])) {
			Template::assign('error', 2);
			$this->add(true);
			exit;
		}
		
		$request = DB::query(
			'SELECT idk FROM {db_prefix}stolovi
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
			'INSERT INTO {db_prefix}stolovi SET
			idk = :idk, 
			description = :description, 
			token = :token',
			array(
				'idk' => (int)$_POST['idk'], 
				'description' => $_POST['description'], 
				'token' => $_POST['token']
			)
		);
		
		redirect('/vehicle/show/' . $_POST['idk'] . '?success=1');
	}
	
	public function edit($error = false) {
		$sto_id = (int)Router::get_param(0, 0);
		
		$request = DB::query(
			'SELECT idk, description AS descriptions, token  
			FROM {db_prefix}stolovi 
			WHERE sto_id = :sto_id',
			array(
				'sto_id' => $sto_id
			)
		);
		
		if ($request->rowCount() < 1) {
			redirect('/seadisee');
			exit;
		}
		
		$stolovi= $request->fetch();
		
		if ($error) {
			$stolovi= $_POST;
		}
		
		Template::assign('stolovi', $stolovi);
		
		$request = DB::query(
			'SELECT id, name 
			FROM {db_prefix}products
			ORDER BY name ASC'
		);
		
		$products = array();
		while ($row = $request->fetch())
			$products[] = $row;
		
		Template::assign('products', $products);
		
		
		Template::assign('form_title', 'Izmeni sto');
		Template::assign('action', '/sto/edit2/' . $sto_id);
		
		Template::assign('page_title', 'Izmeni sto');
		Template::display('dodaj-sto.tpl');
	}
	
	public function edit2() {
		$sto_id = (int)Router::get_param(0, 0);
		
		$request = DB::query(
			'SELECT idk 
			FROM {db_prefix}stolovi 
			WHERE sto_id = :sto_id',
			array(
				'sto_id' => $sto_id
			)
		);
		if ($request->rowCount() < 1) {
			redirect('/seadisee');
			exit;
		}
		
		if (empty($_POST['idk']) || empty($_POST['descriptions']) || empty($_POST['token'])) {
			Template::assign('error', 1);
			$this->edit(true);
			exit;
		}
		
		if (strlen($_POST['token']) != 8 || !is_numeric($_POST['token'])) {
			Template::assign('error', 2);
			$this->edit(true);
			exit;
		}
		
		$request = DB::query(
			'SELECT idk FROM {db_prefix}stolovi 
			WHERE token = :token 
				AND sto_id != :sto_id', 
			array(
				'token' => $_POST['token'], 
				'sto_id' => $sto_id
			)
		);
		
		if ($request->rowCount() > 0) {
			Template::assign('error', 3);
			$this->edit(true);
			exit;
		}
		
		DB::query(
			'UPDATE {db_prefix}stolovi SET
			idk = :idk, 
			description = :descriptions, 
			token = :token 
			WHERE sto_id = :sto_id', 
			array(
				'idk' => (int)$_POST['idk'], 
				'description' => $_POST['descriptions'], 
				'token' => $_POST['token'], 
				'sto_id' => $sto_id
			)
		);
		
		redirect('/sto/show/' . $_POST['idk'] . '?success=2');
	}
	
	public function delete() {
		$sto_id = (int)Router::get_param(0, 0);
		
		/*$request = DB::query(
			'SELECT idk FROM {db_prefix}stolovi
			WHERE sto_id = :sto_id', 
			array(
				'sto_id' => $sto_id
			)
		);
		
		if ($request->rowCount() < 1)
			redirect('/seadisee');
		
		list($id) = $request->fetch(FETCH_ROW);*/
		
		DB::query(
			'DELETE FROM {db_prefix}stolovi 
			WHERE sto_id = :sto_id', 
			array(
				'sto_id' => $sto_id
			)
		);
		
		redirect('/sto/show/' . 11 . '?success=3' );
	}
	
	public function new_token() {
		$token = rand(10000000, 99999999);
		
		$response = array(
			'status' => 'ok', 
			'value' => $token
		);
		
		output_json($response);
	}
	
	public static function actions() {
		return array(
			'main', 
			'show',
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