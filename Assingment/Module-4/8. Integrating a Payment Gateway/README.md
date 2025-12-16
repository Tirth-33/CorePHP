# Blog Payment Gateway Integration

A minimal blog application with Stripe payment integration for donations and purchases.

## Setup Instructions

1. **Install Dependencies**
   ```bash
   composer install
   ```

2. **Configure Stripe**
   - Sign up at https://stripe.com
   - Get your API keys from the Stripe Dashboard
   - Update `config.php` with your keys:
     ```php
     define('STRIPE_PUBLISHABLE_KEY', 'pk_test_your_key_here');
     define('STRIPE_SECRET_KEY', 'sk_test_your_key_here');
     ```

3. **Update URLs**
   - In `process_payment.php`, update success/cancel URLs to match your domain

4. **Test the Application**
   - Use Stripe test card: `4242 4242 4242 4242`
   - Any future expiry date and CVC

## Features

- ✅ Donation system with multiple amount options
- ✅ Premium content purchase
- ✅ Secure Stripe Checkout integration
- ✅ Payment success/error handling
- ✅ Responsive design

## Files Structure

- `index.php` - Main blog page with payment options
- `process_payment.php` - Stripe checkout session creation
- `success.php` - Payment success confirmation
- `cancel.php` - Payment cancellation page
- `error.php` - Error handling page
- `config.php` - Configuration settings

## Security Notes

- Never expose secret keys in client-side code
- Always validate payments server-side
- Use HTTPS in production
- Implement proper error logging