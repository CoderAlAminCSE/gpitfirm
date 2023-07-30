<section class="ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="woocommerce">
                    <div class="woocommerce-notices-wrapper"></div>
                    <form method="post" class="woocommerce-ResetPassword lost_reset_password">
                        <p>Lost your password? Please enter your username or email address. You will receive a
                            link to create a new password via email.</p>
                        <div class="form-group">
                            <p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
                                <label for="user_login">Username or email</label>
                                <input class="woocommerce-Input woocommerce-Input--text input-text form-control" type="text" name="user_login" id="user_login" autocomplete="username" placeholder="Enter Username or Email" />
                            </p>
                        </div>
                        <div class="clear"></div>
                        <p class="woocommerce-form-row form-row">
                            <input type="hidden" name="wc_reset_password" value="true" />
                            <button type="submit" class="woocommerce-Button button" value="Reset password">Reset
                                password</button>
                        </p>
                        <input type="hidden" id="woocommerce-lost-password-nonce" name="woocommerce-lost-password-nonce" value="6c426b3500" /><input type="hidden" name="_wp_http_referer" value="/my-account/lost-password/" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>