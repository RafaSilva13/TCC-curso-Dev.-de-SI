<?php

    class Model_clientes extends CI_Model {

        public function retornarCliente($user, $table)
        {
            $query = $this->db->get_where($table, array('id_cliente' => $user));
            
            return $query->result();
        }

        public function adicionarCartao($user, $nomeCartao, $numeroCartao, $bandeiraCartao, $validadeCartao, $cvvCartao)
        {

            $data = array(
                "cod_cliente" => $user,
                "nome_cartao" => $nomeCartao,
                "numero" => $numeroCartao,
                "data_validade" => $validadeCartao,
                "cvv" => $cvvCartao,
                "bandeira" => $bandeiraCartao
            );

            return $this->db->insert('cartoes', $data);;
            
        }

        public function retornarServicos($user)
        {
            $this->db->where("status !=", 0);
            $this->db->where("cod_cliente", $user);
            
            $query = $this->db->get('servicos');

            return $query->result();
            
        }

        public function buscarNomeMotoboy($codMotoboy) 
        {
            $this->db->where('id_motoboy', $codMotoboy);
            $query = $this->db->get('motoboy');

            return $query->result();
        }

        public function historicoClientes($user)
        {
            $this->db->where("status =", 0);
            $this->db->where("cod_cliente", $user);
            $query = $this->db->get('servicos');

            return $query->result();
            
        }

        public function cancelarServicos($user, $codigo)
        {
            
            $dados = array(
                "status" => 0,
            );

            $this->db->where('cod_cliente', $user);
            $this->db->where('id_servicos', $codigo);
            return $this->db->update('servicos',$dados);

        }

        public function listarCartoes($user)
        {
            $query = $this->db->get_where("cartoes", array('cod_cliente' => $user));
            
            return $query->result();
        }

        public function removerCartoes($user, $cod)
        {
            $this->db->where('cod_cliente', $user);
            $this->db->where('id_cartao', $cod);
            $this->db->delete('cartoes');
        }

        public function verificaCodigo($email_cliente,$cod_verificacao)
        {
            $query = $this->db->get_where('clientes', array('email_cliente' => $email_cliente, 'cod_verificacao' => $cod_verificacao));
            
            if ($query->result()) 
            {            
                
                $dados = array(
                    "status" => 1,
                );

                $this->db->where('email_cliente', $email_cliente);
                $this->db->update('clientes',$dados);
            } 
            else 
            {
                return '#erro';
            }
            
        }
    }

?>