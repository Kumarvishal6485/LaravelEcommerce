<!DOCTYPE html>
<html>
<head>
    <title>Stripe Payment</title>
    <script src="https://js.stripe.com/v3/"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
        padding: 50px;
    }

    .payment-form {
        max-width: 500px; 
        margin: 0 auto;
        background: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    #card-element {
        background-color: #f1f1f1;
        padding: 15px;
        border-radius: 4px;
        margin-bottom: 20px;
    }

    .StripeElement {
        background-color: white;
        padding: 10px 12px;
        border: 1px solid #ced4da;
        border-radius: 4px;
        box-shadow: 0 1px 3px rgba(50, 50, 93, 0.1), 0 1px 0 rgba(0, 0, 0, 0.02);
        transition: box-shadow 150ms ease;
    }

    .StripeElement--focus {
        box-shadow: 0 1px 3px rgba(50, 50, 93, 0.1), 0 1px 0 rgba(0, 0, 0, 0.12);
        border-color: #6772e5;
    }

    .StripeElement--invalid {
        border-color: #e3342f;
    }

    .StripeElement--webkit-autofill {
        background-color: #fefde5 !important;
    }

    button {
        background-color: #6772e5;
        color: white;
        padding: 10px;
        border: none;
        border-radius: 4px;
        width: 100%;
        font-size: 16px;
        cursor: pointer;
    }

    button:hover {
        background-color: #5469d4;
    }

    button:disabled {
        background-color: #bbc3cf;
        cursor: not-allowed;
    }
</style>

</head>
<body>

<form action="stripe" method="POST" id="payment-form">
    @csrf
    <input type="hidden" name="amount" value="{{Request()->session()->get('amount')}}"> <!-- Amount in dollars -->
    <div id="card-element">
        <!-- A Stripe Element will be inserted here. -->
    </div>
    <button type="submit">Submit Payment</button>
</form>

<script>
    var stripe = Stripe('{{ env('STRIPE_KEY') }}');
    var elements = stripe.elements();
    
    var card = elements.create('card');
    console.log(card);
    card.mount('#card-element');

    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function(event) {
        event.preventDefault();

        stripe.createToken(card).then(function(result) {
            if (result.error) {
                // Display error
            } else {
                // Add token to form
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', result.token.id);
                form.appendChild(hiddenInput);
                form.submit();
            }
        });
    });
</script>

</body>
</html>
