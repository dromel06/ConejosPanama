<?php 
	require_once('modelo.php');

	class conejo extends modeloCredencialesBD{
		protected $id;
		protected $raza;
		protected $edad;
		protected $sexo;
		protected $estado;
		protected $id_reserva;

		function __construct(){
			parent::__construct();
		}

		public function consultar_conejos(){
			$instruccion = "CALL sp_mostrar_conejos_disponibles()";
			$consulta=$this->_db->query($instruccion);
			$resultado=$consulta->fetch_all(MYSQLI_ASSOC);

			if($resultado){
				return $resultado;
				$resultado->close();
				$this->_db->close();
			} 
		}
		public function consultar_conejos_filtro($ra){
			$instruccion = "CALL sp_mostrar_conejos_filtro('".$ra."')";
			$consulta=$this->_db->query($instruccion);
			$resultado=$consulta->fetch_all(MYSQLI_ASSOC);

			if($resultado){
				return $resultado;
				$resultado->close();
				$this->_db->close();
			} 
		}

		public function agregar_reserva($no, $dir, $tel, $sta, $idConejo){
			$instruccion = "CALL sp_reservar_crear('".$no."','".$dir."','".$tel."','".$sta."','".$idConejo."')";
			$consulta=$this->_db->query($instruccion);
			
		}
	}
