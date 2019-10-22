<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function current_fiscal_year(){
	if (date('m') > 6) {
	    $fiscal_year = date('Y').'/'.(date('Y') +1);
	}else {
	    $fiscal_year = (date('Y') -1).'/'.date('Y');
	}
	return $fiscal_year;
}

function previous_fiscal_year($current, $num){
	$quater_years = explode('/', $current);
	$new_year_1 = $quater_years[0] - $num;
	$new_year_2 = $quater_years[1] - $num;
	return $new_year_1.'/'.$new_year_2;
}

function array_sort_by_column(&$arr, $col, $dir = SORT_DESC) {
	$sort_col = array();
	foreach ($arr as $key=> $row) {
		$sort_col[$key] = $row[$col];
	}
	array_multisort($sort_col, $dir, $arr);
}