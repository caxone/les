<?php
App::uses('AppModel', 'Model');
/**
 * Type Model
 *
 * @property Call $Call
 */
class Type extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $displayField = 'type_name';
	public $hasMany = array(
		'Call' => array(
			'className' => 'Call',
			'foreignKey' => 'type_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
