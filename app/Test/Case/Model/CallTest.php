<?php
App::uses('Call', 'Model');

/**
 * Call Test Case
 *
 */
class CallTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.call',
		'app.user',
		'app.type'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Call = ClassRegistry::init('Call');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Call);

		parent::tearDown();
	}

}
