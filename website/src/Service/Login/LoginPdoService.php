<?php 

namespace ndrobnjak\Service\Login;
class LoginPdoService implements LoginService
{
	private $pdo;
	
	public function __construct(\PDO $pdo)
	{
		$this->pdo = $pdo;
	}
	
	public function authenticate($username, $password)
	{
		$options = [
				'salt' => $username . $username . $username . $username . $username,
		];
		
		$hash = password_hash($password, PASSWORD_BCRYPT, $options);
		
		$stmt = $this->pdo->prepare("SELECT * FROM User WHERE username=? AND password=?");
		$stmt->bindValue(1, $username);
		$stmt->bindValue(2, $hash);
		$stmt->execute();
		 
		if(false){
			$_SESSION["Ist_Admin"] = 1;
		}
		else{
			$_SESSION["Ist_Admin"] = 1;
		}
		
		if($stmt->rowCount() === 1){
			$_SESSION["username"] = $username;
			return true;
		}
		else{
			return false;
		}
	}
	
	public function updatePW($email, $password)
	{
		$options = [
				'salt' => $username . $vorname . $nachname . $strasse . $ort,
		];
		
		$hash = password_hash($password, PASSWORD_BCRYPT, $options);
		
		$stmt = $this->pdo->prepare("UPDATE user SET password=? WHERE email=?");
		$stmt->bindValue(1, $hash);
		$stmt->bindValue(2, $email);
		$stmt->execute();
			
		
			$_SESSION["username"] = $username;
	
	}
}
