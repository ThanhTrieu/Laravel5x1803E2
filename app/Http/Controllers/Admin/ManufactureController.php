<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreManufacturePost;
use App\Models\Manufacture;

class ManufactureController extends Controller
{
	private $db;
	public function __construct(Manufacture $manu)
	{
		$this->db = $manu;
	}

    public function index()
    {
    	$data = $this->db->getAllDataManufacture();
    	return view('admin.manufacture.index',['data' => $data]);
    }

    public function addForm()
    {
    	return view('admin.manufacture.addform');
    }

    public function handleAdd(StoreManufacturePost $request)
    {
    	// vaidate du lieu
    	$nameManu = $request->nameManu;
    	$addressManu = $request->addressManu;

    	// viet add data vao db
    	$add = $this->db->addDataManufacture($nameManu,$addressManu);
    	if($add){
    		// quay ve trang list manufacture
    		return redirect()->route('admin.manufacture');
    	} else {
    		// quay ve trang form add
    		return redirect()->route('admin.formAddManu',['state'=>'fail']);
    	}
    }

    public function deleteManu(Request $request)
    {
    	$id = $request->id;
    	$id = is_numeric($id) ? $id : 0;
    	if($id > 0){
    		// delete
    		$del = $this->db->deleteManuById($id);
    		if($del){
    			echo "OK";
    		} else {
    			echo "FAIL";
    		}
    	} else {
    		echo "ERR";
    	}
    }
}
