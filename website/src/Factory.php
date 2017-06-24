<?php 

namespace ndrobnjak;

class Factory{
	
	private $config;
	
	public static function createFromIniFile($filename){
		return new Factory(
				parse_ini_file(__DIR__."/../config.ini", true)
				);
	}
	
	public function __construct(array $config){
		$this->config = $config;
	}
	public function getTemplateEngine(){
		return new SimpleTemplateEngine(__DIR__ . "/../templates/");
	}
	
	public function getIndexController(){
		return new Controller\IndexController(
			$this->getTemplateEngine()
		);
	}
	
	public function getLoginController(){
		return new Controller\LoginController(
				$this->getTemplateEngine(),
				$this->getLoginService()
				
				);
	}
	
	public function getRegisterController(){
		return new Controller\RegisterController(
				$this->getTemplateEngine(),
				$this->getRegisterService()
	
				);
	}
	
	public function getSearchController(){
		return new Controller\SearchController(
				$this->getTemplateEngine(),
				$this->getSearchService()
	
				);
	}
	
	public function getDataController(){
		return new Controller\DataController(
				$this->getTemplateEngine(),
				$this->getDataService()
	
				);
	}
	
	public function getAddController(){
		return new Controller\AddController(
				$this->getTemplateEngine(),
				$this->getAddService()
	
				);
	}
	
	public function getAccountController(){
		return new Controller\AccountController(
				$this->getTemplateEngine(),
				$this->getAccountService()
	
				);
	}
	
	public function getPdo(){
		return new \PDO(
		"mysql:host=mariadb;dbname=app;charset=utf8",
		$this->config['database']['user'],
		"my-secret-pw",
		[\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]);
	}
	
	public function getMailer()
	{
		return \Swift_Mailer::newInstance(
				\Swift_SmtpTransport::newInstance("smtp.gmail.com", 465, "ssl")
				->setUsername("gibz.module.151@gmail.com")
				->setPassword("Pe$6A+aprunu")
				);
	}
	
	public function getLoginService(){
		return new Service\Login\LoginPdoService($this->getPdo());
	}
	
	public function getRegisterService(){
		return new Service\Register\RegisterPdoService($this->getPdo());
	}
	
	public function getSearchService(){
		return new Service\Search\SearchPdoService($this->getPdo());
	}
	
	public function getDataService(){
		return new Service\Data\DataPdoService($this->getPdo());
	}
	
	public function getAddService(){
		return new Service\Add\AddPdoService($this->getPdo());
	}
	
	public function getAccountService(){
		return new Service\Account\AccountPdoService($this->getPdo());
	}
}


