<?php

class Controller extends MyTpl{
	
	public function run(){
		$method=$_GET["a"];
		if(method_exists($this, $method)){
			$this->$method();
		}

	}

	public function _ajaxReturn($info,$status,$url=''){
		switch ($status) {
			case 'success':
				$data['type'] = 4;
				break;
			case 'error':
				$data['type'] = 6;
				break;
			case 'prompt':
				$data['type'] = 5;
				break;

			default:
				$data['type'] = 1;
				break;
		}
		$data['message'] = $info;
		$data['url'] = $url;

		echo json_encode($data);
		exit();

	}

}
