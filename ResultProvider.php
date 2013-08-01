<?php

require_once 'ResultFactory.php';
require_once 'Exception.php';

class ResultProvider {

	private $possibleResultsToCheck = array(
		ResultFactory::DEUCE,
		ResultFactory::ADVANTAGE,
		ResultFactory::WIN,
		ResultFactory::STANDARD
	);

	/**
	 * @var ResultFactory
	 */
	private $resultFactory;

	function __construct(ResultFactoryInterface $resultFactory = null)
	{
		$this->resultFactory = $resultFactory ? $resultFactory : new ResultFactory;
	}

	public function getResult()
	{
		$scores = func_get_args();

		foreach ($this->possibleResultsToCheck as $resultType) {
			$result = $this->resultFactory->create($resultType, $scores);
			if ($result->isTrue()) return $result->getResult();
		}

		throw new UnknownResultException;
	}
}