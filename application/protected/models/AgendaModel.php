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
						    ->where('id_funcionario = :id_funcionario', array(':id_funcionario' => $id_funcionario))
						   	->andWhere('(periodo_inicial_agenda <= ":id1" >= periodo_final_agenda) OR
						   				(periodo_inicial_agenda <= ":id2" >= periodo_final_agenda) OR
						   				(:id1 <= periodo_inicial_agenda and  periodo_final_agenda >= :id2)', array(':id1'=> $perido_inicial, ':id2'=> $periodo_final))			
						    ->queryAll();
		return $data;
	}
	public function verifica_data_vaga_update($id_funcionario, $perido_inicial, $periodo_final, $id_agenda){
		$data = Yii::app()->db->createCommand()
						    ->select('*')
						    ->from('agenda')
						    ->where('id_funcionario = :id_funcionario AND id_agenda <> :id_agenda', array(':id_funcionario' => $id_funcionario, ':id_agenda' => $id_agenda))
						   	->andWhere('(periodo_inicial_agenda <= ":id1" >= periodo_final_agenda) OR
						   				(periodo_inicial_agenda <= ":id2" >= periodo_final_agenda) OR
						   				(:id1 <= periodo_inicial_agenda and  periodo_final_agenda >= :id2)', array(':id1'=> $perido_inicial, ':id2'=> $periodo_final))							    
						    ->queryAll();
		return $data;
	}
}