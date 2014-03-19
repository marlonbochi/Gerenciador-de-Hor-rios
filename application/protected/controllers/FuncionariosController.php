<?php
// Marlon Bochi
class FuncionariosController extends Controller
{
	public function actionIndex()
	{
		$modulo = new Comum();
		$retorno = $modulo->select_todos('funcionario', '*');
		$this->render('index', array('funcionarios' => $retorno));
	}
	public function actionInsert()
	{
		$modulo = new Comum();
		if(isset($_POST['nome_funcionario'])){
			$ArrayInsert = array('nome_funcionario' => $_POST['nome_funcionario']);
			$retorno = $modulo->insert('funcionario', $ArrayInsert);
			if ($retorno == 1){
				session_start();
				$_SESSION['mensagen_modulo'] = 'Registro inserido com sucesso!';
				$this->redirect($this->createUrl('/funcionarios'));
			}
		}

		$this->render('insert');
	}
	public function actionUpdate($id)
	{	
		$modulo = new Comum();
		if(isset($_POST['nome_funcionario'])){
			$ArrayColunas = array('nome_funcionario'=> $_POST['nome_funcionario']);
			$Conditions = 'id_funcionario = :id';
			$ArrayWhere = array(':id'=> $id);
			$retorno = $modulo->update('funcionario', $ArrayColunas, $Conditions, $ArrayWhere);
			if ($retorno == 1){
				session_start();
				$_SESSION['mensagen_modulo'] = 'Registro editado com sucesso!';
				$this->redirect($this->createUrl('/funcionarios'));
			}	
		}
		$Conditions = 'id_funcionario = :id';
		$ArrayWhere = array(':id'=> $id);
		$retorno = $modulo->select_um('funcionario', '*', $Conditions, $ArrayWhere);
		$this->render('update', array('funcionario' => $retorno));
	}
	public function actionDelete($id)
	{
		$modulo = new Comum();
		$Conditions = 'id_funcionario = :id';
		$ArrayWhere = array(':id' => $id);
		$retorno = $modulo->delete('funcionario', $Conditions, $ArrayWhere);
		if ($retorno == 1){
			session_start();
			$_SESSION['mensagen_modulo'] = 'Registro excluido com sucesso!';
			$this->redirect($this->createUrl('/funcionarios'));
		}
	}

}