<?php
App::uses('AppController', 'Controller');
require_once(APP . 'Vendor' . DS . 'phpmailer/phpmailer/PHPMailerAutoload.php');
/**
 * Calls Controller
 *
 * @property Call $Call
 */
class CallsController extends AppController {
	public $helpers = array('Html', 'Form');
	public $components = array('RequestHandler');
	public $name = 'Calls';
	public $uses = array('Call', 'Type');
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
		$this->set('call', $this->Call->find('first', $options));	}

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
			echo pr($this->request->data);

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

	public function close($id = null) {
		if (!$this->Call->exists($id)) {
			throw new NotFoundException(__('Invalid call'));
		}

				$options = array('conditions' => array('Call.' . $this->Call->primaryKey => $id));
				$this->request->data = $this->Call->find('first', $options);
		
	
				$mail = new PHPMailer();
	
				$mail->IsSMTP(); // Define que a mensagem será SMTP
	
				$mail->From = 'alvaro_souzac@hotmail.com'; // Seu e-mail
				$mail->FromName = 'Sischamado'; // Seu nome
				$mail->Host = "smtp.live.com";
				$mail->Port = 587;
				$mail->SMTPAuth = true;
				$mail->Username = 'alvaro_souzac@hotmail.com';
				$mail->Password = '';
				$mail->AddAddress($this->request->data['Call']['email']);
				$mail->SMTPSecure = 'tls';
				$mail->IsHTML(true); // Define que o e-mail será enviado como HTML
				$mail->Charset = 'utf-8';
	
				$mail->Subject  = 'Abertura de chamado ' . Configure::read('Settings.title'); // Assunto da mensagem
	
				$mail->Body = htmlentities("Este é um e-mail automático do Sischamado. Você recebeu este e-mail porque abriu um chamado.", ENT_NOQUOTES, "UTF-8");
				$mail->Body .= "<br /><br />";
				$mail->Body .= htmlentities("O seu chamado ja foi atendido", ENT_NOQUOTES, "UTF-8");;
				$mail->Body .= "<br /><br />";
				$mail->Body .= htmlentities("Equipe Sischamado", ENT_NOQUOTES, "UTF-8");

				// Envia o e-mail
				$enviado = $mail->Send();
	
				// Limpa os destinatários e os anexos
				$mail->ClearAllRecipients();
				$mail->ClearAttachments();
	
				// Exibe uma mensagem de resultado
				if ($enviado) {
					$this->Session->setFlash('O chamado foi fechado.', 'default', array('class' => ''));
					$this->redirect(array('controller' => 'calls', 'action' => 'index'));
				} else {
					echo $mail->ErrorInfo;
					$this->Session->setFlash(__('Erro! Não foi possível enviar o e-mail.', 'default', array('class' => '')));
				}
			}

	public function report(){
			$this->set('title_for_layout', Configure::read('Settings.title') . ' - Relatório dos Usuários | ' . Configure::read('Settings.mark'));
			
			$this->paginate = array(
					'fields' => array('Call.type_id','COUNT(*) AS quantidade', 'Type.type_name'),
					'group' => array('Call.type_id'),
					'order' => array('Call.type_id'),
					'limit' => 9999
			);
			
			$this->set('result', $this->paginate());
	}
			
		
			
		
	
}
