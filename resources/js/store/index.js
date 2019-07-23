export default{

	state: {
	    category: [],
	    post: [],
	    blogpost: [],
	    singleblogpost:[],
	    allcategories:[],
	    categorypost: []
	  },

	getters:{

		getCategory:state=>{
			return state.category;
		},

		getAllPost:state=>{
			return state.post;
		},

		getblogPost:state=>{
			return state.blogpost;
		},

		getsingleblogPost:state=>{
			return state.singleblogpost;
		},

		getallcategories:state=>{
			return state.allcategories;
		},

		getcategorypost:state=>{
			return state.categorypost;
		}


	  },
	mutations: {
	    setcategories(state, payload){
	    	state.category = payload;
	    },

	    setposts(state, payload){
	    	state.post = payload;
	    },

	     setblogpost(state, payload){
	    	state.blogpost = payload;
	    },

	    setsingleblogpost(state, payload){
	    	state.singleblogpost = payload;
	    },

	     setallcategories(state, payload){
	    	state.allcategories = payload;
	    },
	    setcategorypost(state, payload){
	    	state.categorypost = payload;
	    },

	    setSearchPost(state, payload){
	    	state.blogpost = payload;
	    }

	  },

	actions:{

		allCategory(context){
			axios.get('/category')
			.then((response)=>{
				 context.commit('setcategories', response.data.categories);
			});
		},

		getallpost(context){
			axios.get('/post')
			.then(response=>{
				context.commit('setposts', response.data.posts);
			});
		},

		getblogpost(context){
			axios.get('/blogpost')
			.then(response=>{
				context.commit('setblogpost', response.data.blogposts);
			});
		},

		getPostById(context, payload){
			axios.get('/singlepost/'+ payload)
			.then(response=>{
				context.commit('setsingleblogpost', response.data.blogpost);
			});
		},

		allcategories(context){
			axios.get('/categories')
			.then((response)=>{
				 context.commit('setallcategories', response.data.allcategories);
			});
		},

		getcategoryblogpost(context, payload){
			axios.get('/categorypost/'+ payload)
			.then(response=>{
				context.commit('setcategorypost', response.data.categoryposts);
			});
		},

		searchPost(context, payload){
			axios.get('/search?query='+ payload)
			.then(response=>{
				context.commit('setSearchPost', response.data.posts);
			});
		},


	  }
}