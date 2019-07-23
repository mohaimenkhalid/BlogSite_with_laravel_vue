<template>
	<div>
		
		<div class="span4">
            <aside class="right-sidebar">
              <div class="widget">
                <form class="form-search">
                  <input placeholder="Type something" type="text" class="input-medium search-query" v-model="keyword" @keyup="RealSearch">
                  <button type="submit" class="btn btn-square btn-theme" @click.prevent="RealSearch">Search</button>
                </form>
              </div>
              <div class="widget">
                <h5 class="widgetheading">Categories</h5>
                <ul class="cat">
                  <li v-for="category in allcategories"><i class="icon-angle-right"></i><router-link :to="'/category/'+ category.id">{{ category.name }}</router-link><span> (20)</span></li>
                  
                </ul>
              </div>
              <div class="widget">
                <h5 class="widgetheading">Latest posts</h5>
                <ul class="recent">
                  
                  <li v-for="(post, index) in getblogPost" v-if="index<5">
                    <a href="#"><img :src="'uploadimage/'+ post.photo" width="100" height="100" class="pull-left" alt="" /></a>
                    <h6><router-link :to="'/blog/'+ post.id">{{ post.title | shortlength(40, '...') }}</router-link></h6>
                    <p>
                      {{ post.description | shortlength(100, '...')}}
                    </p>
                  </li>
                </ul>
              </div>
              <div class="widget">
                <h5 class="widgetheading">Popular tags</h5>
                <ul class="tags">
                  <li><a href="#">Web design</a></li>
                  <li><a href="#">Trends</a></li>
                  <li><a href="#">Technology</a></li>
                  <li><a href="#">Internet</a></li>
                  <li><a href="#">Tutorial</a></li>
                  <li><a href="#">Development</a></li>
                </ul>
              </div>
            </aside>
	</div>
</div>
</template>

<script>
	export default{
      name: 'blogsidebar',

      data(){
        return{

          keyword: ''

        }
      },

      mounted(){
          this.$store.dispatch("allcategories");
          this.$store.dispatch("getblogpost");
      },

      computed:{
        allcategories(){
          return this.$store.getters.getallcategories;
        },

        getblogPost(){
        return this.$store.getters.getblogPost;
      }
         
      },

      methods:{

        RealSearch(){
           this.$store.dispatch("searchPost", this.keyword);
        }

      }

        }
	
</script>