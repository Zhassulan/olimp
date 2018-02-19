<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/olimp/lib/Calc.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/olimp/lib/UI.php');
use lib\Calc;
use lib\UI;
$calc = new Calc();
?>

<div class="row">
	<div class="col-sm-3">
		<form class="form-horizontal" action="index.php" method="POST">
		
			<?php
			if (isset($_POST['prediction']))	{
				$calc->setPrediction($_POST['prediction']);
			}
			if (isset($_POST['express']))	{
				$calc->setExpress($_POST['express']);
			}
			?>
			<div class="form-group">
				<label for="title">Укажите размер системы</label> 
				<input type="text" class="form-control" id="prediction" name="prediction" value="<?php echo $calc->getPrediction(); ?>">
				<input type="text" class="form-control" id="express" name="express" value="<?php echo $calc->getExpress(); ?>">
				<button type="submit" class="btn btn-success">Далее</button>
			</div>
			
			<?php
			if (isset($_POST['bet']))	{
				$calc->setBet($_POST['bet']);
			}
			?>
			<div class="form-group">
				<label for="title">Сумма ставки</label> 
				<input type="text" class="form-control" id="bet" name="bet" value="<?php echo $calc->getBet(); ?>">
				<button type="submit" class="btn btn-success">Далее</button>
			</div>
			
			<div class="form-group">
				<label for="title">Введите коэффициенты</label> 
			<?php
			if ($calc->getExpress() > 0)	{
				UI::paintCoeffInput($calc->getExpress());	
			}
			?>
				<button type="submit" class="btn btn-success">Далее</button>
			</div>
			
			<div class="form-group">
			<?php
			if (isset($_POST['input0']))	{
				$calc->setCoeff();
				echo 'Максимальный выигрыш составит '.$calc->getMaxPrize(). " тг.";
			}
			?>
			</div>
		</form>
	</div>
</div>