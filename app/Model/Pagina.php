<?php
class Pagina extends AppModel {
	public $name = 'Pagina';
	public $actsAs = array('Tree');
	public $hasMany= array('Slider'=>array(
		'order'=>array('Slider.lft ASC')
	));
	public $validate = array(
		'titulo' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'O título não pode ficar em branco!'
            )
        ),
		'slug' => array(
            'unique' => array(
                'rule' => array('isUnique'),
                'message' => 'A URL tem que ser única, se ela foi preenchida automáticamente pelo sistema, tente outra!'
            )
        )
	);
}