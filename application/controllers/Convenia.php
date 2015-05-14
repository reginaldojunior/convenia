<?php

class Convenia extends CI_Controller {	
	function __construct() {
		parent::__construct();
        $this->load->database();
        $this->load->helper('url');
	}
	public function index() {
		$mensagens = $this->db->get('mensagens');

		$dados['mensagens_count'] = $mensagens->num_rows();
		$dados['mensagens'] = $mensagens->result_array();

		$this->load->view('convenia_index',  $dados);
	}

	public function grupo_escolhido() {
		$alfabeto = range('A', 'Z');

		$grupo = array(
			'HALLEY' => array(
				'grupo' => 'AMARELO'
			),
			'ENCKE' => array(
				'grupo' => 'VERMELHO'
			),
			'WOLF' => array(
				'grupo' => 'PRETO'
			),
			'KUSHIDA' => array(
				'grupo' => 'AZUL'
			),
		);

		foreach ($grupo as $cometa => $cor) {
			$cont = strlen($cor['grupo']);
			$resultado_grupo  = 1;
			for ($i = 0; $i < $cont; $i++) {
				$numero_alfabeto  = array_search($cor['grupo']{$i}, $alfabeto) + 1;
				$resultado_grupo *= $numero_alfabeto;
			}
			
			$cont = strlen($cometa);
			$resultado_cometa = 1;
			for ($i = 0; $i < $cont; $i++) {
				$numero_alfabeto  = array_search($cometa{$i}, $alfabeto) + 1;
				$resultado_cometa *= $numero_alfabeto;
			}

			$resto_divisao_grupo  = $resultado_grupo  % 45;
			$resto_divisao_cometa = $resultado_cometa % 45;

			if ($resto_divisao_cometa === $resto_divisao_grupo) {
				$resultado[] = $cor['grupo'];
			}
		}

		echo json_encode($resultado);
	}

	public function ferias() {
		$data = $this->input->post();
		$data = formatar_data($data['data_ferias']);

		$periodo_aquisitivo   = date('d/m/y', strtotime("+365 days", strtotime($data['resultado'])));

		$data = formatar_data($periodo_aquisitivo);
		$periodo_concessivo = date('d/m/y', strtotime("+365 days", strtotime($data['resultado'])));

		echo json_encode($periodo_aquisitivo . ' no (Periodo Aquisitivo) ou até ' . $periodo_concessivo . ' no (Periodo Concessivo)');
	}

	public function salvar_mensagem() {
		$data = $this->input->post();
		$data['data_cadastro'] = date('Y-m-d');

		$retorno = $this->db->insert('mensagens', $data);
		
        redirect('convenia', 'refresh');
	}

}
