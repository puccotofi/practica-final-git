<?php

// importante en ajax, necesitamos requerir de nuevo tanto el controlador como el modelo
// esto es por que ajax se ejecuta como en segundo plano
// normalmente en el index.php hacemos todos los requerimientos de archivos, pero no en ajax

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

class AjaxCategorias{
	/*===================================================
	=            Validar Categoria Duplicada            =
	===================================================*/
	public $validarCategoria;

	 public function ajaxValidarCategoria(){
		//para realizar la validación usaremos el controlador 
		$item = "nombre_categoria";
		$valor = $this->validarCategoria;
		$respuesta = ControladorCategorias::ctrMostrarCategorias($item,$valor);
		echo json_encode($respuesta);
		//echo json_encode('a');
	}
	/*=====  End of Validar Categoria Duplicada  ======*/

	/*=========================================
	=            EDITAR CATEGORIAS            =
	=========================================*/
	public $idCategoria;
	public function ajaxEditarCategoria(){
		$item = "id";
		$valor = $this->idCategoria;
		$respuesta = ControladorCategorias::ctrMostrarCategorias($item,$valor);
		echo json_encode($respuesta);

	}
	
	
	/*=====  End of EDITAR CATEGORIAS  ======*/
	
} // fin de clase AjaxCategorias

/*================================
=            TRIGGERS            =
================================*/

/*=======================================================
=          TRIGGER  Validación de Categoria Duplicado            =
=======================================================*/
//validarCategoria viene del JS
if(isset($_POST["validarCategoria"])){
	$valCategoria = new AjaxCategorias();
	$valCategoria -> validarCategoria = $_POST["validarCategoria"];
	$valCategoria -> ajaxValidarCategoria();

	//echo json_encode('a');
}
/*=====  End of Validación de Usuario Duplicado  ======*/
/*===================================================
=            TRIGGER de Editar Categoria            =
===================================================*/
if(isset($_POST["idCategoria"])){
	$editar = new AjaxCategorias();
	$editar -> idCategoria = $_POST["idCategoria"];
	$editar -> ajaxEditarCategoria();
}


/*=====  End of TRIGGER de Editar Categoria  ======*/


/*=====  End of TRIGGERS  ======*/
