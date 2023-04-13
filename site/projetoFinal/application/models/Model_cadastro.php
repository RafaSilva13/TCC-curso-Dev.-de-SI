<?php

    class Model_cadastro extends CI_Model {

        public function cadastrarUsuario($nome_cliente, $cpf_cliente, $usuario_cliente, $email_cliente, $telefone_cliente, $senha_cliente, $cod_verificacao)
        {
            $dados = array(
                "nome_cliente" => $nome_cliente,
                "cpf_cliente" => $cpf_cliente,
                "username" => $usuario_cliente,
                "email_cliente" => $email_cliente,
                "telefone_cliente" => $telefone_cliente,
                "password" => $senha_cliente,
                "cod_verificacao" => $cod_verificacao,
                "status" => NULL 
            );

            return $this->db->insert('clientes', $dados);
        }

        public function cadastrarFuncionario($nome_motoboy, $cpf_motoboy, $placa_moto, $email_motoboy, $telefone_motoboy, $senha_motoboy, $cod_verificacao)
        {
            $dados = array(
                "nome_motoboy" => $nome_motoboy,
                "cpf_motoboy" => $cpf_motoboy,
                "placa_moto" => $placa_moto,
                "email_motoboy" => $email_motoboy,
                "telefone_motoboy" => $telefone_motoboy,
                "senha_motoboy" => $senha_motoboy,
                "cod_verificacao" => $cod_verificacao,
                "status" => NULL
            );

            return $this->db->insert('motoboy', $dados);
        }
        
        public function atualizarCliente($id_cliente, $nome_cliente, $cpf_cliente, $usuario_cliente, $email_cliente, $telefone_cliente, $senha_cliente, $foto)
        {

            $dados = array(
                "nome_cliente" => $nome_cliente,
				"cpf_cliente" => $cpf_cliente,
				"username" => $usuario_cliente,
                "email_cliente" => $email_cliente,
				"telefone_cliente" => $telefone_cliente,
				"password" => $senha_cliente,
				"foto" => $foto
            );

            $this->db->where('id_cliente', $id_cliente);

            return $this->db->update('clientes', $dados);
            
        }
        
        public function atualizarFuncionario ($id_motoboy, $nome_motoboy, $cpf_motoboy, $placa_moto, $email_motoboy, $telefone_motoboy, $senha_motoboy, $foto)
        {
            $dados = array(
				"cpf_motoboy" => $cpf_motoboy,
                "nome_motoboy" => $nome_motoboy,
                "email_motoboy" => $email_motoboy,
				"senha_motoboy" => $senha_motoboy,
				"telefone_motoboy" => $telefone_motoboy,
				"placa_moto" => $placa_moto,
				"foto" => $foto
            );

            $this->db->where('id_motoboy', $id_motoboy);

            return $this->db->update('motoboy', $dados);
            
        }
    }

?>