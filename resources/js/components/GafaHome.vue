<template>
  <div >
    <!--Slogan-->
    <div class="row main justify-content-center align-items-center " style="margin:0;">
      <div>
        <div class="slogan text-center">
          <h1 class="text-big">Great Alliance Financial <br /> Advisers</h1>
        </div>
      </div>
    </div>
    <!--Picture Links-->
    <div class="pt-3 pb-3 row justify-content-center align-items-center text-center options">
      <div class="col-md-3 col-11 parent">
        <div class="adviser  option1">
          <div style="margin:0;" class="row justify-content-center align-items-center cap2 ">
            <button type="button" onclick="location.href='https://app.hubspot.com/login'" name="button" class="adviser-link" >INSURANCE</button>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-11 parent ">
        <div class="adviser option2">
          <div style="margin:0;" class="row justify-content-center align-items-center cap2">
            <button type="button" onclick="location.href='https://app.hubspot.com/login'" name="button" class="adviser-link" >LOANS</button>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-11 parent ">
        <div class="adviser option3">
          <div style="margin:0;" class="row justify-content-center align-items-center cap2">
            <button type="button" onclick="location.href='https://app.hubspot.com/login'" name="button" class="adviser-link" >MORTAGAGE</button>
          </div>
        </div>
      </div>
    </div>
    <!--Carrousel of information-->
    <div id="carouselExampleIndicators" class="carousel slide car-items pt-4" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      </ol>
      <!--Carrousel of information Vision-->
      <div class="carousel-inner  ">
        <div class="carousel-item ">
          <div class="row justify-content-center align-items-center">
            <div class="col-10 col-md-6">
              <h4 class="mt-2 text-center">OUR VISION-GAFA CULTURE</h4>
              <p class="text-justify">We strive to be the Preferred team of Financial Advisers that engages our clients through active listening and understanding of
                their needs and concerns, as they transition through different life stages. We are committed to providing our clients with quality financial advice and make suitable recommendations to meet their
                financial needs in a fair and ethical manner. Our Core Values reflect how we care for our clients, stakeholders and partners</p>
                <ul class="mb-5">
                  <li><span>Integrity:</span>Provide financial advisory services with integrity</li>
                  <li><span>Objectivity:</span>Understanding our clients’ needs objectively</li>
                  <li><span>Honesty:</span>It involves being trustworthy, loyal, fair and sincere in all business relationships</li>
                  <li><span>Transparency:</span>No hidden agendas or conditions, encouraging full disclosure of information in all business relationships</li>
                  <li><span>Competence:</span>Keeping ourselves abreast with changes, updating our knowledge and skill necessary to provide professional advisory services competently</li>
                  <li><span>Fairness:</span>Be fair and reasonable in all business relationships. Always disclose conflicts of interest Confidentiality: Protect the confidentiality of all clients’ information</li>
                  <li><span>Professionalism:</span>Act in a manner that demonstrates exemplary professional conduct</li>
                  <li><span>Communication:</span>Consistent communication and engagement with our customers creates everlasting and meaningful relationships</li>
                  <li><span>Ethical Behaviour:</span>The Key Principle which forms the foundation of all our business relationships.</li>
                </ul>
            </div>
          </div>
        </div>
        <div class="carousel-item active car-item">
          <div class="index-bar">

          </div>
          <div class="mt-5 mb-3 index-mission">
            <div class="row justify-content-center align-items-center">
              <div class="col-10 col-md-5 text-center">
                <!--Carrousel of Mission-->
                <h4>GAFA'S Mission</h4>
                <p class="text-justify mt-4">We are committed to maintaining the highest standards of integrity and professionalism in our relationship with you, our clients. We endeavor to know and understand your financial situation and provide you with sound financial advice to help you reach your goals. We work hand in hand with you to create efficient financial strategies that will help you to “preserve what you already have, prepare you and your family for financial uncertainty, and pass your wealth to your heirs in the most efficient manner possible.</p>

                <p class="text-justify">” We understand that you, our clients are individuals with unique needs so we will provide unique options through professionally
                  developed and well managed financial strategies.</p>
                  <hr class="mt-3 index-separator">
              </div>
            </div>
          </div>
          <div class="index-bar">

          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

    <div class="row">
      <div class="col-md-4">
        
      </div>
    </div>


    <div class="index-final">
      <div class="row">
        <div style="margin:0;" class="row justify-content-center align-items-center col-12 col-md-6 index-contact">
            <div class="col-10 col-sm-8 ">
                <h3 class="mt-5">Great Alliance Financial Advisers Limited</h3>
                <div class="row text-left">
                  <div class="col-12">
                    <hr>
                  </div>

                </div>
                <h4>09 393 7977</h4>
                <h4 class="mb-4">UNIT 9 , 51 WILLIAM PICKERING DRIVE, ROSEDALE AUCKLAND 0632</h4>
                <h4 class="mb-5">ENQUIRY@GAFA.CO.NZ</h4>
            </div>
        </div>
        <div class="col-12 col-md-6 pl-0">
            <map-location></map-location>
        </div>
      </div>
    </div>
    
  </div>

</template>


<script>
import MapLocation from './MapLocation';
export default {
  components:{
      MapLocation      
  }
}
</script>



<style scope>
  .main{
    width: 100%;
    height: 850px;
    background-image: url("../../../public/img/main-bg.jpg");
    background-size: cover;
    background-position: center center;
    background-repeat: no-repeat;
  }
  .slogan{
  border-bottom: 1px solid white;
  }
  .slogan h1{
    color:white;
    font-size: 4rem;
  }
  /***option*****/
  .options{
    background-color: #DEE1E3;
  }
  .option{
    height: 200px;
    background-size: cover;
    background-position: center center;
    margin-right: 10px;
    background-repeat: no-repeat;
    border-left: 1px solid black;
    border-bottom: 1px solid black;
    }
  .option1{
    background-image: url("https://lh3.googleusercontent.com/AC120_2K7jPqY-sekUqbWIq4Onat-x9kMKz0QUNRO0FpMbiSsByp2hN34BPet-o_HUbrtffFP4X4WIGueSK-PxLf3K_xmGW-uNTpz6o=s652");
    margin-right: 30px;
  }
  .option2{
    background-image: url("https://lh3.googleusercontent.com/zwVRr2dTStQFpivJSHwXycNjaG9IEjzCX0Y1N-q3bHyCCkFqmr2pCrRd75b2oPrVCHql_B-dzXdBHm9O3mVBnrJp3xvJth7yMpG7t5A=s652");
    margin-right: 30px;
  }
  .option3{
    background-image: url("https://lh3.googleusercontent.com/KoHGBwZkaeFAmTIcucIU1YNIpoZiDlU0JySqQXBWeBeGvdrcTX5H-q9RDq1N5AnNce9Q0Y1ASQocvbvoewPdsPNJNvh-bjDzk74jHV7T=s652");
  }
  .option h4{
    color: white;
    position: relative;
  }

  .parent {
  height: 200px;
  width: 300px;
  padding: 0px!important;
  margin-left: 10px;
  margin-right: 10px;
  overflow: hidden;
}

.adviser{
  height: 100%;
  width: 100%;
  background-size: cover;
  background-position: center center;
  background-repeat: no-repeat;
  transition: all 1.5s ease-in-out;
}
 /*************buttons************/
.adviser:hover{
  transform: scale(1.1);
}
.cap{
  margin-left: 0px;
  margin-right: 0px;
  width: 100%;
  height: 100%;
  background: rgba(0,0,0,.5);
}
.cap2{
  margin-left: 0px;
  margin-right: 0px;
  width: 100%;
  height: 100%;
  background: rgba(0,0,0,.2);
}
.adviser-link {
  width: 100px;
  height: 25px;
  color: white;
  border: 2px solid;
  font-size: 1.2rem!important;
  font-family: 'Abel', sans-serif;
  position: absolute;
  background-color: rgba( 255, 255, 255, 0.5 );

}
.adviser-link:hover{
  background-color: white;
  border-color: white;
  color: rgb(69, 69, 69);
  cursor:pointer;
}
  /*************carrousel************/
.carousel{
  min-height: 645px;
}
.car-items{
  background-color: #DEE1E3;
}
.carousel-inner ul li span{
  font-weight: bold;
}
.index-bar{
  background-color:#1F4FB1;
  min-height: 140px;
}
.index-separator{
  width: 150px;
  background-color: black;
  margin-top: 10px;
  margin-bottom: 50px;
}
.carousel p{
  font-size: 14px;
}
.index-contact{
  background-color: #282828;
}
.index-contact h3{
  color: white;
  font-size: 22px;
  font-family: Montserrat;
}
.index-contact h4{
  color: white;
  font-size: 14px;
  font-family: Montserrat;
}
.index-final hr{
  background-color: white;;
}
#mapa{
  height: 300px;
  background-color: green;
}
</style>