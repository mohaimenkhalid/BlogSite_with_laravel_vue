<template>
	<div>
	
		<div class="container-fluid">
        <div class="row justify-content-around" >
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" >
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Category Name</label>
                    <input type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('category_name') }" v-model="form.category_name" name="category_name" placeholder="Enter category name">
                    <has-error :form="form" field="category_name"></has-error>
                  </div>
        
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" @click.prevent="updateCategory()" >Update</button>
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
	name: 'Edit',
	data(){
		return{

			form: new Form({
	        category_name: '',
     		}),

     		category_id: 0,
		}
	},

	mounted(){
		this.category_id = this.$route.params.categoryid;
		this.EditCategory();
		console.log(this.category_id);
	},

	methods: {
		EditCategory(){

     		this.form.get('/editcategory/' + this.category_id )
        		.then((response)=>{
        			this.form.category_name = response.data.category;
        		})
        		.catch(()=>{

        		})
		},

		updateCategory(){
			 // Submit the form via a POST request
     			 this.form.post('/updatecategory/'+ this.category_id )
        		.then((response)=>{
        		this.$router.push('/category-list');
        			Toast.fire({
					     type: 'success',
					      title: 'Category Updated successfully!!'
					     })
        		})
        		.catch(()=>{

        		})
		}
	}
}
</script>