<?php
// Marlon Bochi
class Comum extends CFormModel
{
	public function select_todos($tabela, $select, $order = null)
	{
		$data = Yii::app()->db->createCommand()
						    ->select($select)
						    ->from($tabela)
						    ->order($order)
						    ->queryAll();
		return $data;
	}
	public function select_um($tabela, $select, $Conditions, $ArrayWhere)
	{
		$data = Yii::app()->db->createCommand()
						    ->select($select)
						    ->from($tabela)
						    ->where($Conditions, $ArrayWhere)
						    ->queryAll();
		return $data;
	}
	public function insert($tabela, $ArrayInsert)
	{
		$data = Yii::app()->db->createCommand()->insert($tabela, $ArrayInsert);
		return $data;
	}
	public function update($tabela, $ArrayColunas, $Conditions, $ArrayWhere)
	{
		$data = Yii::app()->db->createCommand()->update($tabela, $ArrayColunas, $Conditions, $ArrayWhere);
		return $data;
	}
	public function delete($tabela, $Conditions, $ArrayWhere)
	{
		$data = Yii::app()->db->createCommand()->delete($tabela, $Conditions, $ArrayWhere);
		return $data;
	}	
}