<?php

class Slider extends AppModel{
	public $name = 'Slider';
	public $actsAs = array('Tree');
	public $belongsTo = 'Pagina';
}