<?php

    class Model_login extends CI_Model {

        public function verificarLoginCliente($email_cliente, $senha_cliente)
        {   
            $query = $this->db->get_where('clientes', array('email_cliente' => $email_cliente, 'password' => $senha_cliente));

            if ($query->result()) 
            {            
                foreach ($query->result() as $row)
                {
                    return $row->id_cliente;
                }
            } 
            else 
            {
                return '#erro';
            }
        }
        public function verificarLoginFuncionario($email_motoboy, $senha_motoboy)
        {   
            $query = $this->db->get_where('motoboy', array('email_motoboy' => $email_motoboy, 'senha_motoboy' => $senha_motoboy));

            if ($query->result()) 
            {            
                foreach ($query->result() as $row)
                {
                    return $row->id_motoboy;
                }
            } 
            else 
            {
                return '#erro';
            }
        }
        public function verificarStatusCliente($email_cliente,$senha_cliente)
        {   
            $codStatus = 1;

            $query = $this->db->get_where('clientes', array('email_cliente' => $email_cliente,'password' => $senha_cliente, 'status' => $codStatus));

            if ($query->result()) 
            {            
               return 1;
            } 
            else 
            {
                return '#erro';
            }
        }
        
        public function verificarStatusFuncionario($email_cliente,$senha_cliente)
        {   
            $codStatus = 1;

            $query = $this->db->get_where('motoboy', array('email_motoboy' => $email_motoboy,'senha_motoboy' => $senha_motoboy, 'status' => $codStatus));

            if ($query->result()) 
            {            
               return 1;
            } 
            else 
            {
                return '#erro';
            }
        }

        public function verificarLoginAdministrador($usuario, $senha)
        {
            $query = $this->db->get_where('administradores', array('usuario_administrador' => $usuario, 'senha_administrador' => $senha));

            if ($query->result()) 
            {            
                foreach ($query->result() as $row)
                {
                    return $row->id_cliente;

                    $info = array('administrador');

			        $this->session->set_userdata('user', $info);
                }
            } 
            else 
            {
                return '#erro';
            }
        }

    }

?>