<h1>Novo Post</h1>

<?	echo $this->Form->create('Post',array('action' => 'add','type' => 'file')),
		 $this->Form->input('titulo'),
		// $this->Form->input('arquivo',array('type' => 'file')),
		 //$this->Form->input('arquivo1',array('type' => 'file')),
		 /*$this->Form->input('Foto.arquivo.1',array('type' => 'file')),
		 $this->Form->input('Foto.comentario.1'),
		 $this->Form->input('Foto.arquivo.2',array('type' => 'file')),
		 $this->Form->input('Foto.comentario.2'),
		 $this->Form->input('Foto.arquivo.3',array('type' => 'file')),
		 $this->Form->input('Foto.comentario.3'),*/
		 $this->Form->input('texto'),
		 $this->Form->end('Cadastrar');?>