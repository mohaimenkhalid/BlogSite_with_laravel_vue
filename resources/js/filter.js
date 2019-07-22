import Vue from 'vue';

/*..............Moment js........................*/
import moment from 'moment'

Vue.filter('timeformate', arg=>{
  return moment(arg).format("MMMM Do YYYY");

})

Vue.filter('shortlength', (text, length, suffix)=>{

	return text.substring(0, length)+suffix;
})
