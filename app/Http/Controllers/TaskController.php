<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::orderBy('id', 'desc')->get();
        return view('index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $flights = [
            [
                'label' => 'A51',
                'value' => 'A51',
            ],
            [
                'label' => 'A52',
                'value' => 'A52',
            ]
        ];


        $bagazas =[

            [
            'label' => '0kg',
            'value'=>'0kg',
            ],
            [
            'label'=>'10kg',
            'value'=>'10kg',
            ],
            [
            'label'=>'20kg',
            'value'=>'20kg',
            ]
        ];

        $from =[
            [
                'label' => 'Vilnius',
                'value'=>'Vilnius',
            ],
            [
                'label'=>'Frankfurt',
                'value'=>'Frankfurt',
            ],
            [
                'label'=>'London',
                'value'=>'London',
            ]

        ];
        $to =[
            [
                'label' => 'Riga',
                'value'=>'Riga',
            ],
            [
                'label'=>'Paris',
                'value'=>'Paris',
            ],
            [
                'label'=>'Oslo',
                'value'=>'Oslo',
            ]

        ];
        return view('create', compact('bagazas', 'flights', 'from', 'to'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'vardas' => 'required|max:100',
            'pavarde' => 'required|max:100',
            'ak' => 'required|min:11|max:11',
            'FlightNumber'=>'required',
            'bagazas'=>'required',
            'from'=> 'required',
            'to'=> 'required',
            'comments'=> 'required','min:50|max:100'
        ]);

        $task = new Task();
        $task->vardas = $request->vardas;
        $task->pavarde = $request->pavarde;
        $task->FlightNumber = $request->FlightNumber;
        $task->ak = $request -> ak;
        $task->bagazas =$request->bagazas;
        $task->from=$request->from;
        $task->to=$request->to;
        $task->comments=$request->comments;
        $task->save();
        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect()->route('index');
    }
}
