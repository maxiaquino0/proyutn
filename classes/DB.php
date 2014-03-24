<?php

class DB{
	private $_pdo,
			$_query,
			$_error = false,
			$_results,
			$_count = 0;
	private static $_instance = null;

	public function __construct(){ 
		try{
			$this->_pdo = new PDO('mysql:host=' . Config::get('mysql/host') . ';dbname=' . Config::get('mysql/db') , Config::get('mysql/user'), Config::get('mysql/password'));
		}catch(PDOException $e){
			die($e->getMessage());
		}
	}	
	//algoritmo de singlenton, buscar bien sobre esto##########
	public static function getInstance(){
		if ( !isset(self::$_instance) ) {
			//si no existe, el isset me devuelve falso, pero con el ! me lo convierte a true
			self::$_instance = new DB();
		}
		return self::$_instance;
	}


	public function consultar($sql,  $params = array()){
		
	
		if( $this->_query = $this->_pdo->prepare($sql) ){
			$x =1;
			if (count($params)) {
				foreach ($params as $param) {
					$this->_query->bindValue($x,$param);
					$x++;
				}
			}
		
			if ($this->_query->execute()) {
				$this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
				$this->_count = $this->_query->rowCount();
			}else{
				var_dump($this->_query->errorInfo());
				$this->_error = true;
			}
		}	
		
		return $this;	
	}
	
	public function results(){
		return $this->_results;
	}
	//me devuelve el primer elto del resultado
	public function first(){
		return $this->_results[0];
	}

	public function count(){
		return $this->_count;
	}

	public function get($table){
		return $this->consultar("SELECT * FROM {$table}",array());
	}

	public function error(){
		return $this->_error;
	}

}//fin de la clase

?>