<template>
	<div>
		
		<section class="content">
      <div class="row justify-content-around">
        <div class="col-10">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Post List</h3>
              <div class="card-tools">
              	<router-link to="/add-post">
              		<button class="btn btn-primary">Add New Post</button>
              	</router-link>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>S/L</th>
                  <th>User</th>
                  <th>Category</th>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Photo</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(post, index) in getAllPost">
                  <td>{{ index+1 }}</td>
                  <td v-if="post.user">{{ post.user.name }}</td>
                  <td v-if="post.category">{{ post.category.name }}</td>
                  <td>{{ post.title | shortlength(20, "...")}} </td>
                  <td>{{ post.description | shortlength(40, "...") }}</td>
                  <td><img :src="ourImage(post.photo)" width="100"></td>
                  <td>
                  	<router-link :to="'/edit-post/'+ post.id"><button class="btn btn-primary" >Edit</button></router-link>
                  	<a href="" @click.prevent="deletepost(post.id)"  class="btn btn-danger">Delete</a>
                  </td>
                  
                </tr>
          
                
              
                </tbody>
                
              </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
</section>
	</div>
</template>

<script>
export default{
	name: 'List',

  data(){
    return {

    } 
  },

  mounted(){
  	this.$store.dispatch("getallpost");
  },

  methods:{

    ourImage(img){
      return "uploadimage/"+img;
    },

    deletepost(id){
        axios.get('/deletepost/'+id)
        .then(response=>{
          this.$store.dispatch("getallpost");
          Toast.fire({
            type: 'success',
            title: 'Post Deleted successfully!!'
          })
        })
        .catch(response=>{
          
        })
    }

  },

  computed:{
  		getAllPost(){
  			return this.$store.getters.getAllPost;
  		}
  }
}
</script>