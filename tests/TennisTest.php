<?php

require_once 'Tennis.php';

class TennisTest extends PHPUnit_Framework_TestCase
{
	protected function setUp()
	{
		$this->game = new Tennis;
		$this->player1 = new Player;
		$this->player2 = new Player;
		$this->game->addPlayer($this->player1);
		$this->game->addPlayer($this->player2);
	}

	public function testScore_usersScore_addScoreToUsers()
	{
		$this->assertEquals('0-0', $this->game->getResult());
		$this->game->score($this->player2);
		$this->assertEquals('0-15', $this->game->getResult());
		$this->game->score($this->player1);
		$this->assertEquals('15-15', $this->game->getResult());
	}

	public function testScore_userScoresTwice_add30Points()
	{
		$this->score($this->player1, 2);
		$this->assertEquals('30-0', $this->game->getResult());
	}

	public function testScore_userScoresThreeTimes_add40Points()
	{
		$this->score($this->player1, 3);
		$this->assertEquals('40-0', $this->game->getResult());
	}

	public function testScore_userScoresFourTimes_userWins()
	{
		$this->score($this->player1, 4);
		$this->assertEquals('PLAYER 1 WINS', $this->game->getResult());
	}

	public function testScore_usersScoreMoreThenThreeTimesAndHasEqualPoints_getDeuce()
	{
		$this->score($this->player1, 3);
		$this->score($this->player2, 3);
		$this->assertEquals('DEUCE', $this->game->getResult());

		$this->game->score($this->player1);
		$this->game->score($this->player2);
		$this->assertEquals('DEUCE', $this->game->getResult());
	}

	public function testScore_user1ScoresThreeTimesAndUser2ScoresFourTimes_user2TakeAdvantage()
	{
		$this->score($this->player1, 3);
		$this->score($this->player2, 4);
		$this->assertEquals('PLAYER 2 ADVANTAGE', $this->game->getResult());
	}

	public function testScore_user2ScoresThreeTimesAndUser1ScoresFourTimes_User1TakeAdvantage()
	{
		$this->score($this->player1, 4);
		$this->score($this->player2, 3);
		$this->assertEquals('PLAYER 1 ADVANTAGE', $this->game->getResult());
	}

	public function testScore_userGetAdvantageAndScoreAgain_userWins()
	{
		$this->score($this->player1, 4);
		$this->score($this->player2, 3);
		$this->score($this->player1, 1);
		$this->assertEquals('PLAYER 1 WINS', $this->game->getResult());
	}

	private function score(Player $player, $count)
	{
		for ($i = 0; $i < $count; $i++) {
			$this->game->score($player);
		}
	}
}
