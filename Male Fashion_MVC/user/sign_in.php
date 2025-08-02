<?php

include 'header.php'

    ?>

<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <form method="post">
                <div class="row">
                    <div class="col-lg-8 col-md-6">

                        <h6 class="checkout__title">Sign-In</h6>
                    </div>
                    <div class="col-lg-6">
                        <div class="checkout__input">
                            <p>Email<span>*</span></p>
                            <input type="email" value="
                                    <?php
                                    if (isset($_COOKIE['email'])) {
                                        echo $_COOKIE['email'];
                                    }
                                    ?>" name="email" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="checkout__input">
                            <p>Password<span>*</span></p>
                            <input type="text" value="
                                    <?php
                                    if (isset($_COOKIE['password'])) {
                                        echo $_COOKIE['password'];
                                    }
                                    ?>" name="password" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="checkout__input__checkbox">
                    <label for="acc"> Remember Me
                        <input type="checkbox" id="acc" name="remember">
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="col-lg-8">
                    <div class="checkout__input"><br><br>
                        <button type="submit" name="insert" class="btn btn-info">Login</button>
                    </div>
                </div>
        </div>
    </div>
    </div>
    </form>
</section>
<!-- Checkout Section End -->

<?php

include 'footer.php'

    ?>