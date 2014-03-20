<?php
// Marlon Bochi
class Locais_trabalhoController extends Controller
{
	public function actionIndex()
	{
		$modulo = new Comum();
		$retorno = $modulo->select_todos('local_trabalho', '*');
		$this->render('index', array('locaistrabalho' => $retorno));
	}
	public function actionInsert()
	{
		$modulo = new Comum();
		if(isset($_POST['descricao_local_trabalho'])){
			$ArrayInsert = array('descricao_local_trabalho' => $_POST['descricao_local_trabalho']);
			$retorno = $modulo->insert('local_trabalho', $ArrayInsert);
			if ($retorno == 1){
				session_start();
				$_SESSION['mensagen_modulo'] = 'Registro inserido com sucesso!';
				$this->redirect($this->createUrl('/locaistrabalho'));
			}
		}

		$this->render('insert');
	}
	public function actionUpdate($id)
	{	
		$modulo = new Comum();
		if(isset($_POST['descricao_local_trabalho'])){
			$ArrayColunas = array('descricao_local_trabalho'=> $_POST['descricao_local_trabalho']);
			$Conditions = 'id_local_trabalho = :id';
			$ArrayWhere = array(':id'=> $id);
			$retorno = $modulo->update('local_trabalho', $ArrayColunas, $Conditions, $ArrayWhere);
			if ($retorno == 1){
				session_start();
				$_SESSION['mensagen_modulo'] = 'Registro editado com sucesso!';
				$this->redirect($this->createUrl('/locaistrabalho'));
			}	
		}
		$Conditions = 'id_local_trabalho = :id';
		$ArrayWhere = array(':id'=> $id);
		$retorno = $modulo->select_um('local_trabalho', '*', $Conditions, $ArrayWhere);
		$this->render('update', array('local_trabalho' => $retorno));
	}
	public function actionDelete($id)
	{
		$modulo = new Comum();
		$Conditions = 'id_local_trabalho = :id';
		$ArrayWhere = array(':id' => $id);
		$retorno = $modulo->delete('local_trabalho', $Conditions, $ArrayWhere);
		if ($retorno == 1){
			session_start();
			$_SESSION['mensagen_modulo'] = 'Registro excluido com sucesso!';
			$this->redirect($this->createUrl('/locaistrabalho'));
		}
	}
}