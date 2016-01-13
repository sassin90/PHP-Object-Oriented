<?php

namespace core\HTML;

class BootstrapForm extends form{


	protected function surround($html){

		return "<div class=\"form-group\">{$html}</div>";
	}


	public function input($name, $label, $options=[]){

		$type = isset($options['type']) ? $options['type'] : 'text';

		$label = '<label>'. $label .'</label>';

		if($type==='textarea'){

			$input = '<textarea rows="4" name="'. $name .'" class="form-control">'. $this->getValue($name) .'</textarea>';

		} else {

			$input = '<input type="'. $type .'" name="'. $name .'" value="'. $this->getValue($name) .'" class="form-control">';
		}

		return $this->surround($label . $input);
	}

	
	public function select($name, $label, $options){

		$label = '<label>'. $label .'</label>';

		$input = '<select class="form-control" name="'. $name .'" >';

		foreach ($options as $k => $v) {

			$attributes = '';

			if($k==$this->getValue($name)){

				$attributes = ' selected';
			}

			$input .= "<option value='$k' $attributes>$v</option>";
		}

		$input .= '</select>';

		return $this->surround($label . $input);
	}


	public function submit($name){

		return $this->surround('<button type="submit" class="btn btn-primary">'. $name .'</button>');
	}
}