<?php
require_once "conexion.php";

class ModeloCategorias{
	/*==========================================
	=            INGRESAR CATEGORIA            =
	==========================================*/
	static public function mdlIngresarCategoria($tabla, $datos){
		$stmt = Conexion::conectar()->prepare ("INSERT INTO $tabla (nombre_categoria) VALUES (:categoria)");

		$stmt-> bindParam(":categoria", $datos, PDO::PARAM_STR);

		if ($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}
		$stmt->close();
		$stmt = null;
	}
	
	
	/*=====  End of INGRESAR CATEGORIA  ======*/
	
	/*==============================
	=            EDITAR            =
	==============================*/
	static public function mdlEditarCategoria($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre_categoria = :nombre_categoria WHERE id = :idCategoria");

		$stmt -> bindParam(":nombre_categoria", $datos["nombre_categoria"], PDO::PARAM_STR);
		$stmt -> bindParam(":idCategoria", $datos["idCategoria"], PDO::PARAM_INT);

		if ($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}
		$stmt->close();
		$stmt = null;
	}
	
	
	/*=====  End of EDITAR  ======*/
	
	/*==============================
	=            ELIMINAR            =
	==============================*/
	static public function mdlEliminarCategoria($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :idCategoria");
		//ojo aqui cuando es un solo parametro el que viene en datos no se pone $datos ["nombre de parametro"], simplemente datos pues no es un arreglo
		$stmt -> bindParam(":idCategoria", $datos, PDO::PARAM_INT);

		if ($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}
		$stmt->close();
		$stmt = null;
	}
	
	
	/*=====  End of ELIMINAR  ======*/
	
	/*=========================================
	=            Mostrar Categoria            =
	=========================================*/
	
		
	static public function mdlMostrarCategorias($tabla, $item, $valor){
		// primero haremos un filtro para determinar si solamente se retornara un valor, por que ese esta buscando un usuario en especifico, como cuando hace login o multiples, en caso de querer todos los registros de la tabla, como cuando los mostramos en listados.
		//para ello cuando se recibe el parametro item como nulo significa que queremos todos los resultados.
		
		if ($item != null){// validación del parametro item
			//objeto pdo para la conexcion
			// por politica de PDO no podemos pasar el $valor en directo sino que se tiene que enlazar, par aindicar que un parametro se va a enlasar se anteponenen :
			// en nuestro caso :$item
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
			//enlazar
			/* bindParam enlazar parametro, y se indique que columna se va a comparar en este caso $item con $valor, luego indicamos que solo se reciben cadenas con PDO::PARAM_STR */
			
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();
			//fetch solo retorna un resultado
			return $stmt->fetch();
		}else{// validación del parametro item
			//objeto pdo para la conexcion
			// por politica de PDO no podemos pasar el $valor en directo sino que se tiene que enlazar, par aindicar que un parametro se va a enlasar se anteponenen :
			// en nuestro caso :$item
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
			
			//Aqui no necesitamos enlazar valores con parametros en el objeto PDO pues no hay restricciones de la consulta
			$stmt -> execute();
			//fetch solo retorna un resultado, FetchAll retorna todos los resultados de la consulta
			return $stmt->fetchAll();
		}// validación del parametro item

		$stmt -> close();
		$stmt=null;
	}
}
