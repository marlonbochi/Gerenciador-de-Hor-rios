<?php
// Marlon Bochi
class AgendaController extends Controller
{
	public function actionIndex()
	{
		$modulo = new AgendaModel();
		$retorno = $modulo->select_todos_agenda('agenda', '*');
		$this->render('index', array('agenda' => $retorno));
	}
	public function actionInsert()
	{	
		session_start();
		$modulo = new Comum();
		if(isset($_POST['data_inicial_agenda'])){
			//conversão da data inicial
			$data_inicial = date("Y-m-d", strtotime(str_replace('/', '-', $_POST['data_inicial_agenda']))).' '.$_POST['hora_inicial_agenda'].':00';
			$date = new DateTime($data_inicial);
			$periodo_inicial_agenda = $date->format('Y-m-d H:i:s');
			//conversão da data final
			$data_final = date("Y-m-d", strtotime(str_replace('/', '-', $_POST['data_final_agenda']))).' '.$_POST['hora_final_agenda'].':00';
			$date = new DateTime($data_final);
			$periodo_final_agenda = $date->format('Y-m-d H:i:s');
			if($periodo_inicial_agenda < $periodo_final_agenda){
				$modulo_agenda = new AgendaModel();
				$retorno_data = $modulo_agenda->verifica_data_vaga($_POST['id_funcionario'], $periodo_inicial_agenda, $periodo_final_agenda);

				if(empty($retorno_data)){
					$ArrayInsert = array('id_funcionario' => $_POST['id_funcionario'],
										 'id_atividade' => $_POST['id_atividade'],
										 'id_local_trabalho' => $_POST['id_local_trabalho'],
										 'periodo_inicial_agenda' => $periodo_inicial_agenda,
										 'periodo_final_agenda' => $periodo_final_agenda
										 );
					$modulo->insert('agenda', $ArrayInsert);
					$_SESSION['mensagen_modulo'] = 'Registro inserido com sucesso!';
					$this->redirect($this->createUrl('/agenda'));
					
				}else{
					$_SESSION['mensagen_modulo_error'] = 'Período informado conflita com um período já cadastrado para esse funcionário!';
				}
			}else{
				$_SESSION['mensagen_modulo_error'] = 'Horário Inicial não pode ser maior que Horário Final!';
			}
		}
		
		$funcionarios = $modulo->select_todos('funcionario', '*', 'nome_funcionario ASC');
		$atividades = $modulo->select_todos('atividade', '*', 'descricao_atividade ASC');
		$locais_trabalho = $modulo->select_todos('local_trabalho', '*', 'descricao_local_trabalho ASC');
		$this->render('insert', array('funcionarios' => $funcionarios, 
									  'atividades' => $atividades,
									  'locais_trabalho' => $locais_trabalho));
	}
	public function actionUpdate($id)
	{	
		session_start();
		$modulo = new Comum();
		if(isset($_POST['data_inicial_agenda'])){
			//conversão da data inicial
			$data_inicial = date("Y-m-d", strtotime(str_replace('/', '-', $_POST['data_inicial_agenda']))).' '.$_POST['hora_inicial_agenda'].':00';
			$date = new DateTime($data_inicial);
			$periodo_inicial_agenda = $date->format('Y-m-d H:i:s');
			//conversão da data final
			$data_final = date("Y-m-d", strtotime(str_replace('/', '-', $_POST['data_final_agenda']))).' '.$_POST['hora_final_agenda'].':00';
			$date = new DateTime($data_final);
			$periodo_final_agenda = $date->format('Y-m-d H:i:s');

			if($periodo_inicial_agenda < $periodo_final_agenda){
				$modulo_agenda = new AgendaModel();
				$retorno_data = $modulo_agenda->verifica_data_vaga_update($_POST['id_funcionario'], $periodo_inicial_agenda, $periodo_final_agenda, $id);

				if(empty($retorno_data)){
					$ArrayColunas = array('id_funcionario' => $_POST['id_funcionario'],
										 'id_atividade' => $_POST['id_atividade'],
										 'id_local_trabalho' => $_POST['id_local_trabalho'],
										 'periodo_inicial_agenda' => $periodo_inicial_agenda,
										 'periodo_final_agenda' => $periodo_final_agenda
										 );
					$Conditions = 'id_agenda = :id';
					$ArrayWhere = array(':id'=> $id);
					$modulo->update('agenda', $ArrayColunas, $Conditions, $ArrayWhere);
					$_SESSION['mensagen_modulo'] = 'Registro editado com sucesso!';
					$this->redirect($this->createUrl('/agenda'));
				}else{
					$_SESSION['mensagen_modulo_error'] = 'Período informado conflita com um período já cadastrado para esse funcionário!';
				}				
			}else{
				$_SESSION['mensagen_modulo_error'] = 'Horário Inicial não pode ser maior que Horário Final!';
			}
		}
		$Conditions = 'id_agenda = :id';
		$ArrayWhere = array(':id'=> $id);
		$retorno = $modulo->select_um('agenda', '*', $Conditions, $ArrayWhere);
		$funcionarios = $modulo->select_todos('funcionario', '*', 'nome_funcionario ASC');
		$atividades = $modulo->select_todos('atividade', '*', 'descricao_atividade ASC');
		$locais_trabalho = $modulo->select_todos('local_trabalho', '*', 'descricao_local_trabalho ASC');
		$this->render('update', array('agenda' => $retorno,
									  'funcionarios' => $funcionarios,
									  'atividades' => $atividades,
									  'locais_trabalho' => $locais_trabalho));
	}
	public function actionDelete($id)
	{
		$modulo = new Comum();
		$Conditions = 'id_agenda = :id';
		$ArrayWhere = array(':id' => $id);
		$retorno = $modulo->delete('agenda', $Conditions, $ArrayWhere);
		if ($retorno == 1){
			session_start();
			$_SESSION['mensagen_modulo'] = 'Registro excluido com sucesso!';
			$this->redirect($this->createUrl('/agenda'));
		}
	}
}