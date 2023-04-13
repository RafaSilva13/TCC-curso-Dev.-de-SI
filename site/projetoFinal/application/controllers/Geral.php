<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Geral extends CI_Controller {

	// Pagina inicial
	public function index()
	{
		$this->load->view('view_header');
		$this->load->view('view_navbar');
		$this->load->view('view_modal');
		$this->load->view('view_pagamentos');
		$this->load->view('view_toast');
		$this->load->view('view_home');
		$this->load->view('view_footer');
	}
	
	public function arealogin()
	{
		$this->load->view('view_header');
		$this->load->view('view_navbar');
		$this->load->view('view_modal');
		$this->load->view('view_pagamentos');
		$this->load->view('view_toast');
		$this->load->view('logins/view_areaSelecaoLogin');
		$this->load->view('view_footer');
	}
	
	public function loginCliente()
	{
		$this->load->view('view_header');
		$this->load->view('view_navbar');
		$this->load->view('view_modal');
		$this->load->view('view_pagamentos');
		$this->load->view('view_toast');
		$this->load->view('logins/view_loginCliente');
		$this->load->view('view_footer');
	}
	
	public function loginFuncionario()
	{
		$this->load->view('view_header');
		$this->load->view('view_navbar');
		$this->load->view('view_modal');
		$this->load->view('view_pagamentos');
		$this->load->view('view_toast');
		$this->load->view('logins/view_loginFuncionario');
		$this->load->view('view_footer');
	}

	public function loginAdministrador()
	{
		$this->load->view('view_header');
		$this->load->view('view_navbar');
		$this->load->view('view_modal');
		$this->load->view('view_pagamentos');
		$this->load->view('view_toast');
		$this->load->view('logins/view_loginAdministrador');
		$this->load->view('view_footer');
	}
	
	public function cadastroCliente()
	{
		$this->load->view('view_header');
		$this->load->view('view_navbar');
		$this->load->view('view_modal');
		$this->load->view('view_pagamentos');
		$this->load->view('view_toast');
		$this->load->view('cadastros/view_cadastroCliente');
		$this->load->view('view_footer');
	}
	
	public function verifica_cadastro_cliente($email_cliente)
	{

		$dados = ["email_cliente" => $email_cliente];
		
		$this->load->view('view_header');
		$this->load->view('view_navbar');
		$this->load->view('view_modal');
		$this->load->view('view_pagamentos');
		$this->load->view('view_toast');
		$this->load->view('view_verificacao_cliente', $dados);
		$this->load->view('view_footer');
	}
	
	public function verifica_cadastro_funcionario($email_motoboy)
	{

		$dados = ["email_motoboy" => $email_motoboy];
		
		$this->load->view('view_header');
		$this->load->view('view_navbar');
		$this->load->view('view_modal');
		$this->load->view('view_pagamentos');
		$this->load->view('view_toast');
		$this->load->view('view_verificacao_funcionario', $dados);
		$this->load->view('view_footer');
	}
	
	public function cadastroFuncionario()
	{
		$this->load->view('view_header');
		$this->load->view('view_navbar');
		$this->load->view('view_modal');
		$this->load->view('view_pagamentos');
		$this->load->view('view_toast');
		$this->load->view('cadastros/view_cadastroFuncionario');
		$this->load->view('view_footer');
	}
	
	public function areaCliente()
	{
		if(isset($_SESSION['user']))
		{
			if($_SESSION['user'][1] == "clientes")
			{
				$this->load->view('view_header');
				$this->load->view('view_navbar');
				$this->load->view('view_modal');
				$this->load->view('view_pagamentos');
				$this->load->view('view_toast');
				$this->load->view('view_areaCliente');
				$this->load->view('view_footer');
			}
			else 
			{
				$this->load->view('view_header');
				$this->load->view('view_navbar');
				$this->load->view('view_modal');
				$this->load->view('view_pagamentos');
				$this->load->view('view_toast');
				$this->load->view('view_home');
				$this->load->view('view_footer');
			}
		}
		else 
		{
			$this->load->view('view_header');
			$this->load->view('view_navbar');
			$this->load->view('view_modal');
			$this->load->view('view_pagamentos');
			$this->load->view('view_toast');
			$this->load->view('view_home');
			$this->load->view('view_footer');
		}
	}
	
	public function verificacao()
	{
		if(isset($_SESSION['user']))
		{
			if ($_SESSION['user'][1] == 'clientes')
			{
				$this->load->view('view_header');
				$this->load->view('view_navbar');
				$this->load->view('view_modal');
				$this->load->view('view_pagamentos');
				$this->load->view('view_toast');
				$this->load->view('view_meuperfil_clientes');
				$this->load->view('view_footer');
			}
			else 
			{
				$this->load->view('view_header');
				$this->load->view('view_navbar');
				$this->load->view('view_modal');
				$this->load->view('view_pagamentos');
				$this->load->view('view_toast');
				$this->load->view('view_meuperfil_funcionario');
				$this->load->view('view_footer');
			}
		}
		else 
		{
			$this->load->view('view_header');
			$this->load->view('view_navbar');
			$this->load->view('view_modal');
			$this->load->view('view_pagamentos');
			$this->load->view('view_toast');
			$this->load->view('view_home');
			$this->load->view('view_footer');
		}
	}
	
	public function historico()
	{
		if(isset($_SESSION['user']))
		{
			if ($_SESSION['user'][1] == 'clientes')
			{
				$usuario = $_SESSION['user'][0];
				$this->load->model('Model_clientes');
				$resultado = $this->Model_clientes->historicoClientes($usuario);

				foreach ($resultado as $key => $value) {
					
					$valorPeso = $resultado[$key]->valor_peso;
	
					switch ($valorPeso) {
					
						case 3:
							$peso = "Abaixo de 1KG";
							break;
						
						case 5:
							$peso = "De 1KG a 3KG";
							break;
						
						case 9:
							$peso = "De 3KG a 8KG";
							break;
						
						case 12:
							$peso = "De 8KG a 12KG";
							break;
						
						default:
							break;
					}
				
					if($resultado[$key]->cod_motoboy != NULL) 
					{
						$this->load->model('Model_clientes');
						$nomeMotoboy = $this->Model_clientes->buscarNomeMotoboy($resultado[$key]->cod_motoboy);
					
						$nomeMotoboyModif = $nomeMotoboy[0]->nome_motoboy;
	
						$primeironomemotoboy = explode(" ", $nomeMotoboyModif);
					}
					else
					{
						$primeironomemotoboy = "--";	
					}

					$date = date_create($resultado[$key]->data_criacao);

					$dataFormatada = date_format($date,"d/m/Y ");

			
					$dadosServico[$key] = array(
						$resultado[$key]->id_servicos,
						$resultado[$key]->endereco_retirada,
						$resultado[$key]->endereco_destino,
						$resultado[$key]->status,
						$resultado[$key]->tempo,
						$peso,
						$resultado[$key]->valor_frete,
						$primeironomemotoboy,
						$dataFormatada

					);
				
				}	
				$dados['servicos']=$dadosServico;
	
				$this->load->view('view_header');
				$this->load->view('view_navbar');
				$this->load->view('view_modal');
				$this->load->view('view_pagamentos');
				$this->load->view('view_toast');
				$this->load->view('view_historico_clientes',$dados);
				$this->load->view('view_footer');
			}
			else 
			{
				$usuario = $_SESSION['user'][0];
				$this->load->model('Model_funcionarios');
				$resultado = $this->Model_funcionarios->historicoFuncionarios($usuario);

				foreach ($resultado as $key => $value) {
				
					$valorPeso = $resultado[$key]->valor_peso;
	
					switch ($valorPeso) {
					
						case 3:
							$peso = "Abaixo de 1KG";
							break;
						
						case 5:
							$peso = "De 1KG a 3KG";
							break;
						
						case 9:
							$peso = "De 3KG a 8KG";
							break;
						
						case 12:
							$peso = "De 8KG a 12KG";
							break;
						
						default:
							break;
					}
				
					if($resultado[$key]->cod_motoboy != NULL) 
					{
						$this->load->model('Model_funcionarios');
						$nomeCliente = $this->Model_funcionarios->buscarNomeCliente($resultado[$key]->cod_cliente);
					
						$nomeClienteModif = $nomeCliente[0]->nome_cliente;
	
						$primeironomecliente = explode(" ", $nomeClienteModif);
					}
					else
					{
						$primeironomecliente = "--";	
					}

					$date = date_create($resultado[$key]->data_criacao);

					$dataFormatada = date_format($date,"d/m/Y ");

			
					$dadosServico[$key] = array(
						$resultado[$key]->id_servicos,
						$resultado[$key]->endereco_retirada,
						$resultado[$key]->endereco_destino,
						$resultado[$key]->status,
						$resultado[$key]->tempo,
						$peso,
						$resultado[$key]->valor_frete,
						$primeironomecliente,
						$dataFormatada
					);
				
				}	
				$dados['servicos']=$dadosServico;
			

				$this->load->view('view_header');
				$this->load->view('view_navbar');
				$this->load->view('view_modal');
				$this->load->view('view_pagamentos');
				$this->load->view('view_toast');
				$this->load->view('view_historico_funcionario',$dados);
				$this->load->view('view_footer');
			}
		}
		else 
		{
			$this->load->view('view_header');
			$this->load->view('view_navbar');
			$this->load->view('view_modal');
			$this->load->view('view_pagamentos');
			$this->load->view('view_toast');
			$this->load->view('view_home');
			$this->load->view('view_footer');
		}
		
	}

	public function administrador()
	{		
		$this->load->view('view_header');
		$this->load->view('view_navbar');
		$this->load->view('view_modal');
		$this->load->view('view_toast');
		$this->load->view('administracao/view_areaAdministracao');
		$this->load->view('view_footer');
	}

	public function sair() 
	{
		$this->session->unset_userdata('user');

		$this->session->unset_userdata('dadosUsuario');
		$this->session->unset_userdata('dadosFuncionario');
	
		$this->load->view('view_header');
		$this->load->view('view_navbar');
		$this->load->view('view_modal');
		$this->load->view('view_pagamentos');
		$this->load->view('view_toast');
		$this->load->view('view_home');
		$this->load->view('view_footer');
	}
	
	
}
