<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\Program;
use App\Http\Resources\ProgramResource;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Program::latest()->get();
        return response()->json([ProgramResource::collection($data), 'Programs fetched.']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'reference_no' => 'required|string|max:255',
            'price' => 'required',
            'quantity' => 'required',
            'payment_amount' => 'required',
            'product_id' => 'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $program = Program::create([
            'reference_no'   => $request->reference_no,
            'price'          => $request->price,
            'quantity'       => $request->quantity,
            'payment_amount' => $request->payment_amount,
            'product_id'     => $request->product_id,
         ]);

        return response()->json(['Program created successfully.', new ProgramResource($program)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $program = Program::find($id);
        if (is_null($program)) {
            return response()->json('Data not found', 404);
        }
        return response()->json([new ProgramResource($program)]);
    }

}
