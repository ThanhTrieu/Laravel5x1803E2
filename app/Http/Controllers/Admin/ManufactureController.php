<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreManufacturePost;
use App\Models\Manufacture;

class ManufactureController extends Controller
{
	const LIMIT_ROWS = 2;
	private $db;

	public function __construct(Manufacture $manu)
	{
		$this->db = $manu;
	}

    public function index(Request $request)
    {
    	$keyword = $request->keyword;
    	$keyword = strip_tags($keyword);

    	$data = $this->db->getAllDataManufacture($keyword, self::LIMIT_ROWS);
    	return view('admin.manufacture.index',['data' => $data,'key'=>$keyword]);
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

    public function edit($id, Request $request)
    {
    	$id = is_numeric($id) ? $id : 0;
    	$infoDataManu = $this->db->getInfoDataManuById($id);

    	if($infoDataManu){
    		// co du lieu
    		return view('admin.manufacture.editform',['info' => $infoDataManu]);
    	} else {
    		// khong co
    		return view('admin.manufacture.notfound');
    	}
    }

    public function handleEdit(StoreManufacturePost $request)
    {
    	// validate
    	// update du lieu vao db
    	$name = $request->nameManu;
    	$id = $request->idManu;
    	$address = $request->addressManu;
    	$update = $this->db->updateManuById($id, $name, $address);
    	if($update){
    		return redirect()->route('admin.manufacture');
    	} else {
    		return redirect()->route('admin.editManu',['id'=>$id,'state'=>'fail']);
    	}
    }
}
