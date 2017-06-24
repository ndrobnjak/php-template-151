<?php

namespace ndrobnjak\Service\Film;
class FilmPdoService implements FilmService
{
	private $pdo;

	public function __construct(\PDO $pdo)
	{
		$this->pdo = $pdo;
	}

	public function film()
	{
		$stmt = $this->pdo->prepare("SELECT * FROM Film");
		$stmt->execute();
		$film = $stmt->fetchAll();

		return $film;
	}

}
?>