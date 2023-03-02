<?php
namespace App\Http\Controllers;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionsController extends Controller
{
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function index()
{
	return view('transaction.index');
}
/**
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/
// done
public function store(Request $request){
	$filtervalue= $request->input('filtervalue');
	$filtertext = $request->input('filtertext');
	$start 		= $request->input('start');
	$length 	= $request->input('length');

	// FILTERED DATA IN LIST DATA - FRONT END

	// main Query.
	$sql = DB::table('transaction')
	->select(DB::raw('id, reference_no, price, quantity, payment_amount, product_id'))
	->where(''.$filtervalue.'','like','%'.$filtertext.'%')
	->limit($length, $start);
	// ---
	$queryall = $sql->get();
	$data  	  = $queryall;
	$total 	  = $sql->count();
	$dataRecord = array(
		"RecordsTotal" => $total,
		"RecordsFiltered" => $total,
		"Data" => $data,
	); return json_encode($dataRecord);
}

// done
public function edit(Request $request){
	// print_r($request);die();
	$data = $request->input('id');
	// main Query.
	$sql  = DB::table('transaction')
	->select(DB::raw('transaction.*'))
	->where('transaction.id','=',$data['id']);
	$res = $sql->get();
	return json_decode($res);
}

// done
public function update(Request $request) {
	$d = $request->input('id');
	$mode = $request->input('MODE');
	// main data insert.
	$Data = [
		'reference_no'  => $request->input('reference_no'),
		'price'         => $request->input('price'),
		'quantity'      => $request->input('quantity'),
    'payment_amount'=> $request->input('payment_amount'),
		'product_id' 		=> $request->input('product_id'),
	];

	// INSERT - if Mode == ""
	if($mode == "")
	{
		DB::table("transaction")
		->updateOrInsert($Data, ["id"=>$d]);
		$status = "Inserted";
	}

	// UPDATE - if Mode == "Update"
	if($mode == "Update")
	{
		DB::table('transaction')
		->where('id','=',$d)->update($Data);
		$status = "Updated";
	}

	return json_encode(array( "result" => $status ));
}

// done
public function destroy(Request $request){ // DONE
	$id = $request->input('id');
	DB::table('transaction')->where('id','=',$id)->delete();
	return json_encode(array("result" => "OK"));
}


}
