<?php
require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php"; 
/**
 * 
 */
class AjaxProductos{

	/*==========================================================
	=            CREAR CODIGO A PARTIR DE CATEGORIA            =
	==========================================================*/
	//creamos esta propiedad publica para almacenar el valor del id de la categoria que viene desde la forma para ello  fuera de la clase obtenemos los datos
	public $idCategoria;
	public  function ajaxCrearCodigoProducto(){
		$item = "id_categoria";
		$valor = $this->idCategoria;

		$respuesta = ControladorProductos::ctrMostrarPRoductos($item,$valor);

		echo json_encode($respuesta);
	}
	
	/*=====  End of CREAR CODIGO A PARTIR DE CATEGORIA  ======*/

/*=======================================
=            EDITAR PRODUCTO            =
=======================================*/
	public $idProducto;
	public function ajaxEditarProducto(){

		$item = "id";
		$valor = $this->idProducto;
		$respuesta = ControladorProductos::ctrMostrarPRoductos($item,$valor);

		echo json_encode($respuesta);
	}

 
/*=====  End of EDITAR PRODUCTO  ======*/
}
//OBtener datos desde fuera
	//validamos que exista la variable post id categoria (que es un objeto del formulario)
	if(isset($_POST["idCategoria"])){
		//creamos una nueva instancia de la clase ajaxproductos
		$codigoProducto = new AjaxProductos();
		//asignamos a la propiedad publica idCategoria, el valor del objeto post idCategoria, que es el parametro que usaremos para la busqueda
		$codigoProducto -> idCategoria = $_POST["idCategoria"];
		//ejecutamos el metodo ajax Crear Codigo producto
		$codigoProducto -> ajaxCrearCodigoProducto();
	}

 
	//validamos que exista la variable post idProducto (que es un objeto del formulario)
	if(isset($_POST["idProducto"])){
		//creamos una nueva instancia de la clase ajaxproductos
		$editarProducto = new AjaxProductos();
		//asignamos a la propiedad publica idCategoria, el valor del objeto post idCategoria, que es el parametro que usaremos para la busqueda
		$editarProducto -> idProducto = $_POST["idProducto"];
		//ejecutamos el metodo ajax Crear Codigo producto
		$editarProducto -> ajaxEditarProducto();
	}