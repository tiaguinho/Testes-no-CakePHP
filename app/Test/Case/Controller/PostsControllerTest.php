<?
class PostsControllerTest extends ControllerTestCase{
	
	public $fixtures = array('app.post');
	
	public function testIndex(){
		$this->testAction('posts/index/');
		$expected = array(
			array('Post' => array('id' => 1,'titulo' => 'Teste 1','texto' => 'teste 1','created' => '2012-01-05 02:17:35','modified' => '2012-01-05 02:20:13','publicado' => true)),
			array('Post' => array('id' => 2,'titulo' => 'Teste 2','texto' => 'teste 2','created' => '2012-01-05 02:18:32','modified' => '2012-01-05 02:21:40','publicado' => false)),
			array('Post' => array('id' => 3,'titulo' => 'Teste 3','texto' => 'teste 3','created' => '2012-01-05 02:19:43','modified' => '2012-01-05 02:23:05','publicado' => true)),
		);
		$this->assertEqual($this->controller->viewVars['posts'], $expected);
	}
	
	public function testView(){
		$this->testAction('posts/view/1');
		$expected = array('Post' => array('id' => 1,'titulo' => 'Teste 1','texto' => 'teste 1','created' => '2012-01-05 02:17:35','modified' => '2012-01-05 02:20:13','publicado' => true));
		$this->assertEqual($this->controller->viewVars['post'], $expected);
	}
	
	public function testAdd(){
		$data = array(
			'Post' => array(
				'titulo' => 'titulo',
				'texto' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
			)		
		);
		$results = $this->testAction('posts/add',array('data' => $data,'method' => 'post'));
		pr($this);exit;
		
		debug($results);			
	}
	
	public function testEdit(){
		$results1 = $this->testAction('posts/edit/1');
		debug($results1);
		
		$data = array(
			'Post' => array(
				'id' => 1,
				'titulo' => 'teste update',
				'texto' => 'teste de update do texto'
			)
		);		
		$results2 = $this->testAction('posts/edit',array('data' => $data,'method' => 'post'));
		debug($results2);
	}
	
	public function testDelete(){
		$results = $this->testAction('posts/delete/1');
		debug($results);
	}
	
}
?>