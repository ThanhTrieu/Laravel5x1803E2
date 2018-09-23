<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function demo($myname,$myAge = null)
    {
        return "Hello word - {$myname} - myage: {$myAge}";
    }

    public function hello(Request $request)
    {
        // Request : giup server laravel nhan dc tat ca cac tham so - params truyen len
        //$name = $request->input('name');
        $name = $request->name;
        //$age  = $request->input('age');
        $age  = $request->age;

        return "Hello word - {$name} - myage: {$age}";
    }

    public function loadview()
    {
        // do du lieu ra view - truyen du lieu ra view
        $data = [];
        $data['name'] = 'Nguyen Van A';
        $data['age']  = 28;
        $data['info'] = [
            [
                'msv' => 113,
                'namesv'=> 'NVA',
                'agesv' => 20,
                'phone' => '0987654',
                'gender' => 1,
                'money' => 2000000
            ],
            [
                'msv' => 114,
                'namesv'=> 'NVB',
                'agesv' => 22,
                'phone' => '09876540',
                'gender' => 0,
                'money' => 4000000
            ],
            [
                'msv' => 115,
                'namesv'=> 'NVA',
                'agesv' => 21,
                'phone' => '0987654ss',
                'gender' => 1,
                'money' => 2200000
            ]
        ];
        // nap vao 1 view - load vao 1 view - include view
        // sub floder view
        return view('test.index',$data);
    }

    public function product()
    {
        return view('test.product');
    }
}
