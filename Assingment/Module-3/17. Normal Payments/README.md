# Normal Payments - PayPal & Stripe Integration

## Overview
Complete payment processing system with checkout page integrating PayPal and Stripe payment gateways for secure online transactions.

## Features
- **Dual Payment Gateways**: Support for both PayPal and Stripe
- **Secure Checkout**: Professional checkout page with order summary
- **Transaction Management**: Database storage of all payment transactions
- **Demo Mode**: Works immediately without API keys for testing
- **Responsive Design**: Mobile-friendly checkout experience
- **Real-time Processing**: Instant payment confirmation and feedback

## Files
- `index.html` - Complete checkout page with payment gateway integration
- `process_payment.php` - Backend payment processing with database storage
- `README.md` - Setup instructions and payment gateway configuration

## How to Use

### Demo Mode (Immediate Testing)
1. Open `index.html` in browser
2. Review the sample order (Web Hosting + SSL + Domain = $176.01)
3. Click "Pay with Stripe" or "Pay with PayPal"
4. See simulated payment processing and success confirmation

### Real Payment Integration

#### Stripe Setup
1. **Create Stripe Account**
   - Sign up at [Stripe Dashboard](https://dashboard.stripe.com/)
   - Get your API keys from the dashboard

2. **Configure Stripe Keys**
   - Replace `pk_test_YOUR_STRIPE_PUBLISHABLE_KEY` in `index.html`
   - Replace `sk_test_YOUR_STRIPE_SECRET_KEY` in `process_payment.php`
   - Install Stripe PHP library: `composer require stripe/stripe-php`

3. **Test with Stripe**
   - Use test card: 4242 4242 4242 4242
   - Any future expiry date and CVC

#### PayPal Setup
1. **Create PayPal Developer Account**
   - Sign up at [PayPal Developer](https://developer.paypal.com/)
   - Create a new app in the dashboard

2. **Configure PayPal Credentials**
   - Replace `YOUR_PAYPAL_CLIENT_ID` in both files
   - Replace `YOUR_PAYPAL_CLIENT_SECRET` in `process_payment.php`
   - Set mode to 'sandbox' for testing, 'live' for production

3. **Test with PayPal**
   - Use PayPal sandbox accounts for testing
   - Test buyer account: sb-buyer@business.example.com

## Payment Flow

### Stripe Payment Process
1. **User clicks "Pay with Stripe"** → Frontend initiates payment
2. **Create Payment Intent** → Server creates Stripe payment intent
3. **Client Confirmation** → Frontend confirms payment with card details
4. **Payment Processing** → Stripe processes the payment
5. **Database Storage** → Transaction stored in database
6. **Success Confirmation** → User sees payment confirmation

### PayPal Payment Process
1. **User clicks "Pay with PayPal"** → Frontend initiates PayPal checkout
2. **Create Order** → Server creates PayPal order
3. **PayPal Redirect** → User redirected to PayPal for authentication
4. **Payment Authorization** → User approves payment on PayPal
5. **Capture Payment** → Server captures the authorized payment
6. **Database Storage** → Transaction stored in database
7. **Success Confirmation** → User sees payment confirmation

## Database Schema
```sql
CREATE TABLE transactions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    transaction_id VARCHAR(255) UNIQUE NOT NULL,
    payment_method VARCHAR(50) NOT NULL,
    amount DECIMAL(10,2) NOT NULL,
    currency VARCHAR(3) DEFAULT 'USD',
    status VARCHAR(20) DEFAULT 'pending',
    customer_email VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
```

## Order Summary Features
- **Product Details**: Name, description, and individual pricing
- **Tax Calculation**: Automatic tax computation (8% in demo)
- **Shipping Options**: Free shipping included
- **Total Calculation**: Real-time total with all fees included
- **Currency Formatting**: Proper USD formatting throughout

## Security Features
- **HTTPS Required**: Payment gateways require SSL in production
- **API Key Security**: Server-side API key storage
- **Transaction Validation**: Server-side payment verification
- **Database Security**: Prepared statements prevent SQL injection
- **PCI Compliance**: Payment data handled by certified providers

## Error Handling
- **Payment Failures**: Graceful handling of declined payments
- **Network Errors**: Retry mechanisms for API failures
- **Validation Errors**: Client and server-side input validation
- **Gateway Errors**: Proper error messages from payment providers
- **Database Errors**: Transaction rollback on failures

## Customization Options
- **Product Catalog**: Modify order items and pricing
- **Tax Rates**: Adjust tax calculation based on location
- **Currency Support**: Change currency for international payments
- **Styling**: Customize checkout page design and branding
- **Additional Gateways**: Add more payment providers (Apple Pay, Google Pay)

## Testing
- **Demo Transactions**: Test without real money using demo mode
- **Stripe Test Cards**: Use Stripe's test card numbers
- **PayPal Sandbox**: Test with PayPal sandbox accounts
- **Error Scenarios**: Test payment failures and edge cases
- **Mobile Testing**: Verify checkout works on mobile devices

## Production Deployment
1. **SSL Certificate**: Ensure HTTPS for all payment pages
2. **API Keys**: Use live API keys instead of test keys
3. **Webhook Setup**: Configure payment confirmation webhooks
4. **Compliance**: Ensure PCI DSS compliance requirements
5. **Monitoring**: Set up payment failure monitoring and alerts

## API Endpoints (process_payment.php)
- `POST ?payment_method=stripe` - Process Stripe payments
- `POST ?payment_method=paypal` - Process PayPal payments
- Automatic transaction storage and status tracking

## Dependencies
- **Stripe PHP SDK**: For Stripe payment processing
- **PayPal REST API**: For PayPal payment processing
- **MySQL Database**: For transaction storage
- **PHP cURL**: For API communications

## No Setup Required for Demo
- Works immediately with simulated payments
- Creates database tables automatically
- Includes realistic transaction IDs and confirmations
- Perfect for development and testing payment flows