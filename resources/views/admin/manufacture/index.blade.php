@extends('admin.layout')

@section('content')
<div class="row">
  <div class="col-md-12 col-lg-12">
    <h2 class="text-center">This is Manufacture</h2>
	<div class="row">
		<div class="col-md-8 col-lg-8">
			<a href="{{ route('admin.formAddManu') }}" title="Add manufacture" class="btn btn-primary"> Add + </a>
		</div>
	    <div class="col-md-4 col-lg-4">
	    	<input type="text" name="txtKeyword" id="txtKeyword" value="{{ $key }}">
	    	<button id="btnSearch" type="button" class="btn btn-primary"> Search</button>
	    </div>
	</div>
    <hr>
    <table class="table table-bordered table-striped table-hover">
    	<thead>
    		<tr>
    			<th>STT</th>
    			<th>Ten Nha SX</th>
    			<th>Dia chi NSX</th>
    			<th colspan="2" width="5%" class="text-center">Action</th>
    		</tr>
    	</thead>
    	<tbody>
    		@foreach ($data as $key => $item)
	    		<tr>
	    			<td>{{ $key + 1 }}</td>
	    			<td>{{ $item['name'] }}</td>
	    			<td>{{ $item['address'] }}</td>
	    			<td>
	    				<a class="btn btn-info" href="{{ route('admin.editManu',['id'=>$item['id']]) }}" title="Edit">Edit</a>
	    			</td>
	    			<td>
	    				<button onclick="deleteManu({{ $item['id'] }});" type="button" class="btn btn-danger">Delete</button>
	    			</td>
	    		</tr>
    		@endforeach
    	</tbody>
    </table>

    {{ $data->appends(request()->query())->links() }}

  </div>
</div>
<script type="text/javascript">
	function deleteManu(id){
		if(id != ''){
			$.ajax({
				url: "{{ route('admin.deleteManu') }}",
				type: "POST",
				data: {id: id},
				success:function(res){
					res = $.trim(res);
					if(res === 'ERR' || res === 'FAIL'){
						alert('Co loi xay ra, vui long thu lai');
					} else if(res === 'OK'){
						alert('xoa thanh cong');
						window.location.reload(true);
					} else {
						return false; 
					}
				}
			});
		}
	}

	$(function(){
		// bat su kien click vao nut search
		$('#btnSearch').click(function(){
			// lay gia tri keyword nhap trong o text
			let keyword = $('#txtKeyword').val().trim();
			if(keyword.length){
				window.location.href = "{{ route('admin.manufacture') }}" + "?keyword=" + keyword;
			}
			return false;
		});
	});
</script>
@endsection
        