<template>
	
<span>
	<section id="inner-headline">
      <div class="container">
        <div class="row">
          <div class="span4">
            <div class="inner-heading">
              <h2>Blog left sidebar</h2>
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
            <article>
              <div class="row">
                <div class="span8">
                  <div class="post-image">
                    <div class="post-heading">
                      <h3><a href="#">{{ getsingleblogPost.title }}</a></h3>
                      <div class="bottom-article">
                    <ul class="meta-post">
                      <li><i class="icon-calendar"></i><a href="#"> {{ getsingleblogPost.created_at }}</a></li>
                    </ul>
                  </div>
                    </div>
                    <img :src="'uploadimage/'+ getsingleblogPost.photo" alt="" />
                  </div>
                  <p>
                    {{ getsingleblogPost.description }}
                  </p>

                  <div class="bottom-article">
                    <ul class="meta-post">
                      <li v-if="getsingleblogPost.user"><i class="icon-user"></i><a href="#"> {{ getsingleblogPost.user.name }}</a></li>
                      <li v-if="getsingleblogPost.category"><i class="icon-folder-open"></i><a href="#" > {{ getsingleblogPost.category.name }}</a></li>
                      <li><i class="icon-tags"></i><a href="#">Web design</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </article>
          
        </div>

        <Blogsidebar></Blogsidebar>
    </div>
</div>
</section>
</span>
</template>

<script>
import Blogsidebar from "./BlogSidebar.vue";
	export default{
		
		data(){
			return {
				postid: 0,
			}
		},	

		mounted(){
			this.singlepost();
		},

		computed:{
			getsingleblogPost(){
				return this.$store.getters.getsingleblogPost;
			}
		},

    methods:{

      singlepost(){
        this.postid = this.$route.params.postid;
        this.$store.dispatch("getPostById", this.postid);
      }
    },

    watch:{
        $route(to, form){
          this.singlepost();
        }
    },

		components:{
	      Blogsidebar
	    }

	}
</script>

