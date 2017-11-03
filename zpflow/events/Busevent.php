<?php
namespace app\events;

class Busevent extends \yii\base\Component{
	const CREATE_BUS_TABLE = 'create_bus_table';
	public function create_bus_table(){
		$this->trigger(self::CREATE_BUS_TABLE);
	}
}
