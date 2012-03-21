<?
class Post extends AppModel{
	
	public $name = 'Post';
	
	public $validate = array(
		'id' => array(
			'rule' => 'numeric',
			'message' => 'Deve ser numero'
		)
	);
	
	
	public function publicado(){
		$conditions = array('conditions' => array('publicado' => true));
		$results = $this->find('all',$conditions);
		return $results;
	}
}
?>