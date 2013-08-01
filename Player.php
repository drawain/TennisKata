<?php


class Player {

	private $score = 0;
	private $id;

	function __construct()
	{
		$this->id = rand(0,100000);
	}

	public function score()
	{
		$this->score++;
	}

	public function getScore()
	{
		return $this->score;
	}

}