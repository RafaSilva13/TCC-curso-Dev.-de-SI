<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Motoboy extends CI_Controller {

    public function areaMotoboy()
	{
		if(isset($_SESSION['user']))
        {
            if($_SESSION['user'][1] == "motoboy")
			{
                $this->load->model('Model_motoboy');
                $servicos = $this->Model_motoboy->retornarServicos();
                
                $dados = ["servicos" => $servicos];

                $this->load->view('view_header');
                $this->load->view('view_navbar');
                $this->load->view('view_modal');
                $this->load->view('view_pagamentos');
                $this->load->view('view_toast');
                $this->load->view('motoboy/view_areaMotoboy', $dados);
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

    public function aceitarServico()
    {
        $codigoServico = $this->input->post("codigoServico");

        $usuario = $_SESSION['user'][0];

        $this->load->model('Model_motoboy');
        $resultado = $this->Model_motoboy->aceitarServico($usuario, $codigoServico);

        echo $resultado;
            
    }

    public function verificarCorridasMb()
    {
        $usuario = $_SESSION['user'][0];

        $this->load->model('Model_motoboy');
        $resultado = $this->Model_motoboy->verificarCorridasMb($usuario);

        echo json_encode($resultado);
    }

    public function confirmarRetiradaServico() 
    {

        $usuario = $_SESSION['user'][0];

        $this->load->model('Model_motoboy');
        $resultado = $this->Model_motoboy->confirmarRetiradaServico($usuario);

        echo $resultado;
    }

    public function finalizarServico() 
    {
        $usuario = $_SESSION['user'][0];

        $this->load->model('Model_motoboy');
        $resultado = $this->Model_motoboy->finalizarServico($usuario);

        echo $resultado;
    }

    public function cancelarEntregaMb()
    {
        $usuario = $_SESSION['user'][0];

        $this->load->model('Model_motoboy');
        $resultado = $this->Model_motoboy->cancelarEntregaMb($usuario);

        echo $resultado;
    }
}

?>