@extends('layouts.admin')
@section('content')

<div class="col-8">
	<div class="card">
		<div class="card-body">
			<div class="table-responsive">
			<a href="{{route('tags.create')}}" class="btn btn-success float-right mb-2"><i class="fa fa-fw fa-plus fa-lg"></i></a>
				<table class="table">
					<thead>
						<tr>
							<th>Name</th>
							<th colspan="5" class="text-center">Action</th>

						</tr>
					</thead>
					<tbody>
						@forelse($tags as $tag)
						<tr>
							<td width="75%">{{ $tag->name }}</td>
							<td class="text-center"><a class="btn btn-sm btn-info" href="{{route('tags.edit', $tag->id)}}">Edit <span class="glymphicon glymphicon-pencil"></span></a> 
							</td>
							<td class="text-center">
								<form class="d-inline" action="{{route('tags.destroy', $tag->id)}}" method="post">
									@csrf
									@method('delete')
									<button type="submit" class="btn btn-danger btn-sm">Delete</button>
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