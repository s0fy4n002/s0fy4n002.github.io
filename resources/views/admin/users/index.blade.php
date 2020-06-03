@extends('layouts.admin')
@push('script')
	<script>

		

		 $.ajax({
                url     : "/admin/user-data",
                method  : "GET",
                dataType: 'JSON',
                success : function(data){

				var user = "";

	              for (var i = 0; i < data.length; i++) {
	              var id =  data[i]["id"];
	              var admin = data[i]["admin"];


	              					user +=  "<tr> ";
	              					user += `<td>${data[i]["id"]}</td> <td>${data[i]["name"]}</td>`;
	              					user += "<td><img src={{asset('/')}}storage/"+data[i]["profile"]["avatar"]+"></td>";
	              					user += "<td>"+ admin +"</td>";
	              					user += "<td>";	              					
						            
			     user += `${ admin == 0 ? ' <form id=make-admin class=d-inline action=user-admin/'+id+' method=POST>@csrf	<button id=btn type=submit class="btn btn-success btn-sm">Make Admin</button></form>' : '<a href=user-notadmin/'+id+' class="btn btn-danger btn-sm">Make Not Admin</a>' }`;
						            
					              	user += "</td></tr>";
	              }

	              document.querySelector("#getContent").innerHTML = user;

                }
            });

		 $(".alert").hide(10000);

		 


	</script>
@endpush
@section('content')


<div class="col-8">
	<div class="card">
		<div class="card-body">
			@if(session('success'))
			<div class="alert alert-success">{{ session('success') }}</div>
			@endif
			<div class="table-responsive">
				<table class="table table-hover">
					<a href="{{route('users.create')}}" class="btn btn-success btn-sm mb-3 float-right"><i class="fas fa-fw fa-plus fa-sm"></i> Create User</a>
					<thead>
						<tr>
							<th>id</th>
							<th>email</th>
							<th>avatar</th>
							<th>Admin</th>
							<th align="center">Action</th>
						</tr>
					</thead>
					<tbody id="getContent">
						
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection