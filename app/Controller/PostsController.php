<?
class PostsController extends AppController{
	
	public $name = 'Posts';

	public function index(){
		$posts = $this->Post->find('all');
		$this->set(compact('posts'));
		
	}
	
	public function view($id = null){
		if($id){
			return $this->Post->read(null,$id);;
		}
	}

	public function add(){
		if($this->data){
			if($this->Post->save())
				$this->Session->setFlash('Cadastrado com sucesso!');
			$this->data = array();
		}
	}
	
	public function edit($id = null){
		if($this->data){
			if($this->Post->save($this->data))
				$this->Session->setFlash('Editado com sucesso!');
			$this->redirect(array('controller' => 'posts','action' => 'index'));
		}else{
			$this->data = $this->Post->read(null,$id);
		}
	}
	
	public function delete($id = null){
		if($id){
			if($this->Post->delete($id))
				$this->Session->setFlash('Deletado com sucesso!');
			$this->redirect(array('controller' => 'posts','action' => 'index'));
		}
	}
		
	public function beforeFilter(){
		if(!method_exists($this, $this->params->action)){
			$post = self::view($this->params->action);
			$this->set(compact('post'));
			
			$this->request['action'] = 'view';
			$this->render('view');
		}
	}
	
}
?>