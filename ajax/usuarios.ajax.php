<?php

// importante en ajax, necesitamos requerir de nuevo tanto el controlador como el modelo
// esto es por que ajax se ejecuta como en segundo plano
// normalmente en el index.php hacemos todos los requerimientos de archivos, pero no en ajax

require_once "../controladores/usuarios.controlador.php";
require_once "../modelos/usuarios.modelo.php";
class AjaxUsuarios{
	/*======================================
	=            EDITAR USUARIO            =
	======================================*/
	
	public $idUsuario;
	public function ajaxEditarUsuario(){

		// solicitamos la respuesta al controlador Usuarios ejecutando el metodo ctrmostrraUsuarios
		// el metodo que esta en el controlador recibe dos parametros y hay que enviarlos
		$item = "id";
		$valor = $this -> idUsuario;
		$respuesta= ControladorUsuarios::ctrMostrarUsuarios($item,$valor);
		// para retornar la respuesta debemos regresarla codificada como json, esto por que asi se esta indicando en la llamda de ajax
		echo json_encode($respuesta);

	} // metodo ajaxEditarUsuario
	
	/*=====  End of EDITAR USUARIO  ======*/

	/*=======================================
	=            ACTIVAR USUARIO            =
	EN este caso la funcion ajax no se va a comunicar con el modelo utilizando el controlador, sino que vamos a aplicar directamente la actualizacion desde el modelo
	=======================================*/
	public $activarUsuario;
	public $activarId;


	public function ajaxActivarUsuario(){

		$tabla = "usuarios";

		$item1 = "estado";
		$valor1 = $this->activarUsuario;

		$item2 = "id";
		$valor2 = $this->activarId;

		$respuesta = ModeloUsuarios::mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2);

	}

	/*=====  End of ACTIVAR USUARIO  ======*/

	/*=================================================
	=            Validar Usuario Duplicado            =
	=================================================*/
	public $validarUsuario;
	public function ajaxValidarUsuario(){
		//para realizar la validación usaremos el controlador 
		$item = "usuario";
		$valor = $this->validarUsuario;

		$respuesta = ControladorUsuarios::ctrMostrarUsuarios($item,$valor);

		echo json_encode($respuesta);
	}
	
	
	/*=====  End of Validar Usuario Duplicado  ======*/
	
}

/*======================================
=          TRIGGER  EDITAR USUARIO            =

Una vez que llegamos hasta este archivo mediante el listener del boton de editar Usuario se debe verificar que se este recibiendo la variable POSTy el valor
======================================*/
if(isset($_POST["idUsuario"])){
	// creamos una instancia de la clase
	$editar = new AjaxUsuarios();
	// enlasar en la propiedad idUsuario  lo que venga en la variable POST
	$editar -> idUsuario = $_POST["idUsuario"];
	// ejecutamos el metodo para rescatar los datos
	$editar -> ajaxEditarUsuario();
}
/*=====  End of EDITAR USUARIO  ======*/


/*=============================================
ACTIVAR USUARIO
=============================================*/	

if(isset($_POST["activarUsuario"])){

	$activarUsuario = new AjaxUsuarios();
	$activarUsuario -> activarUsuario = $_POST["activarUsuario"];
	$activarUsuario -> activarId = $_POST["activarId"];
	$activarUsuario -> ajaxActivarUsuario();

}

/*=======================================================
=            Validación de Usuario Duplicado            =
=======================================================*/

if(isset($_POST["validarUsuario"])){
	$valUsuario = new AjaxUsuarios();
	$valUsuario -> validarUsuario = $_POST["validarUsuario"];
	$valUsuario -> ajaxValidarUsuario();

}

/*=====  End of Validación de Usuario Duplicado  ======*/
