<?php


class WinResult extends Result {

	public function isTrue()
	{
		if ($this->atLeastOnePlayerHasEnoughScoreToWin() && $this->scoreDifferenceIsMoreThanOne()) return true;
		return false;
	}

	public function getResult()
	{
		return "PLAYER " . $this->getLeader() . " WINS";
	}

	private function scoreDifferenceIsMoreThanOne()
	{
		return $this->getDifference() > 1;
	}
}