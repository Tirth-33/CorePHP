# Payment Gateway Setup Instructions

## 1. Stripe Account Setup
1. Create account at https://stripe.com
2. Get API keys from Dashboard > Developers > API keys
3. Use test keys for development:
   - Publishable key: `pk_test_...`
   - Secret key: `sk_test_...`

## 2. Installation
```bash
composer install
```

## 3. Configuration
1. Replace `sk_test_your_stripe_secret_key_here` in `payment_gateway.php`
2. Replace `pk_test_your_stripe_publishable_key_here` in `checkout.html`

## 4. Test Cards
- Success: 4242 4242 4242 4242
- Decline: 4000 0000 0000 0002
- Any future date, any CVC

## 5. Usage
1. Open `checkout.html` in browser
2. Enter amount and card details
3. Click "Pay Now" to process payment