export default{

	state: {
	    category: [],
	    post: []
	  },

	getters:{

		getCategory:state=>{
			return state.category;
		},

		getAllPost:state=>{
			return state.post;
		},

	  },
	mutations: {
	    setcategories(state, payload){
	    	state.category = payload;
	    },

	    setposts(state, payload){
	    	state.post = payload;
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

	  }
}