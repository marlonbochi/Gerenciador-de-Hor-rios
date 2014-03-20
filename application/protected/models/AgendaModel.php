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
	public function verifica_data_vaga($id_funcionario, $perido_inicial, $periodo_final){
		$data = Yii::app()->db->createCommand()
						    ->select('*')
						    ->from('agenda')
						    ->where('id_funcionario = '.$id_funcionario)
						   	->andWhere('(periodo_inicial_agenda BETWEEN "'.$perido_inicial.'" AND  "'.$periodo_final.'") OR
						   				(periodo_final_agenda BETWEEN "'.$perido_inicial.'" AND  "'.$periodo_final.'") OR
						   				("'.$perido_inicial.'" >= periodo_inicial_agenda AND periodo_final_agenda >= "'.$periodo_final.'")')						
						    ->queryAll();
		return $data;
	}
	public function verifica_data_vaga_update($id_funcionario, $perido_inicial, $periodo_final, $id_agenda){
		$data = Yii::app()->db->createCommand()
						    ->select('*')
						    ->from('agenda')
						    ->where('id_funcionario = '.$id_funcionario.' AND id_agenda <> '.$id_agenda)
						   	->andWhere('(periodo_inicial_agenda BETWEEN "'.$perido_inicial.'" AND  "'.$periodo_final.'") OR
						   				(periodo_final_agenda BETWEEN "'.$perido_inicial.'" AND  "'.$periodo_final.'") OR
						   				("'.$perido_inicial.'" >= periodo_inicial_agenda AND periodo_final_agenda >= "'.$periodo_final.'")')							    
						    ->queryAll();
		return $data;
	}
}