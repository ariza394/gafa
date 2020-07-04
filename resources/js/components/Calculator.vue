<template>
  
  <div class="calculator">
    <!-- Main Image -->
    <div class="main-calculator" style="margin:0;">
            <div style="margin: 0;" class="black-bg row justify-content-center align-items-center">
                <div class=" text-center">
                    <h1 class="text-big">Calculator</h1>
                    <h2 style="color:white;">Any question? let us know it</h2>
                </div>
            </div>
    </div>
    
     
    <div style="padding: 100px 0 100px 0;" class="row justify-content-center align-items-center">
      <div class="card col-10 col-md-9">
        <div class="card-body">
          <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <!--<a class="navbar-brand" href="#">Navbar</a> -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
              <div class="navbar-nav">
                <a class="nav-item nav-link active" v-on:click="total = 0; tab=0"  href="#">Insurance<span class="sr-only">(current)</span> </a>
                <a class="nav-item nav-link" v-on:click="total = 0; tab=1" href="#">Mortgage</a>
              </div>
            </div>
          </nav>

          <div v-if="tab==0">
            <!-------------- Insurance Calculator ---------------------->
            <div class="row justify-content-center contents">
              <div class="col-12 col-md-6 ">

                <form  @submit.prevent="insuranceCalculator">
                  <div class="form-group">
                    <label for="formGroupExampleInput">Monthly Expenses*</label>
                    <input type="number" required class="form-control mh-100" style="height:30px" v-model="expensives" id="" placeholder="$">
                  </div>
                  <div class="form-group">
                    <label for="formGroupExampleInput2">Monthly Rent/Mortgage Repayment</label>
                    <input type="number" class="form-control mh-100" style="height:30px" v-model="rent" id="" placeholder="$">
                  </div>
                  <div class="form-group">
                    <label for="formGroupExampleInput2">Number Of Children</label>
                    <input type="number" class="form-control mh-100" style="height:30px" v-model="children" id="" placeholder="0">
                  </div>
                  <div v-if="children>0">
                    <div class="form-group">
                      <label for="formGroupExampleInput2">Child Youngest Age</label>
                      <input type="number" class="form-control mh-100" style="height:30px" id="" v-model="childAge" placeholder="0">
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary btn-lg btn-block ">Calculate</button>
                </form>

              </div>
              <div class="col-12 col-md-6">

                <div  v-if="total<1" class="calculator_function">
                  <div id="result">
                    <span>{{ valueDisplayed }}</span>
                  </div>
                  <div id="pad">
                    <div class="pad_btn" id="clear" @click="clear">C</div>
                    <div class="pad_btn" @click="handleOp('/')">/</div>
                    <div class="pad_btn" @click="handleDigit(7)">7</div>
                    <div class="pad_btn" @click="handleDigit(8)">8</div>
                    <div class="pad_btn" @click="handleDigit(9)">9</div>
                    <div class="pad_btn" @click="handleOp('x')">x</div>
                    <div class="pad_btn" @click="handleDigit(4)">4</div>
                    <div class="pad_btn" @click="handleDigit(5)">5</div>
                    <div class="pad_btn" @click="handleDigit(6)">6</div>
                    <div class="pad_btn" @click="handleOp('-')">-</div>
                    <div class="pad_btn" @click="handleDigit(1)">1</div>
                    <div class="pad_btn" @click="handleDigit(2)">2</div>
                    <div class="pad_btn" @click="handleDigit(3)">3</div>
                    <div class="pad_btn" @click="handleOp('+')">+</div>
                    <div id="zero" class="pad_btn" @click="handleDigit(0)">0</div>
                    <div id="equal" class="pad_btn" @click="handleOp('=')">=</div>
                  </div>
                </div>
               
                <div v-if="total>0" class="result">
                  <label for="" class="d-block result__label">You are required </label>
                  <label for="" class="d-block result__total">${{total.toLocaleString()}}</label>
                  <!-- 
                    If you're sure the variable is always Number and never a “number String”, you can do:
                    {{ num.toLocaleString() }}
                    If you want to be safe, do:
                    {{ Number(num).toLocaleString() }}
                  -->
                  <label for="" class="d-block result__label">of insurance for your life </label>
                  <form  @submit.prevent="insuranceCalculatorSubmit">
                    <div class="row justify-content-center">
                      <div class="col-12 col-md-5 mt-2">
                        <input type="number" class="form-control mh-100" style="height:35px" id="" v-model="phoneNumber" placeholder="Contact Number" required>
                      </div>
                      <div class="col-12 col-md-5 mt-2">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Get Free Consultation </button>
                      </div>
                    </div>
                  </form>
                  <p class="explain">
                    Leave your contact details and our insurance specialists will contact you with a free insurance plan.
                  </p>
                </div>
              </div>
            </div>
          </div>

          <!-------------- Mortgage Calculator ---------------------->
          <div v-if="tab==1">
            <div class="row justify-content-center contents">
              <div class="col-12 col-md-6 ">

                <form  @submit.prevent="mortgageCalculator">
                  <div class="form-group">
                    <label for="formGroupExampleInput">Loan Amount*</label>
                    <input type="number" required class="form-control mh-100" style="height:30px" v-model="amount" id="" placeholder="$">
                  </div>
                  <div class="form-group">
                    <label for="formGroupExampleInput2">Loan Interests*</label>
                    <div class="row">
                      <div class="col-6">
                        <input type="number" step='0.1' required class="form-control mh-100" style="height:30px" v-model="interest" id="" placeholder="%" >
                      </div>
                      <div class="col-6">
                        
                        
                        <select placeholder="dse" v-model="interest" class="custom-select">
                          <option disabled value="">Interests</option>
                          <option 
                          v-for="option in options"
                          :key="option">
                          {{ option }}
                          </option>
                        </select>


                      </div>
                    </div>
                    
                  </div>
                  <div class="form-group">
                    <label for="formGroupExampleInput2">Year of Loan*</label>
                    <input type="number" required class="form-control mh-100" style="height:30px" v-model="yearofloan" id="" placeholder="0">
                  </div>
                  
                  <button type="submit" class="btn btn-primary btn-lg btn-block ">Calculate</button>
                </form>

              </div>
              <div class="col-12 col-md-6">

                <div  v-if="total__mortage<1" class="calculator_function">
                  <div id="result">
                    <span>{{ valueDisplayed }}</span>
                  </div>
                  <div id="pad">
                    <div class="pad_btn" id="clear" @click="clear">C</div>
                    <div class="pad_btn" @click="handleOp('/')">/</div>
                    <div class="pad_btn" @click="handleDigit(7)">7</div>
                    <div class="pad_btn" @click="handleDigit(8)">8</div>
                    <div class="pad_btn" @click="handleDigit(9)">9</div>
                    <div class="pad_btn" @click="handleOp('x')">x</div>
                    <div class="pad_btn" @click="handleDigit(4)">4</div>
                    <div class="pad_btn" @click="handleDigit(5)">5</div>
                    <div class="pad_btn" @click="handleDigit(6)">6</div>
                    <div class="pad_btn" @click="handleOp('-')">-</div>
                    <div class="pad_btn" @click="handleDigit(1)">1</div>
                    <div class="pad_btn" @click="handleDigit(2)">2</div>
                    <div class="pad_btn" @click="handleDigit(3)">3</div>
                    <div class="pad_btn" @click="handleOp('+')">+</div>
                    <div id="zero" class="pad_btn" @click="handleDigit(0)">0</div>
                    <div id="equal" class="pad_btn" @click="handleOp('=')">=</div>
                  </div>
                </div>
               
                <div v-if="total__mortage>0" class="result">
                  <label for="" class="d-block result__label">Your monthly payment is</label>
                  <label for="" class="d-block result__total">${{total__mortage.toLocaleString()}}</label>
                  <!-- 
                    If you're sure the variable is always Number and never a “number String”, you can do:
                    {{ num.toLocaleString() }}
                    If you want to be safe, do:
                    {{ Number(num).toLocaleString() }}
                  -->
                  <form  @submit.prevent="mortgageCalculatorSubmit">
                    <div class="row justify-content-center">
                      <div class="col-12 col-md-5 mt-2">
                        <input type="number" class="form-control mh-100" style="height:35px" id="" v-model="phoneNumber" placeholder="Contact Number" required>
                      </div>
                      <div class="col-12 col-md-5 mt-2">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Get Free Consultation </button>
                      </div>
                    </div>
                  </form>
                  <p class="explain">
                    Leave your contact details and our mortgage specialists will contact you with a free mortgage plan.
                  </p>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

</template>
<script>
export default {
  name: 'Home',
  data(){
      return{
        //Insurance variables
        expensives:null,
        rent:null,
        children:null,
        childAge:null,
        total:0,
        phoneNumber:null,
        //Mortgage variables
        amount:null,
        interest:'',
        yearofloan:null,
        total__mortage:0,
        
        //tabs
        tab:0,
        //calculator
        currentValue: 0,
        savedValue: false,
        currentOp: false,


        options: {
          id1: '3.1',
          id2: '3.3',
          id3: '3.5',
          id4: '3.7',
          id5: '3.9',
          id6: '4.1'
      
        }
      }
  },
  components: {
  },
  computed:{
    valueDisplayed () {
      return this.savedValue ? 
        this.currentValue ? 
        this.currentValue : this.savedValue
        : this.currentValue
    }
  },
  methods:{
    insuranceCalculator(){
      this.total = (parseInt(this.expensives) + parseInt(this.rent))*12; 
      this.children == null ? 0 : this.children;
      if(this.children>0 && this.childAge<16){
        this.total = this.total * (25-this.childAge);
        console.log(this.total);
      }else{
        this.total = this.total * 10;
      }
    },
    mortgageCalculator(){
      this.total__mortage = (this.amount/this.yearofloan)/12;
      console.log(this.total__mortage);
      this.total__mortage = this.total__mortage*(this.interest/100);
      console.log(this.total__mortage);
    },
    changeTab(){
      this.total = 0;
    },
    //calculator
    clear () {
    this.currentValue = 0;
    this.savedValue = false;
    this.currentOp = false;
    },
    handleDigit (digit) {
      if (this.currentOp === '=') {
        this.savedValue = false;
      }
      this.currentValue = this.currentValue * 10 + digit;
    },
    handleOp (op){
      if (this.currentOp) {
         this.process();
      }
      else {
        this.savedValue = this.currentValue;
      }
      this.currentValue = 0;
      this.currentOp = op; 
    },
    process() {
      if (this.currentOp === '+') {
        this.savedValue += this.currentValue;
      }
      else if (this.currentOp === '-') {
        this.savedValue -= this.currentValue;
      }
      else if (this.currentOp === 'x') {
        this.savedValue *= this.currentValue;
      }
      else if (this.currentOp === '/') {
        this.savedValue /= this.currentValue;
      }
      else if (this.currentOp === '=' && this.currentValue) {
        this.savedValue = this.currentValue;
      }
      this.currentValue = 0;
      this.currentOp = false;
    }
  }
  
}

</script>
<style>
/** Main Image */
.main-calculator{
    width: 100%;
    height: 450px;
    background-image: url("../../../public/img/calculator.jpg");
    background-size: cover;
    background-position: center center;
    background-repeat: no-repeat;    
  }
.main-calculator .black-bg{
    background-color: rgba(0,0,0,0.4);
    height: 100%;
    width: 100%;
}
.main-calculator h1{
    color:white;
    font-size: 3.4rem;
}
.main-contact h2{
    color:white!important;
}
.btn-contact{
    padding: 14px 50px;
}

/* Calculator */
/* input font size */
  .form-control{
    font-size: 1.3rem!important;
  }
  .calculator{
    width: 100%;
    min-height:70vh;
  }
  .result{
    background-color: var(--Color-main-gray-1);
    height: 100%;
  }
  .result__label{
    text-align: center;
    font-size: var(--default-font-size-md);
    
  }
  .result__total{
    text-align: center;
    font-size: var(--default-font-size-lg);
    color: var(--Color-main-red-1);
    
  }
  #result{
    font-size: 3rem;
    width: 100%;
    height: 100%;
    box-sizing: border-box;
    display: grid;
    padding: 5px;
    justify-items: end;
    align-items: center;
    border-bottom: 2px solid #222;
    border-color: var(--Color-main-gray-1);
  }
  .contents{
    margin-top: 2rem;
  }
  .inputHeight{
    height:35px;
  }
  .explain{
    text-align: center;
    margin: 1rem 4rem;
  }
.calculator_function{
  color: var(--Color-main-gray-3);
  margin-top: 1rem;
  border: 2px solid #222;
  border-radius: 4px;
  border-color: var(--Color-main-gray-1);
}

/** Calculator Pad */ 
#pad{
  display: grid;
  grid-template-columns: repeat(4, minmax(60px, 1fr));
  grid-gap: 10px;
  padding: 15px;
}  
.pad_btn{
  cursor: pointer;
  display: grid;
  justify-items: center;
  align-items: center;
  border: 1px solid #222;
  border-radius: 4px;
  border-color: var(--Color-main-gray-1);
  transition: all .2s;
}
.pad_btn:hover{
  background-color: var(--Color-main-gray-2);
  color: white;
  transform: translateY(-3px);
  box-shadow: 0 1rem 2rem rgba(color-black,.2);
}
.pad_btn:active{
  transform: translateY(.5px);
}
  
#clear{
  
  grid-column: 1/4;
}
  
#zero{
  grid-column: 1/4;
}
  
#equal{
background: var(--Color-main-green-1);
}
#equal:hover{
  background-color: var(--Color-main-green-2);
  color: white;
  transform: translateY(-3px);
  box-shadow: 0 1rem 2rem rgba(color-black,.2);
}
#equal:active{
  transform: translateY(.5px);
}

.custom-select{
  height: 3rem!important;
  font-size: 1.3rem!important;
}
</style>