<?
class PostFixture extends CakeTestFixture{
	
	public $fields = array(
		'id' => array('type' => 'integer','key' => 'primary'),
		'titulo' => array('type' => 'string','length' => 50,'null' => false),
		'texto' => 'text',
		'created' => 'datetime',
		'modified' => 'datetime',
		'publicado' => 'boolean'
	);
	
	public $records = array(
		array('id' => 1,'titulo' => 'Teste 1','texto' => 'teste 1','created' => '2012-01-05 02:17:35','modified' => '2012-01-05 02:20:13','publicado' => true),
		array('id' => 2,'titulo' => 'Teste 2','texto' => 'teste 2','created' => '2012-01-05 02:18:32','modified' => '2012-01-05 02:21:40','publicado' => false),
		array('id' => 3,'titulo' => 'Teste 3','texto' => 'teste 3','created' => '2012-01-05 02:19:43','modified' => '2012-01-05 02:23:05','publicado' => true),
	);
	
}
?>