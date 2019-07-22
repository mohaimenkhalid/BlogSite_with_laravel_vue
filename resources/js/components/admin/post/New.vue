<template>
	<div>
	
		<div class="container-fluid">
        <div class="row justify-content-around" >
          <!-- left column -->
          <div class="col-md-10">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add New Post</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
             <form role="form" enctype="multipart/form-data" @submit.prevent="addNewPost()">
                <div class="card-body">
                  <div class="form-group">
                    <label for="postid">Title</label>
                    <input type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('title') }" v-model="form.title" name="title" placeholder="Enter category name">
                    <has-error :form="form" field="title"></has-error>
                  </div>

                  <div class="form-group">
                    <label for="description">Description</label>
                    <!-- <textarea class="form-control" :class="{ 'is-invalid': form.errors.has('description') }" v-model="form.description" name="description" placeholder="Enter category name"></textarea> -->
                    <markdown-editor v-model="form.description" :class="{ 'is-invalid': form.errors.has('description') }"></markdown-editor>
                    <has-error :form="form" field="description"></has-error>
                  </div>

                  <div class="form-group">
                    <label for="category_id">Category</label>
                    <select class="form-control" :class="{ 'is-invalid': form.errors.has('category_id') }"  v-model="form.category_id">
                    	<option disabled value>Select a Category</option>
                    	<option v-for="category in getCategory" :value="category.id">{{ category.name }}</option>
                    </select>
                    <has-error :form="form" field="category_id"></has-error>
                  </div>


                  <div class="form-group" >
                  	<label for="photo">Image</label>
                   <input @change = "changePhoto($event)"  id="photo" class="form-control" name="photo" type="file" :class="{ 'is-invalid': form.errors.has('photo') }"><br><br>
                    <img :src="form.photo" alt="" width="100" height="100">
                        <has-error :form="form" field="photo"></has-error>
                  </div>
                  
        
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Add</button>
                </div>
              </form>
            </div>
        </div>
    </div>
</div>
</div>


	</div>
</template>

<script>
	export default{
		name: 'new',

		data(){
			return {

				form: new Form({
	        		title: '',
	        		description: '',
	        		category_id: '',
	        		photo : '',
     			})	

			}
		},

		mounted(){
			this.$store.dispatch("allCategory");
			console.log(this.form.photo);
		},

		computed:{
			getCategory(){
		       return this.$store.getters.getCategory;
		    }

		},

		methods:{

			changePhoto(event){
				  let file = event.target.files[0];
				  let fileName = file.name;
			     let fileExtension = fileName.substr((fileName.lastIndexOf('.') + 1));
				console.log(fileExtension);
				  if ((fileExtension != 'jpg') || (file.size>1048576)) {

				  	 $('#photo').val('');
				  	Swal.fire({
					  type: 'error',
					  title: 'Oops...',
					  text: 'Image size must not be greater then 1MB(1024kb)! And upload only jpeg, jpg, png, gif!',
					  footer: 'Please try again!'
					})

				  }else{

				  	 let reader = new FileReader();
                     reader.onload = event => {
                         this.form.photo = event.target.result;
                         console.log(event.target.result);
                     };
                     reader.readAsDataURL(file);

				  }
				 
			},


			addNewPost(){


				this.form.post('/savepost')
				.then(response=>{
					this.$router.push('/post-list');
					Toast.fire({
					     type: 'success',
					      title: 'Post added successfully!!'
					     })

				})
				.catch(response=>{

				});
			}		

		}
	}
</script>