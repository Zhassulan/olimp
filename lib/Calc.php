<?php
namespace lib;

/**
 * Класс для вычислений коэффициетов и выигрыша по экспрессам
 * @author ZTokbayev
 *
 */
class Calc {
	
	/** ставка игрока 
	 * @var integer
	 */
	private $bet = 0;
	/** количество экспрессов
	 * @var integer
	 */
	private $express = 0;
	
	/** количество исходов 
	 */
	private $prediction = 0;
	/** массив данных для хранения коэффициентов
	 * @var array 
	 */
	private $arr = [];
	
	/**
	 * @return number
	 */
	public function getPrediction() {
		return $this->prediction;
	}

	/**
	 * @param number $prediction
	 */
	public function setPrediction($prediction) {
		$this->prediction = $prediction;
	}

	/**
	 * @return number
	 */
	public function getExpress() {
		return $this->express;
	}

	/**
	 * @param number $express
	 */
	public function setExpress($express) {
		$this->express = $express;
		$this->initArray($this->express, $this->express + 1); //+1 расширен для хранения введённых коэффициентов
	}

	/**
	 * @return number
	 */
	public function getBet() {
		return $this->bet;
	}

	/**
	 * @param number $bet
	 */
	public function setBet($bet) {
		$this->bet = $bet;
	}
	
	/**
	 * @return Ambigous <mixed, number>
	 */
	public function getArr() {
		return $this->arr;
	}
	
	/**
	 * @param Ambigous <mixed, number> $arr
	 */
	public function setArr($arr) {
		$this->arr = $arr;
	}

	/** Метод инициализации массива коэффициентов
	 * @param $size - размер
	 */
	private function initArray($size)	{
		for ($i = 0; $i < $size; $i++) {
			$this->arr[$i] = 0;
		}
	}
	
	/**
	 * Метод присваивания введенных в форме коэффициентов к элементам матрицы 0-х столбцов
	 */
	public function setCoeff()	{
		for ($i = 0; $i < $this->express; $i++) {
			$this->arr[$i] = $_POST['input'.$i];
		}
	}
	
	private function convertFloat($floatAsString)	{
		$norm = strval(floatval($floatAsString));
		if (($e = strrchr($norm, 'E')) === false) {
			return $norm;
		}
		return number_format($norm, -intval(substr($e, 1)));
	}
	
	/**
	 * Метод умножений коэффициентов и вычисления вознаграждения
	 * 
	 */
	public function getMaxPrize()	{
		//$bet = bcdiv(strval($this->bet), strval($this->express), 2);
		$bet = $this->bet / $this->express;
		$sum = 0.00;
		echo 'Коэффициенты:</br>';
		for ($i = 0; $i < $this->express; $i++) {
			echo $this->arr[$i].'; ';
		}
		echo '</br>';
		echo 'Ставка '.$bet.'<br>';
		//bcscale(2);
		for ($i = 0; $i < $this->express; $i++) {
			$x = $this->arr[$i];
			for ($j = $i + 1; $j < $this->express; $j++) {
				echo '('.$x.' * '.$this->arr[$j].') * ';
				$x *= $this->arr[$j];
			}
			echo '</br>';
			echo 'Умн. коэф. '.$x.'</br>';
			$sum += $x * $bet;
			echo 'Выигрыш '.$sum.'</br>';
		}
		return $sum;
	}
	
}