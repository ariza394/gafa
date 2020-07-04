<template>
    <div>
        <div class="main-contact" style="margin:0;">
            <div style="margin: 0;" class="black-bg row justify-content-center align-items-center">
                <div class=" text-center">
                    <h1 class="text-big">Contact US</h1>
                    <h2 style="color:white;">Leave us a messagge, we will glad to answer you as soon as possible</h2>
                </div>
            </div>
        </div>
        <div class="contact-information pb-5">
            <div style="padding-top:100px;" class="row justify-content-center pb-2">
                <h2>Get In Touch With Us</h2>
            </div>
            <div class="row justify-content-center align-items-center mt-5">
                <div class="col-md-4 m-4">
                    <form action="">
                        <!--Name-->
                        <div class="form-group row">
                            <div class="col-md-10">
                                <input 
                                    id="name" 
                                    type="text"
                                     class="form-control" 
                                     placeholder="Name"
                                     name="name" 
                                     value=""
                                >
                            </div>
                        </div>
                        <!--Email-->
                        <div class="form-group row">
                            <div class="col-md-10">
                                <input 
                                    id="email" 
                                    type="email"
                                     class="form-control" 
                                     placeholder="Your Email Address"
                                     name="email" 
                                     value=""
                                >
                            </div>
                        </div>
                        <!--Comments-->
                        <div class="form-group row">
                            <div class="col-md-10">
                                <textarea 
                                    class="form-control" 
                                    id="comment" 
                                    name="comment"
                                    rows="4"
                                    value=""
                                    placeholder="Message"
                                ></textarea>
                            </div>
                        </div>
                        <button class="btn-contact btn btn-primary">
                            SUBMIT
                        </button>
                    </form>
                </div>
                <!--Right Information-->
                <div class="col-md-4 m-5">
                    <div class="row">
                        <p class="icon mr-5"><i class="fas fa-map-marker-alt"></i></p>
                        <p class="mt-2">Unit 9, 51 William Pickering Drive</p>
                    </div>
                    <div class="row ">
                        <p class="icon mr-5"><i class="fas fa-phone-alt"></i></p>
                        <p class="mt-2">7396239</p>
                    </div>
                    <div class="row ">
                        <p class="icon mr-5"><i class="fas fa-envelope"></i></p>
                        <p class="mt-2">melissa@gafa.co.nz</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style>
.main-contact{
    width: 100%;
    height: 500px;
    background-image: url("../../../public/img/contact.jpg");
    background-size: cover;
    background-position: center center;
    background-repeat: no-repeat;    
  }
.main-contact .black-bg{
    background-color: rgba(0,0,0,0.2);
    height: 100%;
    width: 100%;
}
h1{
    color:white;
    font-size: 3.4rem;
}
.main-contact h2{
    color:white!important;
}
.contact-information{
    background-color: #E9EBEC;
}
.btn-contact{
    padding: 14px 50px;
}
@media only screen and (max-width: 700px){
    .btn-contact{
        width: 100%;
    }   
}
.icon{
    font-size: 30px;
}
</style>