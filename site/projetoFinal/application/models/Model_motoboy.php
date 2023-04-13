<?php

    class Model_motoboy extends CI_Model {

        public function retornarServicos()
        {
            $query = $this->db->get_where("servicos", array('cod_motoboy' => NULL, 'status' => 2));
            
            return $query->result();
        }

        public function aceitarServico($user, $codigoServico)
        {
            $dados = array(
                "cod_motoboy" => $user,
                'status' => 1
            );

            $this->db->where('id_servicos', $codigoServico);
            return $this->db->update('servicos', $dados);
        }
        
        public function confirmarRetiradaServico($user)
        {
            $query = $this->db->get_where("servicos", array('cod_motoboy' => $user, 'status' => 1));
            
            if($query->result())
            {
                $codigoServico = $query->result()[0]->id_servicos;
                $tempoEstimado = ceil($query->result()[0]->tempo);

                date_default_timezone_set('America/Sao_Paulo');

		        $time = date("h:i:s");

                $tempoAlt = date('h:i:s', strtotime($time.' + '. $tempoEstimado . ' minutes'));

                $dados = array(
                    "horario_retirada" => date('h:i:s'),
                    "horario_previsto" => $tempoAlt,
                    'status' => 3
                );
    
                $this->db->where('id_servicos', $codigoServico);

                return $this->db->update('servicos', $dados);
            }
        }

        public function finalizarServico($user)
        {
            $query = $this->db->get_where("servicos", array('cod_motoboy' => $user, 'status' => 3));
            
            if($query->result())
            {
                $codigoServico = $query->result()[0]->id_servicos;
                $tempoEstimado = ceil($query->result()[0]->tempo);

                date_default_timezone_set('America/Sao_Paulo');

                $dados = array(
                    "horario_chegada" => date('h:i:s'),
                    'status' => 0
                );
    
                $this->db->where('id_servicos', $codigoServico);

                return $this->db->update('servicos', $dados);
            }
        }

        public function cancelarEntregaMb($user)
        {
            $query = $this->db->get_where("servicos", array('cod_motoboy' => $user, 'status' => 1));
            
            if($query->result())
            {
                $codigoServico = $query->result()[0]->id_servicos;

                $dados = array(
                    'status' => 2,
                    "cod_motoboy" => NULL
                );
    
                $this->db->where('id_servicos', $codigoServico);

                return $this->db->update('servicos', $dados);
            }
        }

        public function verificarCorridasMb($user)
        {
            $query = $this->db->where("status !=", 0);
            $query = $this->db->where("cod_motoboy", $user);
            $query = $this->db->get('servicos');
            
            return $query->result();
        }
    }

?>