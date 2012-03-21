<h1>Editar Post</h1>

<?	echo $this->Form->create('Post',array('action' => 'edit')),
		 $this->Form->input('id'),
		 $this->Form->input('titulo'),
		 $this->Form->input('texto'),
		 $this->Form->end('Editar');?>