<?
App::uses('Post','Model');

class PostTestCase extends CakeTestCase{
	
	public $fixtures = array('app.post');
		
	public function setUp(){
		parent::setUp();
		$this->Post = ClassRegistry::init('Post');
	}
	
	public function testFind(){
		$result = $this->Post->find('all');
		$expected = array(
			array('Post' => array('id' => 1,'titulo' => 'Teste 1','texto' => 'teste 1','created' => '2012-01-05 02:17:35','modified' => '2012-01-05 02:20:13','publicado' => true)),
			array('Post' => array('id' => 2,'titulo' => 'Teste 2','texto' => 'teste 2','created' => '2012-01-05 02:18:32','modified' => '2012-01-05 02:21:40','publicado' => false)),
			array('Post' => array('id' => 3,'titulo' => 'Teste 3','texto' => 'teste 3','created' => '2012-01-05 02:19:43','modified' => '2012-01-05 02:23:05','publicado' => true)),
		);
		$this->assertEqual($result, $expected);
	}
	
	public function testPublicado(){
		$result = $this->Post->publicado();
		$expected = array(
			array('Post' => array('id' => 1,'titulo' => 'Teste 1','texto' => 'teste 1','created' => '2012-01-05 02:17:35','modified' => '2012-01-05 02:20:13','publicado' => true)),
			array('Post' => array('id' => 3,'titulo' => 'Teste 3','texto' => 'teste 3','created' => '2012-01-05 02:19:43','modified' => '2012-01-05 02:23:05','publicado' => true)),
		);
		$this->assertEqual($result, $expected);
	}
}
?>