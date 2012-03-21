<?
/**
* Classe Upload
* Essa é a classe utilizada para upload de arquivos no CakePHP
* @author Tiago Temporim <tiago@portalphp.org>
* @version 0.1
* @copyright Copyright (c) 2012, Tiago Temporim
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*/
class UploadComponent extends Object{
	
	public $name = 'Upload';
	
	/*
	 * @access private
	 * @name $dir
	 */
	private $dir = '';
	
	/*
	 * @access private
	 * @name $model 
	 */
	private $model = '';
	
	/*
	 * @access private
	 * @name $model_name
	 */
	private $model_name = '';
	
	/*
	 * @access private
	 * @name $model_related
	 */
	private $model_related = '';
	
	/*
	 * @access private
	 * @name $data
	 */
	private $data = '';
	
	/*
	 * @access public
	 * @name $allow
	 */
	public $allow = array();
	
	/*
	 * @access private
	 * @name $allowed
	 */
	private $allowed = true;
	
	/*
	 * @access public
	 * @name $size_limit
	 */
	public $size_limit = null;
	
	/*
	 * @access public
	 * @name $fields
	 */
	public $fields = array();
	
	/*
	 * @access private
	 * @name $file
	 */
	private $files = array();
	
	/*
	 * @access private
	 * @name $file
	 */
	private $file = array();
	
	/*
	 * @access private
	 * @name $file_name
	 */
	private $file_name = '';
	
	/*
	 * @access private
	 * @name $mimeTypes
	 */
	private $mimeTypes = array(
		'ai' => 'application/postscript',
        'bcpio' => 'application/x-bcpio',
		'bin' => 'application/octet-stream',
		'ccad' => 'application/clariscad',
		'cdf' => 'application/x-netcdf',
		'class' => 'application/octet-stream',
		'cpio' => 'application/x-cpio',
		'cpt' => 'application/mac-compactpro',
		'csh' => 'application/x-csh',
		'csv' => Array
		    (
		        0 => 'text/csv',
		        1 => 'application/vnd.ms-excel',
		        2 => 'text/plain',
		    ),
		'dcr' => 'application/x-director',
		'dir' => 'application/x-director',
		'dms' => 'application/octet-stream',
		'doc' => 'application/msword',
		'drw' => 'application/drafting',
		'dvi' => 'application/x-dvi',
		'dwg' => 'application/acad',
		'dxf' => 'application/dxf',
		'dxr' => 'application/x-director',
		'eot' => 'application/vnd.ms-fontobject',
		'eps' => 'application/postscript',
		'exe' => 'application/octet-stream',
		'ez' => 'application/andrew-inset',
		'flv' => 'video/x-flv',
		'gtar' => 'application/x-gtar',
		'gz' => 'application/x-gzip',
		'bz2' => 'application/x-bzip',
		'7z' => 'application/x-7z-compressed',
		'hdf' => 'application/x-hdf',
		'hqx' => 'application/mac-binhex40',
		'ico' => 'image/vnd.microsoft.icon',
		'ips' => 'application/x-ipscript',
		'ipx' => 'application/x-ipix',
		'js' => 'text/javascript',
		'latex' => 'application/x-latex',
		'lha' => 'application/octet-stream',
		'lsp' => 'application/x-lisp',
		'lzh' => 'application/octet-stream',
		'man' => 'application/x-troff-man',
		'me' => 'application/x-troff-me',
		'mif' => 'application/vnd.mif',
		'ms' => 'application/x-troff-ms',
		'nc' => 'application/x-netcdf',
		'oda' => 'application/oda',
		'otf' => 'font/otf',
		'pdf' => 'application/pdf',
		'pgn' => 'application/x-chess-pgn',
		'pot' => 'application/mspowerpoint',
		'pps' => 'application/mspowerpoint',
		'ppt' => 'application/mspowerpoint',
		'ppz' => 'application/mspowerpoint',
		'pre' => 'application/x-freelance',
		'prt' => 'application/pro_eng',
		'ps' => 'application/postscript',
		'roff' => 'application/x-troff',
		'scm' => 'application/x-lotusscreencam',
		'set' => 'application/set',
		'sh' => 'application/x-sh',
		'shar' => 'application/x-shar',
		'sit' => 'application/x-stuffit',
		'skd' => 'application/x-koan',
		'skm' => 'application/x-koan',
		'skp' => 'application/x-koan',
		'skt' => 'application/x-koan',
		'smi' => 'application/smil',
		'smil' => 'application/smil',
		'sol' => 'application/solids',
		'spl' => 'application/x-futuresplash',
		'src' => 'application/x-wais-source',
		'step' => 'application/STEP',
		'stl' => 'application/SLA',
		'stp' => 'application/STEP',
		'sv4cpio' => 'application/x-sv4cpio',
		'sv4crc' => 'application/x-sv4crc',
		'svg' => 'image/svg+xml',
		'svgz' => 'image/svg+xml',
		'swf' => 'application/x-shockwave-flash',
		't' => 'application/x-troff',
		'tar' => 'application/x-tar',
		'tcl' => 'application/x-tcl',
		'tex' => 'application/x-tex',
		'texi' => 'application/x-texinfo',
		'texinfo' => 'application/x-texinfo',
		'tr' => 'application/x-troff',
		'tsp' => 'application/dsptype',
		'ttf' => 'font/ttf',
		'unv' => 'application/i-deas',
		'ustar' => 'application/x-ustar',
		'vcd' => 'application/x-cdlink',
		'vda' => 'application/vda',
		'xlc' => 'application/vnd.ms-excel',
		'xll' => 'application/vnd.ms-excel',
		'xlm' => 'application/vnd.ms-excel',
		'xls' => 'application/vnd.ms-excel',
		'xlw' => 'application/vnd.ms-excel',
		'zip' => 'application/zip',
		'aif' => 'audio/x-aiff',
		'aifc' => 'audio/x-aiff',
		'aiff' => 'audio/x-aiff',
		'au' => 'audio/basic',
		'kar' => 'audio/midi',
		'mid' => 'audio/midi',
		'midi' => 'audio/midi',
		'mp2' => 'audio/mpeg',
		'mp3' => 'audio/mpeg',
		'mpga' => 'audio/mpeg',
		'ogg' => 'audio/ogg',
		'ra' => 'audio/x-realaudio',
		'ram' => 'audio/x-pn-realaudio',
		'rm' => 'audio/x-pn-realaudio',
		'rpm' => 'audio/x-pn-realaudio-plugin',
		'snd' => 'audio/basic',
		'tsi' => 'audio/TSP-audio',
		'wav' => 'audio/x-wav',
		'asc' => 'text/plain',
		'c' => 'text/plain',
		'cc' => 'text/plain',
		'css' => 'text/css',
		'etx' => 'text/x-setext',
		'f' => 'text/plain',
		'f90' => 'text/plain',
		'h' => 'text/plain',
		'hh' => 'text/plain',
		'html' => Array
		    (
		        0 => 'text/html',
		        1 => '*/*',
		    ),
		'htm' => Array
		    (
		        0 => 'text/html',
		        1 => '*/*',
		    ),
		'm' => 'text/plain',
		'rtf' => 'text/rtf',
		'rtx' => 'text/richtext',
		'sgm' => 'text/sgml',
		'sgml' => 'text/sgml',
		'tsv' => 'text/tab-separated-values',
		'tpl' => 'text/template',
		'txt' => 'text/plain',
		'text' => 'text/plain',
		'xml' => Array
		    (
		        0 => 'application/xml',
		        1 => 'text/xml',
		    ),
		'avi' => 'video/x-msvideo',
		'fli' => 'video/x-fli',
		'mov' => 'video/quicktime',
		'movie' => 'video/x-sgi-movie',
		'mpe' => 'video/mpeg',
		'mpeg' => 'video/mpeg',
		'mpg' => 'video/mpeg',
		'qt' => 'video/quicktime',
		'viv' => 'video/vnd.vivo',
		'vivo' => 'video/vnd.vivo',
		'gif' => 'image/gif',
		'ief' => 'image/ief',
		'jpe' => 'image/jpeg',
		'jpeg' => 'image/jpeg',
		'jpg' => 'image/jpeg',
		'pbm' => 'image/x-portable-bitmap',
		'pgm' => 'image/x-portable-graymap',
		'png' => 'image/png',
		'pnm' => 'image/x-portable-anymap',
		'ppm' => 'image/x-portable-pixmap',
		'ras' => 'image/cmu-raster',
		'rgb' => 'image/x-rgb',
		'tif' => 'image/tiff',
		'tiff' => 'image/tiff',
		'xbm' => 'image/x-xbitmap',
		'xpm' => 'image/x-xpixmap',
		'xwd' => 'image/x-xwindowdump',
		'ice' => 'x-conference/x-cooltalk',
		'iges' => 'model/iges',
		'igs' => 'model/iges',
		'mesh' => 'model/mesh',
		'msh' => 'model/mesh',
		'silo' => 'model/mesh',
		'vrml' => 'model/vrml',
		'wrl' => 'model/vrml',
		'mime' => 'www/mime',
		'pdb' => 'chemical/x-pdb',
		'xyz' => 'chemical/x-pdb',
		'javascript' => 'text/javascript',
		'json' => 'application/json',
		'form' => 'application/x-www-form-urlencoded',
		'file' => 'multipart/form-data',
		'xhtml' => Array
		    (
		        0 => 'application/xhtml+xml',
		        1 => 'application/xhtml',
		        2 => 'text/xhtml',
		    ),
		'xhtml-mobile' => 'application/vnd.wap.xhtml+xml',
		'rss' => 'application/rss+xml',
		'atom' => 'application/atom+xml',
		'amf' => 'application/x-amf',
		'wap' => Array
		    (
		        0 => 'text/vnd.wap.wml',
		        1 => 'text/vnd.wap.wmlscript',
		        2 => 'image/vnd.wap.wbmp',
		    ),
		'wml' => 'text/vnd.wap.wml',
		'wmlscript' => 'text/vnd.wap.wmlscript',
		'wbmp' => 'image/vnd.wap.wbmp',
	);
	
	/*
	 * @access private
	 * @name $sucess
	 */
	private $success = false;
		
	/*
	 * @access public
	 * @params Controller $controller
	 * @params Array $settings
	 * @return void 
	 */ 
	 public function initialize($controller, $settings = array()){
	 	$this->model_name = $controller->modelClass;
		$this->dir = ROOT . DS . APP_DIR . DS . WEBROOT_DIR . DS . 'files';
		$this->fields = array(
			'file' => array('file_name'),
			'size' => array('size'),
			'type' => array('type')
		);
	 }
	 
	 /*
	  * @access public
	  * @params Controller $controller
	  * @return void
	  */
	 public function startup($controller){
	 	App::import('Model',$controller->modelClass);
	 	$this->model = new $controller->modelClass();
				
		$this->data = $controller->request->data;
		
		$this->file_name = str_replace(' ', '_', substr(microtime(),2));
	 }
	 
	 /*
	  * @access public
	  * @params Controller $controller
	  * @return void
	  */
	 public function beforeRender($controller){
	 	
	 }
	 
	 /*
	  * @access public
	  * @params Controller $controller
	  * @return void
	  */
	 public function shutdown($controller){
	 	
	 }
	 
	 /*
	 * @access private
	 * @return Boolean
	 */	 
	 private function add(){
	 	$saved = $this->model->save($this->data);
		if($saved)
			$this->data[$this->model_name]['id'] = $this->model->getLastInsertID();
		
		return $saved;
	 }
	 
	 /*
	  * @access private
	  * @params Array $ext
	  * @return void
	  */
	 private function is_allowed($ext = null){
	 	$allow = FALSE;
		
	 	if(in_array($ext, $this->allow)){
	 		$mimes = $this->mimeTypes[$ext];
			
			if(is_array($mimes)){
				foreach($mimes as $mime){
					if($mime == $this->file['type']){
						$allow = TRUE;
						break;
					}
				}
			}else{
				if($mimes == $this->file['type'])
					$allow = TRUE;	
			}			
	 	}
		return $allow;
	 }
	 
	 /*
	  * @access public
	  * @params String $dir
	  * @return void
	  */
	 public function setDirectory($dir){
	 	$this->dir = ROOT . DS . APP_DIR . DS . WEBROOT_DIR . DS . $dir;
	 }
	
	 /*
	  * @access private
	  * @params Array $file
	  * @params String $key
	  * @return Array or void
	  */
	 private function upload($file = null,$key = 0){
	 	$this->file = $file ? $file : $this->data[$this->model_name][$this->fields['file'][$key]];
		
		$ext = array_reverse(explode('.', $this->file['name']));
		$this->file_name .= '.'.$ext[0];
		
		if($this->allow){
			$this->allowed = self::is_allowed($ext[0]);
			if(!$this->allowed)
				throw new Exception('Mime Type não permitido');
		}
		
		if($this->size_limit){
			$this->allowed = $this->file['size'] <= $this->size_limit ? true : false;
			if(!$this->allowed)
				throw new Exception('O arquivo é maior que o limite permitido!');
		}
		
		if($this->allowed){
			if(move_uploaded_file($this->file['tmp_name'], $this->dir . DS . $this->file_name)){
				if($this->model_related){
					$data = array(
						$this->model->hasMany[$this->model_related]['foreignKey'] => $this->data[$this->model_name]['id'],
						$this->fields['file'][0] => $this->file_name,
					);
					
					if(isset($this->fields['size'][0]))
						$data[$this->fields['size'][0]] = $this->file['size'];
					
					if(isset($this->fields['type'][0]))
						$data[$this->fields['type'][0]] = $this->file['type'];
					
					foreach($this->data[$this->model_related] as $collumn => $values){
						if(!in_array($collumn,$this->fields['file']))
							$data[$collumn] = $values[$key];
					}
					
					return $data;
				}else{
					$this->data[$this->model_name][$this->fields['file'][$key]] = $this->file_name;
				
					if(isset($this->fields['size'][$key]))
						$this->data[$this->model_name][$this->fields['size'][$key]] = $this->file['size'];
					
					if(isset($this->fields['type'][$key]))
						$this->data[$this->model_name][$this->fields['type'][$key]] = $this->file['type'];					
				}
			}else{
				throw new Exception('Erro ao enviar o arquivo!');
			}
		}		
	 }

	/*
	 * @access private
	 * @return void
	 */
	private function multiple_upload(){
		if(!isset($this->data[$this->model_name][$this->fields['file'][0]])){
			foreach($this->model->hasMany as $model => $value){
				if($this->data[$model][$this->fields['file'][0]]){
					$this->files = $this->data[$model][$this->fields['file'][0]];
					$this->model_related = $model;
					break;
				}
			}
			
			$success = self::add();
			
			if($success){
				foreach($this->files as $key => $file){
					$data = self::upload($file,$key);
					
					$related = $this->model_related;
					
					$this->model->$related->create();
					$this->success = $this->model->$related->save($data);
					
					$this->file_name = str_replace(' ', '_', substr(microtime(),2));
				}
			}
		}else{
			foreach($this->fields['file'] as $key => $field){
				$success = self::upload($this->data[$this->model_name][$field],$key);
				
				$this->file_name = str_replace(' ', '_', substr(microtime(),2));
			}
			
			self::add();
		}
	}
	 
	 /*
	  * @access public
	  * @return Boolean
	  */
	 public function save(){
	 	if(sizeof($this->fields['file']) > 1 || !isset($this->data[$this->model_name][$this->fields['file'][0]])){
	 		self::multiple_upload();
	 	}else{
	 		self::upload();
			$this->success = self::add();
		}
		
		return $this->success;
	 }	
}
?>