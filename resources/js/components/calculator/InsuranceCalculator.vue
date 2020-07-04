<template>
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
</template>

<script>

export default {

}
</script>
<style scope>
  
</style>