<template>
	<span>

<section id="inner-headline">
      <div class="container">
        <div class="row">
          <div class="span4">
            <div class="inner-heading">
              <h2>Blog left sidebar 11</h2>
            </div>
          </div>
          <div class="span8">
            <ul class="breadcrumb">
              <li><a href="#"><i class="icon-home"></i></a><i class="icon-angle-right"></i></li>
              <li><a href="#">Blog</a><i class="icon-angle-right"></i></li>
              <li class="active">Blog with left sidebar</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <section id="content">
      <div class="container">
        <div class="row">
          <div class="span8">


            <article v-for="post in getcategoryposts">
              <div class="row">
                <div class="span8">
                  <div class="post-image">
                    <div class="post-heading">
                      <h3><a href="#">{{ post.title }}</a></h3>
                    </div>
                    <img :src="'uploadimage/'+ post.photo" alt="fhfhf" width="700" height="400" />
                  </div>
                  <p>
                    {{ post.description | shortlength(300, '...')}}
                  </p>
                  <div class="bottom-article">
                    <ul class="meta-post">
                      <li><i class="icon-calendar"></i><a href="#"> {{ post.created_at }}</a></li>
                      <li><i class="icon-user"></i><a href="#"> {{ post.user.name }}</a></li>
                      <li><i class="icon-folder-open"></i><a href="#"> {{ post.category.name }}</a></li>
                      <li><i class="icon-comments"></i><a href="#">4 Comments</a></li>
                    </ul>
                    <router-link :to="'/blog/'+ post.id" class="pull-right">Continue reading <i class="icon-angle-right"></i></router-link>>
                  </div>
                </div>
              </div>
            </article>
            
            
           
            <div id="pagination">
              <span class="all">Page 1 of 3</span>
              <span class="current">1</span>
              <a href="#" class="inactive">2</a>
              <a href="#" class="inactive">3</a>
            </div>
          </div>
          

          <Blogsidebar></Blogsidebar>
          </div>
        </div>
      </div>
    </section>

	</span>
</template>

<script>
import Blogsidebar from "./BlogSidebar.vue";
  export default{
    data(){
      return{
        categoryid: 0,
      }

    },

    mounted(){

      this.categoryposts();
    },

    computed:{

       getcategoryposts(){
        return this.$store.getters.getcategorypost;
      }
    },

    methods:{

      categoryposts(){
        this.categoryid = this.$route.params.categoryid;
        this.$store.dispatch("getcategoryblogpost", this.categoryid);
      }

    },

    watch:{
        $route(to, form){
           this.categoryposts();
        }
    },

    components:{
      Blogsidebar
    },

  }
</script>