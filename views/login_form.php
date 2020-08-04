<!--================login Area =================-->
<section class="login_area p_100">
    <div class="container">
        <div class="login_inner">
            <div class="row">
                <div class="col-lg-4">
                    <div class="login_title">
                        <h2>log in your account</h2>
                        <p>
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eaque consectetur
                            dignissimos
                        </p>
                    </div>
                    <form name="form1" class="login_form row" onSubmit="return check_login(form1)" method="POST">
                        <div class="col-lg-12 form-group">
                            <input class="form-control" type="text" placeholder="Name" name="email" id="loginEmail" />
                        </div>
                        <div class="col-lg-12 form-group">
                            <input class="form-control" type="password" placeholder="Password" id="loginPassword" name="password" />
                        </div>
                        <div class="col-lg-12 form-group">
                            <div class="creat_account">
                                <input type="checkbox" id="f-option" name="selector" />
                                <label for="f-option">Keep me logged in</label>
                                <div class="check"></div>
                            </div>
                            <h4>Forgot your password ?</h4>
                        </div>

                        <div class="col-lg-12 form-group">
                            <button type="submit" value="submit" name="loginBtn" class="bt6n update_btn form-control">
                                Login
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-8">
                    <div class="login_title">
                        <h2>create account</h2>
                        <p>
                            Follow the steps below to create email account enjoy the great
                            mail.com emailing experience. Vivamus tempus risus vel felis
                            condimentum, non vehicula est iaculis.
                        </p>
                    </div>
                    <form name="form2" onSubmit="return check_register(form2)" class="login_form row" method="POST">
                        <div class="col-lg-6 form-group">
                            <input class="form-control" type="text" placeholder="First name" name="first_name" />
                        </div>
                        <div class="col-lg-6 form-group">
                            <input class="form-control" type="text" placeholder="Last name" name="last_name" />
                        </div>
                        <div class="col-lg-6 form-group">
                            <input class="form-control" type="text" placeholder="Email" name="email" />
                        </div>
                        <div class="col-lg-6 form-group">
                            <input class="form-control" type="password" placeholder="password" name="password" />
                        </div>
                        <div class="col-lg-6 form-group">
                            <input class="form-control" type="text" placeholder="Phone Number" name="mobile" />
                        </div>
                        <div class="col-lg-6 form-group">
                            <input class="form-control" type="text" placeholder="First Address" name="address1" />
                        </div>
                        <div class="col-lg-6 form-group">
                            <input class="form-control" type="text" placeholder="Second Address" name="address2" />
                        </div>
                        <div class="col-lg-6 form-group">
                            <button type="submit" value="submit" name="registerBtn" class="btn subs_btn form-control">
                                register now
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End login Area =================-->