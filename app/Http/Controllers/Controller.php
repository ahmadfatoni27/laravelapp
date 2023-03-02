<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // replace [ - ] to [ , ] 
	protected function replacemin($s) { 
		$h = str_replace('-', ', ', $s); // Hilangkan karakter yang disebutkan di awal
		$h = str_replace('KABUPATEN', '', $h); // Hilangkan karakter yang disebutkan di awal
		return $h;
	}
	// done - check data di table database yang sama / sudah ada.
	protected function checkQueryId($tb, $field, $idcheck) { 
		// main Query.
		$total  = DB::table($tb)->where($field,'=',$idcheck)->count();
		$res = ($total > 0) ? 'Data Sama' : 'OK'; return $res;
	}





}
