<?php

namespace ndrobnjak\Service\Add;
class AddPdoService implements AddService
{
	private $pdo;

	public function __construct(\PDO $pdo)
	{
		$this->pdo = $pdo;
	}

	public function addFilm($name)
	{
		$stmt = $this->pdo->prepare("INSERT INTO series WHERE name=?");
		$stmt->bindValue(1, $name);
		$stmt->execute();
		$series = $stmt->fetchColumn();

		return $series;
	}
}
?>