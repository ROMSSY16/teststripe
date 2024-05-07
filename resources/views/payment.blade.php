<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" ></script>

    <title>Stripe Payment</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:weight@100;200;300;400;500;600;700;800&display=swap");


body{
 background-color:#f5eee7;
 font-family: "Poppins", sans-serif;
 font-weight: 300;
}

.container{

 height: 100vh;

}

.card{

 border: none;
}

.card-header {
     padding: .5rem 1rem;
     margin-bottom: 0;
     background-color: rgba(0,0,0,.03);
     border-bottom: none;
 }

 .btn-light:focus {
     color: #212529;
     background-color: #e2e6ea;
     border-color: #dae0e5;
     box-shadow: 0 0 0 0.2rem rgba(216,217,219,.5);
 }

 .form-control{

   height: 50px;
border: 2px solid #eee;
border-radius: 6px;
font-size: 14px;
 }

 .form-control:focus {
color: #495057;
background-color: #fff;
border-color: #039be5;
outline: 0;
box-shadow: none;

}

.input{

position: relative;
}

.input i{

   position: absolute;
top: 16px;
left: 11px;
color: #989898;
}

.input input{

text-indent: 25px;
}

.card-text{

font-size: 13px;
margin-left: 6px;
}

.certificate-text{

font-size: 12px;
}


.billing{
font-size: 11px;
}  

.super-price{

   top: 0px;
font-size: 22px;
}

.super-month{

   font-size: 11px;
}


.line{
color: #bfbdbd;
}

.free-button{

   background: #1565c0;
height: 52px;
font-size: 15px;
border-radius: 8px;
}


.payment-card-body{

flex: 1 1 auto;
padding: 24px 1rem !important;

}
    </style>
</head>
<body>
    {{-- <form action="{{ route('process.payment') }}" method="POST">
        @csrf
        <label for="cardholderName">Cardholder's Name</label>
        <input type="text" id="cardholderName" name="cardholderName" required><br>

        <label for="cardNumber">Card Number</label>
        <input type="text" id="cardNumber" name="cardNumber" required><br>

        <label for="expMonth">Expiration Month</label>
        <input type="text" id="expMonth" name="expMonth" required><br>

        <label for="expYear">Expiration Year</label>
        <input type="text" id="expYear" name="expYear" required><br>

        <label for="cvc">CVC</label>
        <input type="text" id="cvc" name="cvc" required><br>

        <button type="submit">Submit Payment</button>
    </form> --}}

    <div class="container d-flex justify-content-center mt-5 mb-5">

            

        <div class="row g-3">

          <div class="col-md-6">  
            
            <span>Stripe Paiement</span>
            <div class="card">

              <div class="accordion" id="accordionExample">
                
                <form action="{{ route('process.payment') }}" method="POST" >
                    <div class="card">
                    <div class="card-header p-0">
                        <h2 class="mb-0">
                        <button class="btn btn-light btn-block text-left p-3 rounded-0" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <div class="d-flex align-items-center justify-content-between">

                            <span>Credit card</span>
                            <div class="icons">
                                <div class="mt-1">
                                    <sup class="super-price fw-bold">10 000 FCFA</sup>
                                    
                                  </div>
                            </div>
                            
                            </div>
                        </button>
                        </h2>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body payment-card-body">
                        
                        <span class="font-weight-normal card-text">Numero de la carte</span>
                        <div class="input">

                            <i class="fa fa-credit-card"></i>
                            <input type="text" class="form-control" id="cardNumber" name="cardNumber" placeholder="0000 0000 0000 0000">
                            
                        </div> 

                        <div class="row mt-3 mb-3">

                            <div class="col-md-6">

                            <span class="font-weight-normal card-text"> Date Expiration</span>
                            <div class="input">

                                <i class="fa fa-calendar"></i>
                                <input type="text" class="form-control" id="expDate" name="expDate" placeholder="MM/YY">
                                
                            </div> 
                            
                            </div>


                            <div class="col-md-6">

                            <span class="font-weight-normal card-text">CVC/CVV</span>
                            <div class="input">

                                <i class="fa fa-lock"></i>
                                <input type="text" class="form-control" placeholder="000">
                                
                            </div> 
                            
                            </div>
                            

                        </div>

                        <span class="text-muted certificate-text"><i class="fa fa-lock"></i> Your transaction is secured with ssl certificate</span>

                        <button type="submit" class="btn btn-primary btn-block free-button">Procéder au paiement</button> 

                        </div>
                    </div>
                    </div>
                </form>
                
              </div>
              
            </div>

          </div>

          <div class="col-md-6">
              {{-- <span>Resumé</span>

              <div class="card">

                <div class="d-flex justify-content-between p-3">

                  

                  <div class="mt-1">
                    <sup class="super-price">10 000 FCFA</sup>
                    
                  </div>
                  
                </div>

                <hr class="mt-0 line">


                <div class="p-3">

                <button class="btn btn-primary btn-block free-button">Try it free for 30 days</button> 
               <div class="text-center">
                 <a href="#">Have a promo code?</a>
               </div>
                  
                </div>



                
              </div> --}}
          </div>
          
        </div>
        

      </div>
</body>
</html>