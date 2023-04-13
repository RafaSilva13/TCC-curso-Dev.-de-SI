<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrador extends CI_Controller {

	public function login() 
	{
		$usuario_administrador = $this->input->post('usuario_administrador');
		$senha_administrador = md5($this->input->post('senha_administrador'));

		$this->load->model('Model_login');
		$confirmacao = $this->Model_login->verificarLoginAdministrador($usuario_administrador, $senha_administrador);
		
		if($confirmacao == "#erro")
		{
			echo "SenhaUserIn";
		}	
		else
		{
			$info = array($confirmacao,'administrador');
			
			$this->session->set_userdata('user', $info);
			
			echo $confirmacao;
		}
	}

    public function areaAdministrador()
	{		
		if(isset($_SESSION['user']))
		{	
			if($_SESSION['user'][1] == 'administrador')
			{
				$this->load->view('view_header');
				$this->load->view('view_navbar');
				$this->load->view('view_modal');
				$this->load->view('view_toast');
				$this->load->view('view_pagamentos');
				$this->load->view('administracao/view_areaAdministracao');
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
   
    public function admDadosMensais()
    {
		if(isset($_SESSION['user']))
		{	
			if($_SESSION['user'][1] == 'administrador')
			{
				$this->load->model('Model_Administracao');
				$resultado = $this->Model_Administracao->retornarServicos();

				foreach ($resultado as $key => $value) {

					$date = date_create($value->data_criacao);

					$dataFormatada = date_format($date,"m");

					$nome_mes = date("F", mktime(0, 0, 0, $dataFormatada, 10));
					
					$servicos[$key] = array(
						$value->id_servicos,
						$nome_mes
						
					);

				}

				$dados = ["servicos" => $servicos];

				$this->load->view('view_header');
				$this->load->view('view_navbar');
				$this->load->view('view_modal');
				$this->load->view('view_toast');
				$this->load->view('view_pagamentos');
				$this->load->view('administracao/view_exibirDadosMensais',$dados);
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

    public function admValoresMensais()
    {
		if(isset($_SESSION['user']))
		{	
			if($_SESSION['user'][1] == 'administrador')
			{
				$this->load->view('view_header');
				$this->load->view('view_navbar');
				$this->load->view('view_modal');
				$this->load->view('view_toast');
				$this->load->view('view_pagamentos');
				$this->load->view('administracao/view_exibirValoresMensais');
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
    public function admSuporte()
    {
		if(isset($_SESSION['user']))
		{	
			if($_SESSION['user'][1] == 'administrador')
			{
				$this->load->view('view_header');
				$this->load->view('view_navbar');
				$this->load->view('view_modal');
				$this->load->view('view_toast');
				$this->load->view('view_pagamentos');
				$this->load->view('administracao/view_exibirSuporte');
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

	public function ordenarCliente($campo, $ordem, $tabela){
		
		if(isset($_SESSION['user']))
		{	
			if($_SESSION['user'][1] == 'administrador')
			{
				$this->load->model('Model_Administracao');//Ativa o Model Administracao
				
				$resultado = $this->Model_Administracao->ordenar($campo, $ordem, $tabela);
				$resultado1 = $this->Model_Administracao->totalCliente();
			
				$dados['ordem'] = $resultado;

				$total=$resultado1;

				foreach ($resultado as $key => $value) {
					
					$cliente[$key] = array(
						$value->id_cliente,
						$value->nome_cliente,
						$value->cpf_cliente,
						$value->username,
						$value->email_cliente,
						$value->password,
						$value->telefone_cliente,
						$value->foto,
						$value->status,
						$total
			
					);

				}

				$dados = ["cliente" => $cliente];
				
				$this->load->view('view_header');
				$this->load->view('view_navbar');
				$this->load->view('view_modal');
				$this->load->view('view_toast');
				$this->load->view('view_pagamentos');
				$this->load->view('administracao/view_exibirClientes', $dados);
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
	
	public function ordenarMotoboy($campo, $ordem, $tabela){
		
		if(isset($_SESSION['user']))
		{	
			if($_SESSION['user'][1] == 'administrador')
			{
				$this->load->model('Model_Administracao');//Ativa o Model Administracao
				
				$resultado = $this->Model_Administracao->ordenar($campo, $ordem, $tabela);
				$resultado1 = $this->Model_Administracao->totalMotoboy();

				$dados['ordem'] = $resultado;

				$total=$resultado1;

				foreach ($resultado as $key => $value) {
					
					$motoboy[$key] = array(
						$value->id_motoboy,
						$value->nome_motoboy,
						$value->cpf_motoboy,
						$value->placa_moto,
						$value->email_motoboy,
						$value->senha_motoboy,
						$value->telefone_motoboy,
						$value->status,
						$value->foto,
						$total
					);

				}

				$dados = ["motoboy" => $motoboy];
				
				$this->load->view('view_header');
				$this->load->view('view_navbar');
				$this->load->view('view_modal');
				$this->load->view('view_toast');
				$this->load->view('view_pagamentos');
				$this->load->view('administracao/view_exibirMotoboys', $dados);
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
	public function ordenarServico($campo, $ordem, $tabela){
		
		if(isset($_SESSION['user']))
		{	
			if($_SESSION['user'][1] == 'administrador')
			{
				$this->load->model('Model_Administracao');//Ativa o Model Administracao
				
				$resultado = $this->Model_Administracao->ordenar($campo, $ordem, $tabela);
				$resultado1 = $this->Model_Administracao->totalServicos();

				$dados['ordem'] = $resultado;

				$total=$resultado1;

				foreach ($resultado as $key => $value) {
					
					$servico[$key] = array(
						$value->id_servicos,
						$value->cep_retirada,
						$value->endereco_retirada,
						$value->cep_destino,
						$value->endereco_destino,
						$value->status,
						$value->tempo,
						$value->distancia,
						$value->horario_retirada,
						$value->horario_previsto,
						$value->horario_chegada,
						$value->valor_frete,
						$total
			
					);

				}

				$dados = ["servico" => $servico];
				
				$this->load->view('view_header');
				$this->load->view('view_navbar');
				$this->load->view('view_modal');
				$this->load->view('view_toast');
				$this->load->view('view_pagamentos');
				$this->load->view('administracao/view_exibirServicos', $dados);
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

	public function excluirCliente()
    {
		if(isset($_SESSION['user']))
		{	
			if($_SESSION['user'][1] == 'administrador')
			{ 
				$id_cliente = $_POST['id_cliente'];

				$this->load->model('Model_Administracao');
				$confirmacao = $this->Model_Administracao->excluirCliente($id_cliente);

				$dados = $confirmacao;
				
				$this->load->view('view_header');
				$this->load->view('view_navbar');
				$this->load->view('view_modal');
				$this->load->view('view_toast');
				$this->load->view('view_pagamentos');
				$this->load->view('administracao/view_exibirClientes', $dados);
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
	
	public function excluirMotoboy()
    {
		if(isset($_SESSION['user']))
		{	
			if($_SESSION['user'][1] == 'administrador')
			{ 
				$id_motoboy = $_POST['id_motoboy'];

				$this->load->model('Model_Administracao');
				$confirmacao = $this->Model_Administracao->excluirMotoboy($id_motoboy);

				$dados = $confirmacao;
				
				$this->load->view('view_header');
				$this->load->view('view_navbar');
				$this->load->view('view_modal');
				$this->load->view('view_toast');
				$this->load->view('view_pagamentos');
				$this->load->view('administracao/view_exibirMotoboys', $dados);
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
	
	public function excluirServico()
    {
		if(isset($_SESSION['user']))
		{	
			if($_SESSION['user'][1] == 'administrador')
			{ 
				$id_servicos = $_POST['id_servicos'];

				$this->load->model('Model_Administracao');
				$confirmacao = $this->Model_Administracao->excluirServico($id_servicos);

				$dados = $confirmacao;
				
				$this->load->view('view_header');
				$this->load->view('view_navbar');
				$this->load->view('view_modal');
				$this->load->view('view_toast');
				$this->load->view('view_pagamentos');
				$this->load->view('administracao/view_exibirServicos', $dados);
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

	public function retornarServicosMensal()
	{
		$this->load->model('Model_Administracao');
		$valores = $this->Model_Administracao->retornarServicosMensal();

		echo json_encode($valores);
	}
	
	public function retornarValorMensal()
	{
		$this->load->model('Model_Administracao');
		$valores = $this->Model_Administracao->retornarValorMensal();

		echo json_encode($valores);
	}
	
	// public function retornarServico()
    // {

	// 	$this->load->model('Model_Administracao');
	// 	$resultado = $this->Model_Administracao->retornarServicos();

	// 	foreach ($resultado as $key => $value) {
			
	// 		$servicos[$key] = array(
	// 			$value->id_servicos,
	// 			$value->data_criacao,
				
	// 		);

	// 	}

	// 	$dados = ["servicos" => $servicos];
		
	// 	$this->load->view('view_header');
	// 	$this->load->view('view_navbar');
	// 	$this->load->view('view_modal');
	// 	$this->load->view('view_toast');
	// 	$this->load->view('view_pagamentos');
	// 	$this->load->view('administracao/view_exibirDadosMensais',$dados);
	// 	$this->load->view('view_footer');

    // }

}