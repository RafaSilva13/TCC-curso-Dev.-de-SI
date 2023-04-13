<?php

    class Model_servicos extends CI_Model {
        
        public function addServico($data) {

            $query = $this->db->insert('servicos', $data);
            
            return $query->result(); 
        }

    }

?>