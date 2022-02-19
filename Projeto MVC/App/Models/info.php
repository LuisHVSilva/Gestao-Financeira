<?php
    namespace App\Models;

    class Info {
        protected $db;

        public function __construct(\PDO $db){
            $this->db = $db;            
        }

        //Método de sql do tipo SELECT
        public function getInfo(){
            $query = 'Select titulo, descricao from tb_info';
            return $this->db->query($query)->fetchAll();
        }
    }
?>