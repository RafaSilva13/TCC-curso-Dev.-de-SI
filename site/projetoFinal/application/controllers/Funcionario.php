<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once("assets/src/PHPMailer.php");
require_once("assets/src/SMTP.php");
require_once("assets/src/Exception.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Funcionario extends CI_Controller {

	public function login() 
	{

		$email_motoboy = $this->input->post('email_motoboy');
		$senha_motoboy = md5($this->input->post('senha_motoboy'));
		
		$this->load->model('Model_login');
		$confirmacao = $this->Model_login->verificarLoginFuncionario($email_motoboy, $senha_motoboy);

		if($confirmacao == "#erro")
		{
			echo "SenhaUserIn";
		}
		else
		{
			$info = array($confirmacao, 'motoboy');

			$this->session->set_userdata('user', $info);


			echo $confirmacao;
		}
	}

	public function verifica_codigo_funcionario() 
	{

		$email_motoboy = $this->input->post('email_motoboy');
		$cod_verificacao = $this->input->post('cod_verificacao');
		$this->load->model('Model_funcionarios');
		$confirmacao4 = $this->Model_funcionarios->verificaCodigo($email_motoboy,$cod_verificacao);

		if($confirmacao4 == "#erro")
		{
			echo "incorreto";
		}
		else
		{
			$info = array($confirmacao4,'motoboy');

			$this->session->set_userdata('user', $info);

			echo $confirmacao4;
		}
		
	}
	
	public function cadastro() 
	{

		$nome_motoboy = $this->input->post('cad_nome_completo');
		$cpf_motoboy = $this->input->post('cad_cpf');
		$placa_moto = $this->input->post('cad_placa');
		$email_motoboy = $this->input->post('cad_email');
		$telefone_motoboy = $this->input->post('cad_telefone');
		$senha_motoboy = md5($this->input->post('cad_senha'));

		$mail = new PHPMailer(true);
	
		try {
			$mail->isSMTP();
			$mail->Host = 'smtp-relay.sendinblue.com';
			$mail->SMTPAuth = true;
			$mail->Username = 'speedlogservices@gmail.com';
			$mail->Password = 'NWaAnt3T7bh4rsZL';
			$mail->Port = 587;
	
			$mail->setFrom('speedlogservices@gmail.com');
			$mail->addAddress($email_motoboy);
	
			$mail->isHTML(true);
			
			$cod_verificacao = rand(1000, 9999);
			
			$mail->Subject = 'Cadastro Feito Com Sucesso';
			$mail->Body = 'Recebemos suas informacoes de Cadastro! Seu codigo de confirmacao e: <br> <b style="font-size:30px;">' . 
			$cod_verificacao . '</b></p>';
			$mail->AltBody = 'Recebemos suas informacoes de Cadastro! Seu código de confirmacao é: <b style="font-size:30px;">' . $cod_verificacao . '</b></p>';

			$this->load->model('Model_cadastro');
			$confirmacao2 = $this->Model_cadastro->cadastrarFuncionario($nome_motoboy, $cpf_motoboy, $placa_moto, $email_motoboy, $telefone_motoboy,$senha_motoboy,$cod_verificacao);
	
			if($mail->send()){
				
				echo $confirmacao2;
				

			}else{
				echo "Email Não Enviado";
			}
	
		} catch (Exception $e) {
			echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
			
		}

	}

	public function atualizarFuncionario()
	{
		$usuario = $_SESSION["user"][0];
		$tabela = $_SESSION["user"][1];

		$nomeMotoboy = $this->input->post('nomeMotoboyAlt');

		$cpfCnpjMotoboy = $this->input->post('cpfMotoboyAlt');
		
		$placaMotoMotoboy = $this->input->post('placaMotoMotoboy');

		$telefoneMotoboy = $this->input->post('telefoneMotoboyAlt');

		$emailMotoboy = $this->input->post('emailMotoboyAlt');

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

			if ( ! $this->upload->do_upload('arquivo_para_upload2'))
			{
				$error = array('error' => $this->upload->display_errors());
			}
			else
			{
				$data = array('upload_data' => $this->upload->data());

				$nomeFoto = $nomeImg.'.png';

				if($this->input->post('senhaMotoboyAlt') == "") 
				{
					$this->load->model('Model_funcionarios');
					$dados = $this->Model_funcionarios->retornarFuncionario($usuario, $tabela);

					$senha = $dados[0]->senha_motoboy;
				}
				else
				{
					$senha = md5($this->input->post('senhaMotoboyAlt'));
				}

				$this->load->model('Model_cadastro');
				$resultado = $this->Model_cadastro->atualizarFuncionario($usuario, $nomeMotoboy, $cpfCnpjMotoboy, $placaMotoMotoboy, $emailMotoboy, $telefoneMotoboy, $senha, $nomeFoto);
				
				echo $resultado;

			}
		}
		else 
		{
			$nomeFoto = $_SESSION['dadosFuncionario'][6];

			if($this->input->post('senhaMotoboyAlt') == "") 
			{
				$this->load->model('Model_funcionarios');
				$dados = $this->Model_funcionarios->retornarFuncionario($usuario, $tabela);

				$senha = $dados[0]->senha_motoboy;
			}
			else
			{
				$senha = md5($this->input->post('senhaMotoboyAlt'));
			}

			$this->load->model('Model_cadastro');
			$resultado = $this->Model_cadastro->atualizarFuncionario($usuario, $nomeMotoboy, $cpfCnpjMotoboy, $placaMotoMotoboy, $emailMotoboy, $telefoneMotoboy, $senha, $nomeFoto);
			
			echo $resultado;
		}

	}

	public function retornarFuncionario()
	{
		$usuario = $_SESSION['user'][0];
		$tabela = $_SESSION['user'][1];

		$this->load->model('Model_funcionarios');
		$dados = $this->Model_funcionarios->retornarFuncionario($usuario, $tabela);

		$funcionario = array(
			$dados[0]->nome_motoboy,
			$dados[0]->cpf_motoboy,
			$dados[0]->placa_moto,
			$dados[0]->email_motoboy,
			$dados[0]->senha_motoboy,
			$dados[0]->telefone_motoboy,
			$dados[0]->foto
		);

		$this->session->set_userdata('dadosFuncionario', $funcionario);
		
	}
	
}