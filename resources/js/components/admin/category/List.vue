<template>
	<div>
		
		<section class="content">
      <div class="row justify-content-around">
        <div class="col-8">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Category List</h3>
              <div class="card-tools">
              	<router-link to="/add-category">
              		<button class="btn btn-primary">Add category</button>
              	</router-link>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>S/L</th>
                  <th>Category Name</th>
                  <th>Date</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(category, index) in getCategory">
                  <td>{{ index+1 }}</td>
                  <td>{{ category.name }}</td>
                  <td>{{ category.created_at | timeformate}}</td>
                  <td>
                  	<router-link :to="'/edit-category/'+ category.id" ><button class="btn btn-primary" >Edit</button></router-link>
                  	<a href="" @click.prevent="deletecategory(category.id)" class="btn btn-danger">Delete</a>
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
    this.$store.dispatch("allCategory");
  },

  methods:{

    deletecategory(id){
      axios.get('/category/'+id)
      .then((response)=>{
        this.$store.dispatch("allCategory");
          Toast.fire({
            type: 'success',
            title: 'Category Deleted successfully!!'
          })
      })
      .catch(()=>{

      })
      ;
    }

  },

  computed: {
    getCategory(){
       return this.$store.getters.getCategory;
    }

  }
}
</script>