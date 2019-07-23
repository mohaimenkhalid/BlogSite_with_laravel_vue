import AdminHome from './components/admin/AdminHome.vue'
//import ExampleComponent from './components/ExampleComponent.vue'
//category
import CategoryList from './components/admin/category/List.vue'
import AddCategory from './components/admin/category/New.vue'
import EditCategory from './components/admin/category/Edit.vue'
//post
import PostList from './components/admin/post/List.vue'
import AddPost from './components/admin/post/New.vue'
import EditPost from './components/admin/post/Edit.vue'

//Blog..
import PublicHome from './components/public/PublicHome.vue'
import BlogPost from './components/public/blog/BlogPost.vue'
import SingleBlog from './components/public/blog/SingleBlog.vue'
import CategoryBlogPost from './components/public/blog/CategoryBlogPost.vue'


export const routes = [
//Admin routes....
  { 
  	path: '/home',
    component: AdminHome
  },

  {
  	path: '/category-list',
    component: CategoryList
  },

  {
  	path: '/add-category',
    component: AddCategory
  },

  {
    path: '/edit-category/:categoryid',
    component: EditCategory
  },

  //post

  {
    path: '/post-list',
    component: PostList
  },

  {
    path: '/add-post',
    component: AddPost
  },

  {
    path: '/edit-post/:postid',
    component: EditPost
  },

  //Blog Routes....

  {
    path: '/',
    component: PublicHome
  },

  {
    path: '/blog',
    component: BlogPost
  },

  {
    path: '/blog/:postid',
    component: SingleBlog
  },

  {
    path: '/category/:categoryid',
    component: CategoryBlogPost
  },
 
]
