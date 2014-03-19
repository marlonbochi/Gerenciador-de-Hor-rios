<?php
// Marlon Bochi
class AgendaModel extends CFormModel
{
	public function select_todos_agenda(){
		$data = Yii::app()->db->createCommand()
						    ->select('*, local_trabalho.descricao_local_trabalho as local_trabalho, funcionario.nome_funcionario as funcionario, atividade.descricao_atividade as atividade')
						    ->from('agenda')
						    ->leftjoin('funcionario', 'funcionario.id_funcionario = agenda.id_funcionario')
						    ->leftjoin('local_trabalho', 'local_trabalho.id_local_trabalho = agenda.id_local_trabalho')
						    ->leftjoin('atividade', 'atividade.id_atividade = agenda.id_atividade')
						    ->queryAll();
		return $data;
	}
}