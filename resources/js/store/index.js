import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export default new Vuex.Store({
    state:{
        bookings:[],
        users:[],
        error:''

    },
    mutations:{
        set_error(state,error){
            state.error = error;
        },
        set_users(state,users){
            state.users = users;
        },
        set_bookings(state,bookings){
            state.bookings = bookings;
        }
    },
    actions:{  
        logout(){
            //remove token
            localStorage.removeItem('token');            
            //redirect
            window.location.replace('/api/login');
        } 
    },
    getters:{
        getUsers: state => {
            return state.bookings;
        }
    }
});