<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CustomerController extends Controller
{
    protected $json_list;
    protected $list;

    public function __construct()
    {
        $this->json_list = Storage::disk('public')->get('customers.json');
        $this->list = json_decode($this->json_list, true);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $list = [
//            ['name'=>'Ashton Cox', 'Position'=>'Junior Technical Author', 'Office'=>'San Francisco', 'Age'=>'66', 'Start date'=>'2009/01/12', 'Salary'=>'$86,000'],
//            ['name'=>'Cedric Kelly', 'Position'=>'Senior Javascript Developer', 'Office'=>'Edinburgh', 'Age'=>'22', 'Start date'=>'2012/03/29', 'Salary'=>'$433,060'],
//            ['name'=>'Garrett Winters','Position'=>'Accountant', 'Office'=>'Tokyo', 'Age'=>'63', 'Start date'=>'2011/07/25', 'Salary'=>'$170,750'],
//            ['name'=>'Tiger Nixon','Position'=>'System Architect', 'Office'=>'Edinburgh', 'Age'=>'61', 'Start date'=>'2011/04/25', 'Salary'=>'$320,800'],
//        ];
        //dd($list);
        //dd($contents);
        //Storage::disk('public')->put('customers.json', json_encode($list, JSON_PRETTY_PRINT));
        return response()->view("customers.list", ['list' => $this->list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        return response()->view("customers.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $info =
            ['name' => $request->name,
                'Position' => $request->Position,
                'Office' => $request->Office,
                'Age' => $request->Age,
                'Start date' => $request->input('Startdate'),
                'Salary' => $request->Salary,
            ];

        array_push($this->list, $info);
        Storage::disk('public')->put('customers.json', json_encode($this->list, JSON_PRETTY_PRINT));
        // dd($this->list);
        return redirect()->route("customers.list");
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $data = $this->list[$id];
        return response()->view("customers.edit", compact(['data', 'id']));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $info =
            ['name' => $request->name,
                'Position' => $request->Position,
                'Office' => $request->Office,
                'Age' => $request->Age,
                'Start date' => $request->input('Startdate'),
                'Salary' => $request->Salary,
            ];

        foreach ($this->list as $key => $value) {
            if ($key == $id) {
                $this->list[$key] = $info;
                break;
            }
        }
        Storage::disk('public')->put('customers.json', json_encode($this->list, JSON_PRETTY_PRINT));
        return redirect()->route("customers.list");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        foreach ($this->list as $key => $val) {
            if ($key == $id) {
                unset($this->list[$id]);
                break;
            }
        }

        $this->list = array_values($this->list);
        Storage::disk('public')->put('customers.json', json_encode($this->list, JSON_PRETTY_PRINT));
        return redirect()->route("customers.list");
    }
}
