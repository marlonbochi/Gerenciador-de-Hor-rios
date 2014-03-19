<?php
// Marlon Bochi
class AtividadesController extends Controller
{
	public function actionIndex()
	{
		$modulo = new Comum();
		$retorno = $modulo->select_todos('atividade', '*');
		$this->render('index', array('atividades' => $retorno));
	}
	public function actionInsert()
	{
		$modulo = new Comum();
		if(isset($_POST['descricao_atividade'])){
			$ArrayInsert = array('descricao_atividade' => $_POST['descricao_atividade']);
			$retorno = $modulo->insert('atividade', $ArrayInsert);
			if ($retorno == 1){
				session_start();
				$_SESSION['mensagen_modulo'] = 'Registro inserido com sucesso!';
				$this->redirect($this->createUrl('/atividades'));
			}
		}

		$this->render('insert');
	}
	public function actionUpdate($id)
	{	
		$modulo = new Comum();
		if(isset($_POST['descricao_atividade'])){
			$ArrayColunas = array('descricao_atividade'=> $_POST['descricao_atividade']);
			$Conditions = 'id_atividade = :id';
			$ArrayWhere = array(':id'=> $id);
			$retorno = $modulo->update('atividade', $ArrayColunas, $Conditions, $ArrayWhere);
			if ($retorno == 1){
				session_start();
				$_SESSION['mensagen_modulo'] = 'Registro editado com sucesso!';
				$this->redirect($this->createUrl('/atividades'));
			}	
		}
		$Conditions = 'id_atividade = :id';
		$ArrayWhere = array(':id'=> $id);
		$retorno = $modulo->select_um('atividade', '*', $Conditions, $ArrayWhere);
		$this->render('update', array('atividade' => $retorno));
	}
	public function actionDelete($id)
	{
		$modulo = new Comum();
		$Conditions = 'id_atividade = :id';
		$ArrayWhere = array(':id' => $id);
		$retorno = $modulo->delete('atividade', $Conditions, $ArrayWhere);
		if ($retorno == 1){
			session_start();
			$_SESSION['mensagen_modulo'] = 'Registro excluido com sucesso!';
			$this->redirect($this->createUrl('/atividades'));
		}
	}
}