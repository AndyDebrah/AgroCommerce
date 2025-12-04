<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/public">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Payment</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Stripe CSS -->
     <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
    <style>
        .StripeElement {
            background-color: white;
            padding: 16px 20px;
            border-radius: 5px;
            border: 1px solid #ced4da;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
            transition: all 0.3s cubic-bezier(.25,.8,.25,1);
        }
        .StripeElement:focus {
            box-shadow: 0 5px 5px rgba(0, 0, 0, 0.19), 0 3px 3px rgba(0, 0, 0, 0.23);
            outline: none;
        }
        .StripeElement--invalid {
            border-color: #dc3545;
        }
        .credit-card-box {
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        .panel-title {
            font-size: 1.2rem;
            font-weight: 600;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            transition: background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .form-control:focus {
            border-color: #80bdff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        /* Center the submitting message */
        #submitting-message {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 10; /* Ensure it's on top of other elements */
        }

        /* Add overlay to dim the background */
        #overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent black */
            z-index: 9; /* Place it above the card but below the message */
            display: none; /* Hidden by default */
        }
        </style>

</head>
<body>

    <div class="hero_area">
         <!-- header section strats -->
         @include('home.header');

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card credit-card-box">
                    <div class="card-header">
                        <h3 class="panel-title text-center">Payment Details</h3>
                    </div>
                    <div class="card-body">
                        @if (Session::has('success'))
                            <div class="alert alert-success text-center">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <p class="mb-0">{{ Session::get('success') }}</p>
                            </div>
                        @endif
                        @if (Session::has('error'))
                            <div class="alert alert-danger text-center">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <p class="mb-0">{{ Session::get('error') }}</p>
                            </div>
                        @endif
                        <form role="form" action="{{ route('stripe.post') }}" method="post" id="payment-form">
                            @csrf
                            <input type="hidden" name="totalPrice" value="{{ $totalPrice }}">
                            <div class="form-group">
                                <label for="nameOnCard">Name on Card</label>
                                <input type="text" class="form-control" id="nameOnCard" placeholder="Enter name" required>
                            </div>
                            <div class="form-group">
                                <label for="cardNumber">Card Number</label>
                                <div id="card-element" class="form-control">
                                    <!-- Stripe Element will be inserted here -->
                                </div>
                                <div id="card-errors" class="invalid-feedback"></div>
                            </div>
                            <button class="btn btn-primary btn-block" type="submit" id="pay-button">
                                Pay Now (${{ $totalPrice }})
                            </button>
                            <p id="submitting-message" class="text-center mt-3" style="display:none;">Submitting...</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Stripe JS -->
    <script src="https://js.stripe.com/v3/"></script>
    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            // Stripe Initialization
            var stripe = Stripe('{{ env('Stripe_API_KEY') }}');
            var elements = stripe.elements();
            var style = {
                base: {
                    color: '#32325d',
                    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                    fontSmoothing: 'antialiased',
                    fontSize: '16px',
                    '::placeholder': {
                        color: '#aab7c4'
                    }
                },
                invalid: {
                    color: '#fa755a',
                    iconColor: '#fa755a'
                }
            };
            var card = elements.create('card', {style: style});
            card.mount('#card-element');
            card.on('change', function(event) {
                var displayError = document.getElementById('card-errors');
                if (event.error) {
                    displayError.textContent = event.error.message;
                } else {
                    displayError.textContent = '';
                }
            });

            // Form submission
            var form = document.getElementById('payment-form');
            var payButton = document.getElementById('pay-button');
            var submittingMessage = document.getElementById('submitting-message');

            form.addEventListener('submit', function(event) {
                event.preventDefault();

                // Disable the pay button and show the submitting message
                payButton.disabled = true;
                submittingMessage.style.display = 'block';

                stripe.createToken(card).then(function(result) {
                    if (result.error) {
                        var errorElement = document.getElementById('card-errors');
                        errorElement.textContent = result.error.message;

                        // Re-enable the pay button and hide the submitting message
                        payButton.disabled = false;
                        submittingMessage.style.display = 'none';
                    } else {
                        stripeTokenHandler(result.token);
                    }
                });
            });

            // Stripe Token Handler
            function stripeTokenHandler(token) {
                var form = document.getElementById('payment-form');
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', token.id);
                form.appendChild(hiddenInput);
                form.submit();
            }

            // Close alert message
            $(document).on('click', '.close', function() {
                $(this).closest('.alert').remove();
            });
        });
    </script>
</body>
</html>
