export default{

	state: {
	    category: []
	  },

	getters:{

		getCategory:state=>{
			return state.category;
		}

	  },
	mutations: {
	    setcategories(state, payload){
	    	state.category = payload;
	    }
	  },
	actions:{

		allCategory(context){
			axios.get('/category')
			.then((response)=>{
				 context.commit('setcategories', response.data.categories);
			});
		}

	  }
}