const stripe = require('stripe')('sk_test_51NMwrfICe4bkMjF5xIQryUgkpaP1DCqfsbT4iBRsFn4YcX1UH2jerQ5YpnCpEWuhlXfKUy2SdsqgXy2ZEcfbOIXL00F09gs6S9');
const express = require('express');
const app = express();

app.post('/create-checkout-session', async (req, res) => {
  const session = await stripe.checkout.sessions.create({
    payment_method_types: ['card'],
    line_items: [{
      price_data: {
        currency: 'usd',
        product_data: {
          name: 'Donation',
        },
        unit_amount: 1000, // le montant que vous voulez charger, par exemple 10.00 USD
      },
      quantity: 1,
    }],
    mode: 'payment',
    success_url: 'https://buy.stripe.com/test_5kA2c13fR7HVaOY144',
    cancel_url: 'https://crowdhub.fr/user/pagefinancement.php',
    
     });

     res.json({ id: session.id });
   });

app.listen(3000, () => console.log('Server started on port 3000'));