@extends('layouts.admin')
@section('title', 'post')
@section('content')
<div class="col-8">
	<div class="card">
		<div class="card-body">
			<div class="table table-responsive">
				<a href="{{route('posts.create')}}" class="btn btn-success btn-sm mb-3 float-right"><i class="fas fa-fw fa-plus fa-sm"></i> Create Post</a>
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Image</th>
							<th>Title</th>
							<th>Category</th>
							<th class="text-center">Action</th>
						</tr>
					</thead>
					<tbody>
						@if( isset($posts) )
							@forelse($posts as $post)
							<tr>
								<td>
									<img src="{{asset('storage/'.$post->featured)}}" width="50" height="50" alt="img" style="">

								</td>
								<td>{{$post->title}}</td>
								<td>{{ $post->categories->name}}</td>
								<td>
									<a href="{{ route('posts.edit', ['post' => $post->id]) }}" class="btn btn-info btn-sm">Edit</a>

									<form class="d-inline" action="{{route('posts.destroy', $post->id)}}" method="post">
									@csrf
									@method('delete')
									<button type="submit" class="btn btn-danger btn-sm">Trahsed</button>
							</form>
								</td>
							</tr>
							@empty
							<tr>
								<td class="text-center">Data Kosong</td>
							</tr>
							@endforelse

						@endif
						@if( isset($trashed) )
							@forelse($trashed as $trahsed)

							<tr>
								<td>
									<img src="{{asset('storage/'.$trahsed->featured)}}" width="50" height="50" alt="img" style="">

								</td>
								<td>{{$trahsed->title}}</td>
								<td>{{ $trahsed->categories->name}}</td>
								<td>
									<a href="{{route('restore', ['id' => $trahsed->id]) }}" class="btn btn-primary btn-sm">Restore</a>

									<form class="d-inline" action="{{route('delete-permanen', ['id' => $trahsed->id])}}" method="post">
										@csrf
										@method('delete')
										<button type="submit" class="btn btn-danger btn-sm">Delete</button>
									</form>
								</td>
							</tr>
							@empty
							<tr>
								<td class="text-center">Trashed Kosong</td>
							</tr>
							@endforelse
						@endif
						
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
	
@stop