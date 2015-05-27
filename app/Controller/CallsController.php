<?php
App::uses('AppController', 'Controller');
/**
 * Calls Controller
 *
 * @property Call $Call
 */
class CallsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Call->recursive = 0;
		$this->set('calls', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Call->exists($id)) {
			throw new NotFoundException(__('Invalid call'));
		}
		$options = array('conditions' => array('Call.' . $this->Call->primaryKey => $id));
		$this->set('call', $this->Call->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Call->create();
			if ($this->Call->save($this->request->data)) {
				$this->Session->setFlash(__('The call has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The call could not be saved. Please, try again.'));
			}
		}
		$users = $this->Call->User->find('list');
		$types = $this->Call->Type->find('list');
		$this->set(compact('users', 'types'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Call->exists($id)) {
			throw new NotFoundException(__('Invalid call'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Call->save($this->request->data)) {
				$this->Session->setFlash(__('The call has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The call could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Call.' . $this->Call->primaryKey => $id));
			$this->request->data = $this->Call->find('first', $options);
		}
		$users = $this->Call->User->find('list');
		$types = $this->Call->Type->find('list');
		$this->set(compact('users', 'types'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Call->id = $id;
		if (!$this->Call->exists()) {
			throw new NotFoundException(__('Invalid call'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Call->delete()) {
			$this->Session->setFlash(__('Call deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Call was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
