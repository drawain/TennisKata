<?php

require_once 'Player.php';
require_once 'ResultProvider.php';

class Tennis {

	/**
	 * @var Player[]
	 */
	private $players = array();

	/**
	 * @var ResultProvider
	 */
	private $resultProvider;

	function __construct(ResultProvider $resultProvider = null)
	{
		$this->resultProvider = $resultProvider ? $resultProvider : new ResultProvider();
	}

	public function addPlayer(Player $player)
	{
		$this->players[] = $player;
	}

	public function score(Player $player)
	{
		$player->score();
	}

	public function getResult()
	{
		return $this->resultProvider->getResult(
			$this->players[0]->getScore(),
			$this->players[1]->getScore());
	}
}