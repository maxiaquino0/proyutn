<?php
/*
define("HOST","localhost");
define("USER","root");
define("PASS","");
define("DBNAME","proyutn");
*/

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
		//return $this->_pdo->query($sql);
	
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



























//$db = new DB();
/*
$db = DB::getInstance()->get("usuarios")->results();

foreach ($db as $row) {
	echo "Mi usuario es " . $row->usuario . "<br>";
}
*/


//$sql = "SELECT * FROM usuarios WHERE usuario = ? AND clave =?";

//$db->consultar($sql,array('lodeale', sha1('123456')));
//if ($db->count() > 0) {
//	echo "El usuario existe";
//}else{
//	echo "El usuario no existe";
//}


//foreach ($db->results() as $row) {
//	echo "Mi usuario es " . $row->usuario . "<br>";
//}


//$row = $result->fetch(PDO::FETCH_ASSOC);
//echo "El usuario es " . $row["usuario"];
//echo "<br>";
//echo "La clave es " . $row["clave"];

?>