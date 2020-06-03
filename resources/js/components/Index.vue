<template>

	<div class="col-8">
	<div class="card">
		<div class="card-body">
			<div class="table table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th>Image</th>
							<th>Title</th>
							<th>Category</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<tr v-for="post, index of posts">
							<td>{{post.id}}</td>
							<td>{{post.title}}</td>
							<td>{{post.description}}</td>
							<td width="300" class="text-center">
								<router-link :to="{name: 'readPost', params:{id:post.id}}" class="btn btn-info">Show</router-link>
								<router-link :to="{name: 'editPost', params:{id:post.id}}" class="btn btn-warning">Edit</router-link> 
								<button class="btn btn-danger" v-on:click="submitPostDelete(post.id, index)">Hapus</button>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>






		<div class="card">
			<div class="card-header">
				<router-link class="btn btn-info float-right" to="/create">Create New Post</router-link>

			</div>
			<div class="card-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>ID</th>
							<th>Title</th>
							<th>Description</th>
							<th class="text-center" colspan="3">Action</th>
						</tr>
					</thead>
					<tbody>
						<tr v-for="post, index of posts">
							<td>{{post.id}}</td>
							<td>{{post.title}}</td>
							<td>{{post.description}}</td>
							<td width="300" class="text-center">
								<router-link :to="{name: 'readPost', params:{id:post.id}}" class="btn btn-info">Show</router-link>
								<router-link :to="{name: 'editPost', params:{id:post.id}}" class="btn btn-warning">Edit</router-link> 
								<button class="btn btn-danger" v-on:click="submitPostDelete(post.id, index)">Hapus</button>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</template>
	<script>
		import axios from 'axios';

		export default{
			data(){
				return {
					posts: [],
					errors: []
				}
			},
			created(){
				axios.get('/posts')
				.then(response => {
					this.posts = response.data
				})
				.catch(e => {
					this.errors.push(e)
				})
			},
			methods:{
            submitPostDelete(id, index){
                if (confirm("click ok to delete")) {
                	axios.delete('/posts/' + id)
                .then(response =>{
                    console.log(response)
                    this.posts.splice(index, 1);
                })
                .catch(e => {
                    this.errors.push(e)
                })
                }
                
            }
        }
		}
	</script>