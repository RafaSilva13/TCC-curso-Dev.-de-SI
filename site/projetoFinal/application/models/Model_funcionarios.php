<?php

    class Model_funcionarios extends CI_Model {

        public function retornarFuncionario($user, $table)
        {
            $query = $this->db->get_where($table, array('id_motoboy' => $user));
            
            return $query->result();
        }

        public function verificaCodigo($email_motoboy,$cod_verificacao)
        {
            $query = $this->db->get_where('motoboy', array('email_motoboy' => $email_motoboy, 'cod_verificacao' => $cod_verificacao));
            
            $dados = array(
                "status" => 1,
            );
            $this->db->where('email_motoboy', $email_motoboy);
            
            $this->db->update('motoboy',$dados);
            
            if ($query->result()) 
            {            
                
            } 
            else 
            {
                return '#erro';
            }
        }

        public function historicoFuncionarios($user)
        {
            $this->db->where("status =", 0);
            $this->db->where("cod_motoboy", $user);
            $query = $this->db->get('servicos');

            return $query->result();
            
        }

        public function buscarNomeCliente($codCliente) 
        {
            $this->db->where('id_cliente', $codCliente);
            $query = $this->db->get('clientes');

            return $query->result();
        }


    }

?>