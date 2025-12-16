<!DOCTYPE html>
<html>
<head>
    <title>Contact Form</title>
    <style>
        .container { max-width: 600px; margin: 50px auto; padding: 20px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input, textarea { width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; }
        .error { color: red; font-size: 14px; margin-top: 5px; }
        .success { color: green; padding: 10px; background: #d4edda; border-radius: 4px; margin-bottom: 20px; }
        .btn { background: #007bff; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Contact Us</h2>
        
        <?php if($success): ?>
            <div class="success"><?= $success ?></div>
        <?php endif; ?>

        <form method="POST" action="/contact">
            
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="<?= $old['name'] ?? '' ?>">
                <?php if(isset($errors['name'])): ?>
                    <div class="error"><?= $errors['name'] ?></div>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?= $old['email'] ?? '' ?>">
                <?php if(isset($errors['email'])): ?>
                    <div class="error"><?= $errors['email'] ?></div>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" id="subject" name="subject" value="<?= $old['subject'] ?? '' ?>">
                <?php if(isset($errors['subject'])): ?>
                    <div class="error"><?= $errors['subject'] ?></div>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="message">Message</label>
                <textarea id="message" name="message" rows="5"><?= $old['message'] ?? '' ?></textarea>
                <?php if(isset($errors['message'])): ?>
                    <div class="error"><?= $errors['message'] ?></div>
                <?php endif; ?>
            </div>

            <button type="submit" class="btn">Submit Inquiry</button>
        </form>
    </div>
</body>
</html>