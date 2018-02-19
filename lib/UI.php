<?php

namespace lib;

/**
 * Класс интерфейс пользователя, графические операции
 * @author ZTokbayev
 *
 */
class UI {
	
	/**Метод прорисовки ввода коэффициентов из массива 0-й столбец
	 * @param array $arr - матрица
	 * @param int $size - строки
	 */
	public static function paintCoeffInput($size)	{
		$k = 1;
		echo '
           <table class="table table-responsive">
           <thead>
               <tr>
                 <th>#</th>
                 <th>Коэф</th>
               </tr>
              </thead>
                <tbody>';
		for ($i = 0; $i < $size; $i++) {
			echo '<tr>';
			echo '<td><b>'.$k++.'</b></td>';
			echo '<td><input type="text" class="form-control" id="input'.$i.'" name="input'.$i.'" value="2"></td>';
			echo '</tr>';
		}
		echo '</tbody></table>';
	}
	
}
