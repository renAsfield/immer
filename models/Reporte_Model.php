<?php

class Reporte_Model extends CI_Model {

    Public function __construct() {
        parent::__construct();
    }

    //obtener todos los productos
   

    public function obtenerProductosVencidosXFechas($finicial,$ffinal) {
        $infoxagotarse = $this->db->query("SELECT pro.`NombreProducto` AS producto,
                                        pro.`CodigoDeBarras` AS codBarras,
                                        pro.`minimoStock` AS minimo,
                                         pro.`MaximoStock` AS maximo,
                                         pro.`Existencias` AS existencia,
                                         dep.`fechavenc` AS fechaVencimiento,
                                         dep.`lote` AS lote,
                                         DATEDIFF(dep.`fechavenc`,CURDATE()) AS cuantovencerse
                                        FROM `producto` pro INNER JOIN `detalleproducto` dep ON pro.`idProducto` = dep.`Producto_idProducto`
                                        WHERE dep.`fechavenc` BETWEEN '$finicial' AND '$ffinal'");
        return $infoxagotarse->result_array();
    }

    public function todosVencidos() {
        $infoxagotarse = $this->db->query("SELECT pro.`NombreProducto` AS producto,
                                        pro.`CodigoDeBarras` AS codBarras,
                                        pro.`minimoStock` AS minimo,
                                         pro.`MaximoStock` AS maximo,
                                         pro.`Existencias` AS existencia,
                                         dep.`fechavenc` AS fechaVencimiento,
                                         dep.`lote` AS lote,
                                         DATEDIFF(dep.`fechavenc`,CURDATE()) AS cuantovencerse,
                                         dep.`diaVencimiento` AS diaVencer
                                        FROM `producto` pro INNER JOIN `detalleproducto` dep ON pro.`idProducto` = dep.`Producto_idProducto`");
        return $infoxagotarse->result_array();
    }
    public function get()
	{
		$fields = $this->db->field_data('vencidoView');
		$query = $this->db->select('*')->get('vencidoView');
		return array("fields" => $fields, "query" => $query);
	}
}


