# SMS Sending APIs - Twilio Integration

## Overview
Complete SMS notification system using Twilio API for sending important event notifications like order confirmations, payment alerts, and OTP verification.

## Features
- **Multiple Notification Types**: Order confirmation, payment success, shipping updates, OTP verification
- **Twilio Integration**: Real SMS sending via Twilio API
- **SMS Templates**: Pre-built message templates for common notifications
- **Phone Validation**: Proper phone number format validation
- **Character Counter**: Real-time SMS character count (160 limit)
- **SMS Logging**: Database logging of all SMS activities
- **Demo Mode**: Works immediately without Twilio credentials
- **Delivery Tracking**: Optional webhook support for delivery status

## Files
- `index.html` - SMS notification interface with templates and forms
- `send_sms.php` - Backend SMS processing with Twilio API integration
- `README.md` - Setup instructions and Twilio configuration guide

## How to Use

### Demo Mode (Immediate Testing)
1. Open `index.html` in browser
2. Select notification type (Order, Payment, Shipping, OTP)
3. Enter phone number (e.g., +91 9876543210)
4. Customize message or use template
5. Click "Send SMS Notification"
6. See simulated SMS sending with message ID

### Real Twilio Integration

#### Twilio Setup
1. **Create Twilio Account**
   - Sign up at [Twilio Console](https://console.twilio.com/)
   - Verify your phone number

2. **Get Twilio Credentials**
   - Account SID from Twilio Console dashboard
   - Auth Token from Twilio Console dashboard
   - Purchase a Twilio phone number

3. **Configure Application**
   - Replace `YOUR_TWILIO_ACCOUNT_SID` in `send_sms.php`
   - Replace `YOUR_TWILIO_AUTH_TOKEN` in `send_sms.php`
   - Replace `YOUR_TWILIO_PHONE_NUMBER` in `send_sms.php`

## SMS Templates

### Order Confirmation
```
Hi! Your order #ORDER123 has been confirmed. Total: ₹1,299. Expected delivery: 3-5 days. Track: bit.ly/track123
```

### Payment Success
```
Payment successful! ₹1,299 received for order #ORDER123. Transaction ID: TXN456789. Thank you for your purchase!
```

### Shipping Update
```
Your order #ORDER123 is out for delivery! Expected delivery today by 6 PM. Track: bit.ly/track123
```

### OTP Verification
```
Your OTP for verification is: 123456. Valid for 10 minutes. Do not share this code with anyone.
```

## Database Schema
```sql
CREATE TABLE sms_logs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    phone_number VARCHAR(20) NOT NULL,
    message TEXT NOT NULL,
    message_type VARCHAR(50) DEFAULT 'custom',
    message_id VARCHAR(255),
    status VARCHAR(20) DEFAULT 'pending',
    provider VARCHAR(20) DEFAULT 'twilio',
    sent_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    delivered_at TIMESTAMP NULL,
    error_message TEXT NULL
);
```

## SMS Sending Process
1. **User Input** → Enter phone number and select message type
2. **Template Loading** → Auto-fill message based on notification type
3. **Validation** → Validate phone number format and message length
4. **Twilio API Call** → Send SMS via Twilio REST API
5. **Database Logging** → Log SMS details and delivery status
6. **Confirmation** → Display success message with Twilio message ID

## Phone Number Formats
- **India**: +91 9876543210
- **US**: +1 2345678901
- **UK**: +44 7123456789
- **International**: +[country code][number]

## Validation Rules
- **Phone Number**: Must be valid international format
- **Message Length**: Maximum 160 characters for single SMS
- **Required Fields**: Phone number and message content
- **Character Encoding**: UTF-8 support for international characters

## Error Handling
- **Invalid Phone**: Proper phone number format validation
- **Message Too Long**: Character limit enforcement
- **API Failures**: Graceful handling of Twilio API errors
- **Network Issues**: Retry mechanisms and error messages
- **Database Errors**: SMS logging failure handling

## Security Features
- **Input Validation**: Server-side validation of all inputs
- **SQL Injection Protection**: Prepared statements used throughout
- **Rate Limiting**: Can be implemented to prevent SMS spam
- **Credential Security**: Twilio credentials stored server-side only
- **Phone Privacy**: Phone numbers stored securely in database

## Webhook Integration (Optional)
Configure Twilio webhook URL for delivery status updates:
```
https://yoursite.com/send_sms.php?webhook=twilio
```

## Cost Considerations
- **Twilio Pricing**: ~$0.0075 per SMS (varies by country)
- **India SMS**: ~₹0.50 per SMS
- **International**: Higher rates for international SMS
- **Free Trial**: Twilio provides free credits for testing

## Use Cases
- **E-commerce**: Order confirmations, shipping notifications
- **Authentication**: OTP verification, password resets
- **Alerts**: Payment confirmations, account security alerts
- **Marketing**: Promotional messages, discount codes
- **Reminders**: Appointment reminders, due date alerts

## Testing
- **Demo Mode**: Test SMS flow without real sending
- **Twilio Console**: View sent messages in Twilio dashboard
- **Phone Verification**: Test with verified phone numbers
- **Message Templates**: Test all notification types
- **Error Scenarios**: Test invalid inputs and API failures

## Production Deployment
1. **Twilio Account**: Upgrade to paid Twilio account
2. **Phone Number**: Purchase dedicated Twilio phone number
3. **Webhook Setup**: Configure delivery status webhooks
4. **Rate Limiting**: Implement SMS sending rate limits
5. **Monitoring**: Set up SMS delivery monitoring and alerts

## API Endpoints (send_sms.php)
- `POST /send_sms.php` - Send SMS notification
- `POST /send_sms.php?webhook=twilio` - Twilio delivery webhook

## Dependencies
- **Twilio REST API**: For SMS sending
- **PHP cURL**: For API communications
- **MySQL Database**: For SMS logging and tracking
- **JSON**: For API request/response handling

## No Setup Required for Demo
- Works immediately with simulated SMS sending
- Creates database tables automatically
- Includes realistic message templates
- Perfect for testing SMS notification flows