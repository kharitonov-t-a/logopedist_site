<?php
	class Constants
	{ 
		const QUESTION = 1;
		const ANSWER = 2;

		public static function getQuestionValue()
		{
			return self::QUESTION;
		}

		public static function getAnswerValue()
		{
			return self::ANSWER;
		} 

		public function getNameTypeMessege($typeMessege)
		{
			$typeMessegeName = "";
			switch ($typeMessege) {
				case self::getQuestionValue():
					$typeMessegeName = "question";
					break;
				case self::getAnswerValue():
					$typeMessegeName = "answer";
					break;
				default:
					$typeMessegeName = "other";
					break;
			}
			return $typeMessegeName;
		}		
	}
?>