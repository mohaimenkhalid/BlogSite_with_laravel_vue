<template>
	<div>
	
		<div class="container-fluid">
        <div class="row justify-content-around" >
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add New Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" @click.prevent="addCategory()">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Category Name</label>
                    <input type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('category_name') }" v-model="form.category_name" name="category_name" placeholder="Enter category name">
                    <has-error :form="form" field="category_name"></has-error>
                  </div>
        
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" >Save</button>
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
	name: 'New',
	data(){
		return{

			form: new Form({
	        category_name: '',
     		})
		}
	},

	mounted(){

	},

	methods: {
		addCategory(){
			 // Submit the form via a POST request
     			 this.form.post('/add-category')
        		.then((response)=>{
        			Toast.fire({
					  type: 'success',
					  title: 'Category added successfully!!'
					})
        		})
        		.catch(()=>{

        		})
		}
	}
}
</script>