<template>
    <div>
        <div class="row w-100 mt-5">
            <!--Sidebar-->
            <div class="col-md-2">
                <div class=" row justify-content-center">
                    <div class="w-75 mt-5">
                        <button @click="logOut">
                            logout
                        </button>
                        <!--Show Gafa Users-->
                        <div v-for="user in users" :key="user.id">
                            <button 
                                style="margin:0;" 
                                class="btn btn-outline-secondary btn-block"
                                @click="listBookings(user.id)"
                            >{{user.name}}</button>
                        </div>                        
                    </div><!--Close TDiv Gafa Users-->
                </div>
            </div>
            <div class="col-md-10">
                <div class="container">
                    <div class="row justify-content-center py-5">
                        <div class="w-100">
                            <table class="table table-striped">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Customer</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Booking</th>
                                    <th scope="col">Comments</th>
                                    <th scope="col">State</th>
                                    <th class="text-center" colspan="2" scope="col">Options</th>
                                </tr>
                                </thead>
                                <tbody>                                    
                                    <tr v-for="(booking,index) in bookings" :key="index">
                                        <th scope="row">{{ index + 1 }}</th>
                                        <!--Booking Customer Name-->
                                        <td>
                                            <div v-if="edit === true && bookingId === booking.id">
                                                <input type="text" id="customer" :value="booking.customer">
                                            </div>
                                            <div v-else>
                                                {{booking.customer}}
                                            </div>                                            
                                        </td>
                                        <!--Booking Adddress-->
                                        <td>
                                            <div v-if="edit === true && bookingId === booking.id">
                                                <input type="text" id="address" :value="booking.address">
                                            </div>
                                            <div v-else>
                                                {{booking.address}}
                                            </div>                                            
                                        </td>
                                        <!--Booking Time-->
                                        <td>
                                            <div v-if="edit === true && bookingId === booking.id">
                                                <input  type="datetime-local" id="booking">
                                            </div>
                                            <div v-else>
                                                {{booking.booking}}
                                            </div>                                            
                                        </td><!--Booking comments-->
                                        <td>
                                            <div v-if="edit === true && bookingId === booking.id">
                                                <textarea id="comments" rows="4" :value="booking.comments"
                                                ></textarea>
                                            </div>
                                            <div v-else>
                                                {{booking.comments}}
                                            </div>                                            
                                        </td>
                                        <!--Booking State-->
                                        <td>
                                            <div v-if="edit === true && bookingId === booking.id">
                                                <button 
                                                    :class="bookingState == 0 ? 'text-danger' : 'text-success' " 
                                                    class="btn" 
                                                    style="background-color:transparent"
                                                    @click="bookingState = !bookingState"
                                                >       
                                                    <div v-if="bookingState === true">
                                                        complete
                                                    </div>
                                                    <div v-else>
                                                       {{booking.state === 0 ? 'Incomplete' : 'Completed'}}
                                                    </div>
                                                </button>
                                            </div>
                                            <div v-else>
                                                {{booking.state === 0 ? 'Incomplete' : 'Completed'}}
                                            </div>                                            
                                        </td>
                                        <!--Edit Button-->
                                        <td>  
                                            <div v-if="edit === true && bookingId === booking.id">
                                                <button 
                                                    class="btn btn-primary-outline" 
                                                    style="color:#7ec324;" 
                                                    type="submit"
                                                    @click="UpdateBooking(booking.id)">
                                                    <i class="far fa-save"></i>
                                                </button>
                                            </div>
                                            <div v-else>                                                   
                                                <button 
                                                    class="btn btn-primary-outline" 
                                                    style="color:#7ec324;" 
                                                    type="submit"
                                                    @click="edit = !edit; bookingId = booking.id; bookingState = booking.state">
                                                    <i class="fas fa-user-edit"></i>
                                                </button>
                                            </div>
                                        </td>
                                        <!--Delete Button-->
                                        <td>
                                            <div>
                                                <button 
                                                    class="btn btn-primary-outline" 
                                                    style="color:#c32424;" 
                                                    type="submit"
                                                    @click="deleteBooking(booking.id)">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </div>                                
                                        </td>
                                    </tr>
                                </tbody>                
                            </table>           
                        </div>            
                    </div><!--Close Table Row-->
                </div><!--Close Container-->
            </div><!--Close Booking Information-->
        </div><!--Close main Row-->       
    </div>
</template>
<script>
export default {
    data(){
        return{
            //variables to delete
            userId:null,

            //evariables to edit
            edit:false,
            bookingId:null,
            bookingState:null
        }
    },
    methods:{
        //bring all users
        getUsers(){
            axios
            .get('http://127.0.0.1:8000/api/manager/listusers')
            .then(response => {
                this.$store.commit('set_users',response.data);
            });
        },
        //logout
        logOut(){            
            this.$store.dispatch('logout');
        },
        //list bookings of the user
        listBookings(id){
            axios
            .get('http://127.0.0.1:8000/api/manager/listbookings/'+id)
            .then(response => {
                this.$store.commit('set_bookings',response.data);
            });
            this.userId = id;
        },
        //delete a booking
        deleteBooking(id){
            //confirm delete booking
            this.$swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.value) {

                //delete the booking
                axios
                .delete('http://127.0.0.1:8000/api/manager/listbookings/'+id)
                .then(response => {
                });
                
                //list booking after deelte
                this.listBookings(this.userId);

                this.$swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                )
            }
            })
        },
        //update a booking
        UpdateBooking(id){

            //initial params
            var params = {
                        customer: document.querySelector('#customer').value,
                        address: document.querySelector('#address').value,
                        comments: document.querySelector('#comments').value,
                        booking: document.querySelector('#booking').value,
                        state:this.bookingState
                    }

            //call axios to update
            axios
            .put('http://127.0.0.1:8000/api/manager/listbookings/'+id,params)
            .then(response => {
            });
            //list booking after deelte
            this.listBookings(this.userId);

            //reset variables
            this.edit = false;
        }

    },
    computed:{
        //bring gafa users from the store
        users(){
            return this.$store.state.users;
        },
        //bring bookings from the user selected
        bookings(){
            return this.$store.state.bookings;
        }
    },
    created(){
        //redirect if the user is not authenticated
        if(localStorage.hasOwnProperty('token')){
            
            //header to api authorization
            axios.defaults.headers.common["authorization"] = "Bearer " + localStorage.getItem('token');
        }
        else{
            //window.location.replace('/api/login');
        }
        //bring users
        this.getUsers();
    }
}
</script>