<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once("assets/src/PHPMailer.php");
require_once("assets/src/SMTP.php");
require_once("assets/src/Exception.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Cliente extends CI_Controller {

	public function login() 
	{

		$email_cliente = $this->input->post('email_cliente');
		$senha_cliente = md5($this->input->post('senha_cliente'));

		$this->load->model('Model_login');
		$confirmacao = $this->Model_login->verificarLoginCliente($email_cliente, $senha_cliente);
		
		if($confirmacao == "#erro")
		{
			echo "SenhaUserIn";
		}
		else
		{
			$this->load->model('Model_login');
			$verificacao = $this->Model_login->verificarStatusCliente($email_cliente,$senha_cliente);

			if($verificacao == 1)
			{		
				$info = array($confirmacao,'clientes');
				
				$this->session->set_userdata('user', $info);
				
				echo $confirmacao;
			}
			else
			{
				echo "naoVerf";
			}
		}
		
	}

	public function retornarServicos()
	{
		$usuario = $_SESSION['user'][0];

		$this->load->model('Model_clientes');
		$resultado = $this->Model_clientes->retornarServicos($usuario);

		if(count($resultado) != 0) {

			$valorPeso = $resultado[0]->valor_peso;
	
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
	
			if($resultado[0]->cod_motoboy != NULL) 
			{
				$this->load->model('Model_clientes');
				$nomeMotoboy = $this->Model_clientes->buscarNomeMotoboy($resultado[0]->cod_motoboy);
	
				$nomeMotoboyModif = $nomeMotoboy[0]->nome_motoboy;
			}
			else
			{
				$nomeMotoboyModif = "--";	
			}
	
			$dadosServico = [
				$resultado[0]->id_servicos,
				$resultado[0]->endereco_retirada,
				$resultado[0]->endereco_destino,
				$resultado[0]->status,
				$resultado[0]->tempo,
				$peso,
				$resultado[0]->valor_frete,
				$nomeMotoboyModif,
			];
	
			echo json_encode($dadosServico);
		}
		else
		{

			echo 0;
		}
	}

	public function cancelarServicos()
	{
		
		$usuario = $_SESSION['user'][0];
		$codigoServico = $this->input->post("codigoServico");
		
		$this->load->model('Model_clientes');
		$resultado = $this->Model_clientes->cancelarServicos($usuario, $codigoServico);

		echo $resultado;
			
	}

	public function verifica_codigo_cliente() 
	{

		$email_cliente = $this->input->post('email_cliente');
		$cod_verificacao = $this->input->post('cod_verificacao');
		$this->load->model('Model_clientes');
		$confirmacao4 = $this->Model_clientes->verificaCodigo($email_cliente,$cod_verificacao);

		if($confirmacao4 == "#erro")
		{
			echo "incorreto";
		}
		else
		{

			$info = array($confirmacao4,'clientes');

			$this->session->set_userdata('user', $info);
			
			echo $confirmacao4;
		}
		
	}
	
	public function cadastro() 

	{
		$nome_cliente = $this->input->post('cad_nome_completo');
		$cpf_cliente = $this->input->post('cad_cpf');
		$usuario_cliente = $this->input->post('cad_usuario');
		$email_cliente = $this->input->post('cad_email');
		$telefone_cliente = $this->input->post('cad_telefone');
		$senha_cliente = md5($this->input->post('cad_senha'));
		
		$mail = new PHPMailer(true);
	
		try {
			$mail->isSMTP();
			$mail->Host = 'smtp-relay.sendinblue.com';
			$mail->SMTPAuth = true;
			$mail->Username = 'speedlogservices@gmail.com';
			$mail->Password = 'NWaAnt3T7bh4rsZL';
			$mail->Port = 587;
	
			$mail->setFrom('speedlogservices@gmail.com');
			$mail->addAddress($email_cliente);
	
			$mail->isHTML(true);
			
			$cod_verificacao = rand(1000, 9999);
			
			$mail->Subject = 'Cadastro Feito Com Sucesso';
			$mail->Body = 'Recebemos suas informações de Cadastro! Seu código de confirmação é: <b style="font-size:30px;">' . 
			$cod_verificacao . '</b></p>';
			$mail->AltBody = 'Recebemos suas informações de Cadastro! Seu código de confirmação é: <b style="font-size:30px;">' . $cod_verificacao . '</b></p>';

			$this->load->model('Model_cadastro');
			$confirmacao2 = $this->Model_cadastro->cadastrarUsuario($nome_cliente, $cpf_cliente, $usuario_cliente, $email_cliente, $telefone_cliente, $senha_cliente, $cod_verificacao);	
	
			if($mail->send()){
				
				echo $confirmacao2;
				

			}else{
				echo "Email Não Enviado";
			}
	
		} catch (Exception $e) {
			echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
			
		}
	}

	public function atualizarcliente()
	{
		$usuario = $_SESSION["user"][0];
		$tabela = $_SESSION["user"][1];

		$id_cliente = $_SESSION['user'][0];

		$nomeCliente = $this->input->post('nomeClienteAlt');

		$cpfCnpjCliente = $this->input->post('cpfClienteAlt');
		
		$usuarioCliente = $this->input->post('usuarioClienteAlt');

		$telefoneCliente = $this->input->post('telefoneClienteAlt');

		$emailCliente = $this->input->post('emailClienteAlt');

		$nomeAquivo = $this->input->post('nome');

		if($nomeAquivo != "imagemPadrao") 
		{
			$nomeAquivo = str_replace(".jpg", "", $nomeAquivo);
			$nomeAquivo = str_replace(".jpeg", "", $nomeAquivo);
			$nomeAquivo = str_replace(".png", "", $nomeAquivo);
			
			$nomeImg = 'perfil'.$nomeAquivo.''.$usuario.''.$tabela;

			$config['upload_path'] = "assets/imgperfil";
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size'] = 10000;
			$config['file_name'] = $nomeImg.'.png';

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('arquivo_para_upload'))
			{
				$error = array('error' => $this->upload->display_errors());
			}
			else
			{
				$data = array('upload_data' => $this->upload->data());

				$nomeFoto = $nomeImg.'.png';

				if($this->input->post('senhaClienteAlt') == "") 
				{
					$this->load->model('Model_clientes');
					$dados = $this->Model_clientes->retornarCliente($usuario, $tabela);

					$senha = $dados[0]->password;
				}
				else
				{
					$senha = md5($this->input->post('senhaClienteAlt'));
				}

				$this->load->model('Model_cadastro');
				$resultado = $this->Model_cadastro->atualizarCliente($id_cliente, $nomeCliente, $cpfCnpjCliente, $usuarioCliente, $emailCliente, $telefoneCliente, $senha, $nomeFoto);
				
				echo $resultado;
			}
		}
		else 
		{
			$nomeFoto = $_SESSION['dadosUsuario'][6];

			if($this->input->post('senhaClienteAlt') == "") 
			{
				$this->load->model('Model_clientes');
				$dados = $this->Model_clientes->retornarCliente($usuario, $tabela);

				$senha = $dados[0]->password;
			}
			else
			{
				$senha = md5($this->input->post('senhaClienteAlt'));
			}

			$this->load->model('Model_cadastro');
			$resultado = $this->Model_cadastro->atualizarCliente($id_cliente, $nomeCliente, $cpfCnpjCliente, $usuarioCliente, $emailCliente, $telefoneCliente, $senha, $nomeFoto);
			
			echo $resultado;
		}
	}


	public function retornarCliente()
	{
		$usuario = $_SESSION['user'][0];
		$tabela = $_SESSION['user'][1];

		$this->load->model('Model_clientes');
		$dados = $this->Model_clientes->retornarCliente($usuario, $tabela);

		$cliente = array(
			$dados[0]->nome_cliente,
			$dados[0]->cpf_cliente,
			$dados[0]->username,
			$dados[0]->email_cliente,
			$dados[0]->password,
			$dados[0]->telefone_cliente,
			$dados[0]->foto
		);

		$this->session->set_userdata('dadosUsuario', $cliente);
	}

	public function addCartao()
	{
		$usuario = $_SESSION['user'][0];

		$nomeCartao = $this->input->post("nomeCartao");
		$numeroCartao = $this->input->post("numeroCartao");
		$bandeiraCartao = $this->input->post("bandeiraCartao");
		$validadeCartao = $this->input->post("validadeCartao");
		$cvvCartao = $this->input->post("cvvCartao");

		$this->load->model('Model_clientes');
		$dadosCartao = $this->Model_clientes->adicionarCartao($usuario, $nomeCartao, $numeroCartao, $bandeiraCartao, $validadeCartao, $cvvCartao);

		print_r($dadosCartao);
	}

	public function listarCartoes()
	{
		$usuario = $_SESSION['user'][0];

		$this->load->model('Model_clientes');
		$dadosCartao = $this->Model_clientes->listarCartoes($usuario);

		echo json_encode($dadosCartao);
	}

	public function removerCartoes() 
	{
		$codigoCard = $this->input->post("idCartao");
		
		$usuario = $_SESSION['user'][0];

		$this->load->model('Model_clientes');
		$this->Model_clientes->removerCartoes($usuario, $codigoCard);

	}

	public function calcularServico()
	{
		$usuario = $_SESSION['user'][0];

		$dadosTrajeto = $this->input->post('dadosTrajeto');
		$tempo = $this->input->post('tempo');
		$distancia = $this->input->post('distancia');
		$peso = $this->input->post('peso');
		
		switch ($peso) {

			case 1:
				$valorPeso = 3.00;
				break;

			case 2:
				$valorPeso = 5.00;
				break;

			case 3:
				$valorPeso = 9.00;
				break;

			case 4:
				$valorPeso = 12.00;
				break;
		
			default:
				break;
		}

		$valorTempo = $tempo * (0.30);
		$valorDistancia = $distancia * (0.50);

		$valorTotal = $valorDistancia + $valorTempo + $valorPeso;

		$valores = array(
			$valorTempo,
			$valorDistancia,
			$valorTotal,
			$valorPeso
		);

		$data = array(
			"cod_cliente" => $usuario,
			"cep_retirada" => $dadosTrajeto[0],
			"endereco_retirada" => $dadosTrajeto[4] . ", " . $dadosTrajeto[5] . " - " . $dadosTrajeto[3] . ", " . $dadosTrajeto[1] . " - " . $dadosTrajeto[2] . ", " . $dadosTrajeto[0],
			"cep_destino" => $dadosTrajeto[6],
			"endereco_destino" => $dadosTrajeto[10] . ", " . $dadosTrajeto[11] . " - " . $dadosTrajeto[9] . ", " . $dadosTrajeto[7] . " - " . $dadosTrajeto[8] . ", " . $dadosTrajeto[6],
			"tempo" => number_format($tempo, 2, '.', ','),
			"distancia" => number_format($distancia, 2, '.', ','),
			"valor_peso" => number_format($valores[3], 2, '.', ','),
			"valor_distancia" => number_format($valores[1], 2, '.', ','),
			"valor_tempo" => number_format($valores[0], 2, '.', ','),
			"valor_frete" => number_format($valores[2], 2, '.', ',')
		);

		echo json_encode($data);
	}

	public function criarServico()
	{
		$usuario = $_SESSION['user'][0];

		$dadosTrajeto = $this->input->post('dadosTrajeto');
		$tempo = $this->input->post('tempo');
		$distancia = $this->input->post('distancia');
		$peso = $this->input->post('peso');
		
		switch ($peso) {

			case 1:
				$valorPeso = 3.00;
				break;

			case 2:
				$valorPeso = 5.00;
				break;

			case 3:
				$valorPeso = 9.00;
				break;

			case 4:
				$valorPeso = 12.00;
				break;
		
			default:
				break;
		}

		$valorTempo = $tempo * (0.30);
		$valorDistancia = $distancia * (0.50);

		$valorTotal = $valorDistancia + $valorTempo + $valorPeso;

		$valores = array(
			$valorTempo,
			$valorDistancia,
			$valorTotal,
			$valorPeso
		);

		$data = array(
			"cod_cliente" => $usuario,
			"cep_retirada" => $dadosTrajeto[0],
			"endereco_retirada" => $dadosTrajeto[4] . ", " . $dadosTrajeto[5] . " - " . $dadosTrajeto[3] . ", " . $dadosTrajeto[1] . " - " . $dadosTrajeto[2] . ", " . $dadosTrajeto[0],
			"cep_destino" => $dadosTrajeto[6],
			"endereco_destino" => $dadosTrajeto[10] . ", " . $dadosTrajeto[11] . " - " . $dadosTrajeto[9] . ", " . $dadosTrajeto[7] . " - " . $dadosTrajeto[8] . ", " . $dadosTrajeto[6],
			"tempo" => number_format($tempo, 2, '.', ','),
			"distancia" => number_format($distancia, 2, '.', ','),
			"valor_peso" => number_format($valores[3], 2, '.', ','),
			"valor_distancia" => number_format($valores[1], 2, '.', ','),
			"valor_tempo" => number_format($valores[0], 2, '.', ','),
			"valor_frete" => number_format($valores[2], 2, '.', ','),
			"statusPagamento" => 1,
			"data_criacao" => date('Y/m/d')
		);

		$this->load->model('Model_servicos');
		$resultado = $this->Model_servicos->addServico($data);

		echo $resultado;

	}
}
