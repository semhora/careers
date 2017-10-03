<?php
namespace Application\Src\AppClass;

use Application\Src\Abstracts\Bootstrap;

/**
 * Classe de inicialização do sistema
 *
 * @author Gabriel de Figueiredo Corrêa
 * @since 30/09/2017
 * @package Application/Src
 * 
 */
class AppInit extends Bootstrap
{
	private $appConfig;
	private $arrayParameters;
	
	###############
	# MÉTODOS GET #
	###############
	
	/**
	 * Retorna o array com os dados do arquivo config.ini
	 * @return array
	 */
	private function getConfig(){
		return  $this->appConfig;
	}
	
	/**
	 * Retorna o array de parâmetros
	 * @return array
	 */
	private function getArrayParameters(){
		return $this->arrayParameters;
	}
	
	
	
	###############
	# MÉTODOS SET #
	###############
	
	/**
	 * Inicializa o array de configuração com as informações do arquivo config.ini (De acordo com o ambiente)
	 * @param array $config
	 */
	private function setConfig( Array $config){
		$this->appConfig = $config;
	}
	
	/**
	 * Inicializa o array de parâmetros
	 * @param array $arrayParam
	 */
	private function setArrayParameters(Array $arrayParam){
		$this->arrayParameters = $arrayParam;
	}
	
	######################
	#	MÉTODOS GERAIS	 #
	######################
	
	/**
	 * Inicializa as rotas do sistema
	 * 
	 */
	protected function initRoutes()
	{
		// Route: Site
		$ar['index'] = array('route'=>'/', 'controller'=>'index', 'action'=>'index');
		$ar['login'] = array('route'=>'/login', 'controller'=>'login', 'action'=>'login');
		
		// Route: Adm
		$ar['admin'] = array('route'=>'/admin', 'controller'=>'admin', 'action'=>'home');
		$ar['usuario'] = array('route'=>'/admin/usuario', 'controller'=>'admin', 'action'=>'usuario');
		$ar['autenticar'] = array('route'=>'/autenticar', 'controller'=>'autenticar', 'action'=>'autenticar');
		
		$this->setRoutes($ar);
	}
	
	/**
	 * Faz a leitura do arquivo de configuração - config.ini
	 */
	protected function loadConfig(){
		$ambiente = getenv('ambiente') !== null ? getenv('ambiente') : 'desenv';
		$iniConfig = parse_ini_file($_SERVER['DOCUMENT_ROOT'].'/../config/config.ini', true);
		$this->setConfig($iniConfig[$ambiente]);
	}

	/**
	 * Inicializa as constantes do sistema
	 * @see \Ibranch\Init\Bootstrap::initConstants()
	 */
	protected function initConstants()
	{
		$config = $this->getConfig();
		
		$arrayParam = [
			// Diretório raiz da aplicação
			'APP_ROOT' => dirname( $_SERVER['DOCUMENT_ROOT'] ),
		    
		    // Credenciais de acesso ao banco de dados
		    'DATA_BASE' => [
		        'DSN' => $config['db.dsn'],
		        'USER' => $config['db.user'],
		        'PASSWORD' => $config['db.password']
		    ],
				
			// Endereço da área administrativa da aplicação
			'URL_ADMIN' => $config['url.admin'],
			'URL_LOGIN' => $config['url.login'],
			
			// Caminho dos diretórios 
			'ASSETS' => [
				'IMG' => $config['assets.img.basepath'],
				'CSS' => $config['assets.css.basepath'],
				'SCRIPTS' => $config['assets.scripts.basepath'],
				'PLUGINS' => $config['assets.plugins.basepath'],
				'UPLOAD_DIR' => $config['assets.uploadDir.basepath']
			],
				
			// Configurações para upload de arquivos
			'UPLOAD_DIR' => $config['upload.arquivo.diretorio'],
			'TAMANHO_MAXIMO_ARQUIVO_UPLOAD' => $config['upload.arquivo.tamanho.maximo'],
			'TIPO_ARQUIVO_PERMITIDO_UPLOAD' => array(
					'JPG' => $config['upload.arquivo.tipo.permitido.jpg'],
					'JPEG' => $config['upload.arquivo.tipo.permitido.jpeg'],
					'PNG' => $config['upload.arquivo.tipo.permitido.png']
			),
				
			// Configurações do Twig
			'GLOBAL_VARS' => array(
				'TITULO' => $config['global.titulo'],
				'LINGUAGEM' => $config['global.linguagem'],
				'URL_SITE' => $_SERVER['HTTP_HOST'],
				'DESCRICAO' => $config['global.descricao'],
				'AUTOR' => $config['global.autor'],
			    'FACEBOOK' => $config['global.facebook'],
			    'LINKEDIN' => $config['global.linkedin'],
			    'ENDERECO' => $config['global.endereco'],
			    'EDIFICIO' => $config['global.edificio'],
			    'TELEFONE' => $config['global.telefone'],
			    'EMAIL' => $config['global.email']
			)
		];
		
		$this->setArrayParameters($arrayParam);
	}
	
	/**
	 * arrega as constantes do sistema
	 */
	protected function loadConstants(){
		$arrayParam = $this->getArrayParameters();
	
		foreach ($arrayParam as $name => $value){
			define($name, $value);
		}
	}
	
	/**
	 * Altera o diretório raiz
	 */
	protected function changeRoot(){
		// Alterando o diretório raiz
		chdir(APP_ROOT);
	}
	
	public function run(){
	    $getUrl = $this->getUrl();
	    echo $this->runUrl($getUrl);
	}
}