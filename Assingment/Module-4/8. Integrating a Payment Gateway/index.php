<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Blog - Support Us</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 800px; margin: 0 auto; padding: 20px; }
        .blog-post { background: #f9f9f9; padding: 20px; margin: 20px 0; border-radius: 5px; }
        .donation-section { background: #e8f4fd; padding: 20px; border-radius: 5px; margin: 20px 0; }
        .btn { background: #007cba; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; }
        .btn:hover { background: #005a87; }
        .amount-buttons { margin: 10px 0; }
        .amount-btn { margin: 5px; padding: 8px 15px; border: 2px solid #007cba; background: white; color: #007cba; border-radius: 5px; cursor: pointer; }
        .amount-btn.selected { background: #007cba; color: white; }
    </style>
</head>
<body>
    <header>
        <h1>My Tech Blog</h1>
        <nav>
            <a href="#home">Home</a> | 
            <a href="#about">About</a> | 
            <a href="#contact">Contact</a>
        </nav>
    </header>

    <main>
        <article class="blog-post">
            <h2>Latest Post: Understanding Payment Gateways</h2>
            <p><em>Published on December 15, 2024</em></p>
            <p>Payment gateways are essential for modern web applications. They provide secure ways to process online transactions...</p>
            <p>In this post, we'll explore how to integrate Stripe into your PHP application for handling donations and purchases.</p>
        </article>

        <div class="donation-section">
            <h3>💝 Support Our Blog</h3>
            <p>Help us create more quality content by making a donation!</p>
            
            <form id="donation-form" action="process_payment.php" method="POST">
                <div class="amount-buttons">
                    <button type="button" class="amount-btn" data-amount="50000">₹500</button>
                    <button type="button" class="amount-btn" data-amount="100000">₹1000</button>
                    <button type="button" class="amount-btn selected" data-amount="250000">₹2500</button>
                    <button type="button" class="amount-btn" data-amount="500000">₹5000</button>
                </div>
                
                <input type="hidden" id="amount" name="amount" value="250000">
                <input type="hidden" name="type" value="donation">
                
                <button type="submit" class="btn">Donate Now</button>
            </form>
        </div>

        <div class="donation-section">
            <h3>📚 Purchase Premium Content</h3>
            <p>Get access to our premium tutorials and resources!</p>
            
            <form action="process_payment.php" method="POST">
                <input type="hidden" name="amount" value="249900">
                <input type="hidden" name="type" value="purchase">
                <input type="hidden" name="product_name" value="Premium Tutorial Package">
                
                <button type="submit" class="btn">Buy for ₹2499</button>
            </form>
        </div>
    </main>

    <script>
        // Handle amount selection
        document.querySelectorAll('.amount-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                document.querySelectorAll('.amount-btn').forEach(b => b.classList.remove('selected'));
                this.classList.add('selected');
                document.getElementById('amount').value = this.dataset.amount;
            });
        });
    </script>
</body>
</html>