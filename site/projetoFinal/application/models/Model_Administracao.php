<?php

    class Model_Administracao extends CI_Model {
        
        public function ordenar($campo, $ordem, $tabela)
        {
            $this->db->order_by($campo, $ordem);
            $query = $this->db->get($tabela);
            return $query->result();
        }
            
        public function excluirCliente($id_cliente)
        {
            $this->db->where('id_cliente', $id_cliente);
            $query = $this->db->delete('clientes');
            return $query->result();
        }
        
        public function excluirMotoboy($id_motoboy)
        {
            $this->db->where('id_motoboy', $id_motoboy);
            $query = $this->db->delete('motoboy');
            return $query->result();
        }
        
        public function excluirServico($id_servicos)
        {
            $this->db->where('id_servicos', $id_servicos);
            $query = $this->db->delete('servicos');
            return $query->result();
        }
        
        public function retornarServicos()
        {
            $query = $this->db->get('servicos');
            return $query->result();
        }
        
        public function totalServicos()
        {
            $query = $this->db->get('servicos');
            return $query->num_rows();
        }
        
        public function totalCliente()
        {
            $query = $this->db->get('clientes');
            return $query->num_rows();
        }
        
        public function totalMotoboy()
        {
            $query = $this->db->get('motoboy');
            return $query->num_rows();
        }

        public function retornarValorMensal()
        {
            $query = $this->db->query("SELECT sum(valor_frete) FROM servicos GROUP BY MONTH(data_criacao)");
        
            return $query->result();
        }

        public function retornarServicosMensal()
        {
            $query = $this->db->query("SELECT COUNT(id_servicos) FROM servicos GROUP BY MONTH(data_criacao)");
        
            return $query->result();
        }
    }

?>