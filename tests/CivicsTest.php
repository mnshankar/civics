<?php
require '../src/QuestionService.php';
use mnshankar\civics\QuestionService;

class CivicsTest extends PHPUnit_Framework_TestCase {
	
	public function testGetPreviousQuestion()
	{
		$sut = new QuestionService();
		$val = $sut->getPrevious([1,2,3],2);
		$this->assertEquals(1,$val);
	}
	public function testGetPreviousQuestionEdgeCase()
	{
		$sut = new QuestionService();
		$val = $sut->getPrevious([1,2,3],1);
		$this->assertEquals(1,$val);
	}
	public function testGetNextQuestion()
	{
		$sut = new QuestionService();
		$val = $sut->getNext([3,1,2],1);
		$this->assertEquals(2,$val);
	}
	public function testGetNextQuestionEdgeCase()
	{
		$sut = new QuestionService();
		$val = $sut->getNext([1,2,3],3);
		$this->assertEquals(3,$val);
	}

	/**
	 * @expectedException InvalidArgumentException
	 */
	public function testExceptionOnPreviousInvalidCurrentQuestion()
	{
		$sut = new QuestionService();
		$val = $sut->getNext([1,2,3],100);
	}
	/**
	 * @expectedException InvalidArgumentException
	 */
	public function testExceptionOnNextInvalidCurrentQuestion()
	{
		$sut = new QuestionService();
		$val = $sut->getNext([1,2,3],100);
	}

}
