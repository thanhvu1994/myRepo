<section id="wrapper" class="login-register">
    <div class="login-box">
        <div class="white-box">
            <?php echo form_open('admin/login', ['class' => 'form-horizontal form-material', 'id' => 'loginform']); ?>
                <h3 class="box-title m-b-20">Sign In</h3>
                <div class='error_msg' style="color: red">
                <?php
                    if (isset($error_message)) {
                        echo $error_message;
                    }
                    echo validation_errors();
                ?>
                </div>
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input class="form-control" type="text" name="username" required="" placeholder="Username">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" type="password" name="password" required="" placeholder="Password">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <div class="checkbox checkbox-primary pull-left p-t-0">
                            <input id="checkbox-signup" name="remember" type="checkbox">
                            <label for="checkbox-signup"> Remember me </label>
                        </div>
                        <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> Forgot pwd?</a> </div>
                </div>
                <div class="form-group text-center m-t-20">
                    <div class="col-xs-12">
                        <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
                    </div>
                </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</section>