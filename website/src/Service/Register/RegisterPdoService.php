<?php 

namespace ndrobnjak\Service\Register;
class RegisterPdoService implements RegisterService
{
	private $pdo;
	
	public function __construct(\PDO $pdo)
	{
		$this->pdo = $pdo;
	}
	
	public function register($email, $username, $password, $vorname, $nachname, $strasse, $ort)
	{
		
		$options = [
				'salt' => $username . $username . $username . $username . $username,
		];
		
		$hash = password_hash($password, PASSWORD_BCRYPT, $options);
		
		
		$stmt = $this->pdo->prepare("INSERT INTO User (email, username, password, Vorname, Nachname, Strasse, Ort) VALUES(?, ?, ?, ?, ?, ?, ?)");
		$stmt->bindValue(1, $email);
		$stmt->bindValue(2, $username);
		$stmt->bindValue(3, $hash);
		$stmt->bindValue(4, $vorname);
		$stmt->bindValue(5, $nachname);
		$stmt->bindValue(6, $strasse);
		$stmt->bindValue(7, $ort);
		$stmt->execute();
			
		$_SESSION["username"] = $username;

	}
		
}