@extends('layouts.admin')
@section('content')

<div class="col-8">
	<div class="card">
		<div class="card-body">
			<div class="table-responsive">
				<a href="{{route('categories.create')}}" class="btn btn-success btn-sm mb-3 float-right"><i class="fas fa-fw fa-plus fa-sm"></i> Create Categories</a>
				<table class="table">
					<thead>
						<tr>
							<th>Name</th>
							<th colspan="5" class="text-center">Action</th>

						</tr>
					</thead>
					<tbody>
						@forelse($categories as $category)
						<tr>
							<td width="75%">{{ $category->name }}</td>
							<td class="text-center"><a class="btn btn-sm btn-info" href="{{route('categories.edit', $category->id)}}">Edit <span class="glymphicon glymphicon-pencil"></span></a> 
							</td>
							<td class="text-center">
								<form class="d-inline" action="{{route('categories.destroy', $category->id)}}" method="post">
									@csrf
									@method('delete')
									
									<button type="button" onclick="confirm('hapus ?')" class="btn btn-danger btn-sm" type="submit">
									  Delete
									</button>
								</form>
							</td>
						</tr>
						@empty
							<tr>
								<td colspan="5" class="text-center">data tidak ada</td>
							</tr>

						@endforelse
					</tbody>
				</table>		
			</div>
		</div>
	</div>
</div>
@endsection