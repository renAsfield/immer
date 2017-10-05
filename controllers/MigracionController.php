<?php

class MigracionController extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->library('migration');
        $this->load->dbforge();
    }

    public function index() {
        $this->load->library('migration');
        if ($this->migration->current() === FALSE) {
            show_error($this->migration->error_string());
        }
    }

    public function crearbd() {
        if ($this->dbforge->create_database('immermym')) {
            echo 'bd creada correctamente!';
        }
    }

}
