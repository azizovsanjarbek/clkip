<?
function month($number_of_month)
{
    $arr = [
        'январь',
        'февраль',
        'март',
        'апрель',
        'май',
        'июнь',
        'июль',
        'август',
        'сентябрь',
        'октябрь',
        'ноябрь',
        'декабрь'
      ];
      
      
      $month = $number_of_month-1;
      echo $arr[$month];
};
month(9);

?>