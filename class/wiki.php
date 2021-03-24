<?php 
	require_once('modelo.php');

	class wiki extends modeloCredencialesBD{
		protected $nombre;
		protected $imagen;
		protected $info;
		protected $dialogo;
		protected $tipo;
		protected $aguijon_onirico;

		function __construct(){
			parent::__construct();
		}

		public function consultar_wiki($valor){
			$instruccion = "CALL sp_listar_wiki('".$valor."')";
			$consulta=$this->_db->query($instruccion);
			$resultado=$consulta->fetch_all(MYSQLI_ASSOC);

			if($resultado){
				return $resultado;
				$resultado->close();
				$this->_db->close();
			} 
		}
		public function consultar_id_wiki($valor){
			$instruccion = "CALL sp_listar_id_wiki('".$valor."')";
			$consulta=$this->_db->query($instruccion);
			$resultado=$consulta->fetch_all(MYSQLI_ASSOC);

			if($resultado){
				return $resultado;
				$resultado->close();
				$this->_db->close();
			} 
		}
		public function consultar_admin_wiki($valor){
			$instruccion = "CALL sp_listar_admin_wiki('".$valor."')";
			$consulta=$this->_db->query($instruccion);
			$resultado=$consulta->fetch_all(MYSQLI_ASSOC);

			if($resultado){
				return $resultado;
				$resultado->close();
				$this->_db->close();
			} 
		}
		

		public function agregar_wiki($no, $im, $in, $di, $ti, $ag){
			$instruccion = "CALL sp_agregar_wiki('".$no."','".$im."','".$in."','".$di."','".$ti."','".$ag."')";
			$consulta=$this->_db->query($instruccion);
			
		}

		public function modificar_wiki($no, $im, $in, $di, $ti, $ag){
			$instruccion = "CALL sp_modificar_wiki('".$no."','".$im."','".$in."','".$di."','".$ti."','".$ag."')";
			$consulta=$this->_db->query($instruccion);
			
		}

		public function eliminar_wiki($valor){
			$instruccion = "CALL sp_eliminar_wiki('".$valor."')";
			$consulta=$this->_db->query($instruccion);
		}
	}
