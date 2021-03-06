<?php 
include_once('actionHandler.php');
require 'captcha1/rand.php';
 $_SESSION['captcha_id1'] = $str1;
include ('includes/header.php');
include('includes/socialLoginHeader.php');
// pre($oauth->authUser());
if($oauth->authUser()){
    header('Location:'.APP_URL.'/myaccount.php');
    exit;
}
?>
            
<section class="ourtopsellers skincare">
<div class="inner-container topsellers">
    <div class="inner-wrap">

        <div class="cart-container">


            <section class="csect-row clearfix">

                <!--Social -->
                <div class="csect-block">
                    <div class="cart-box nsp">
                        <div class="crtb-head">
                            <h4>Login</h4>
                        </div>
                        <? if(isset($_SESSION['error_message'])) { ?>
                    <br/><div class="alert alert-danger">
                    <?=$_SESSION['error_message']?>
                    </div>
                <?  unset($_SESSION['error_message']);
                } ?>

                <? if(isset($_SESSION['success_message'])) { ?>
                    <br/><div class="alert alert-success">
                    <?=$_SESSION['success_message']?>
                    </div>
                <?  unset($_SESSION['success_message']);
                } ?>
                        <div class="crtb-body">
                            <div class="log-section clearfix">
                                <!-- Social -->
                                <!-- <div class="log-block">
                                    <div class="log-wrap">
                                        <h6>Via social network</h6>
                                        <div class="log-social">
                                            <a href="login.php" class="trans fb"><i class="fa fa-facebook"></i>&nbsp; Continue with facebook</a>
                                            <a href="login.php" class="trans gp"><i class="fa fa-google-plus"></i>&nbsp; Continue with Google+</a>
                                        </div>
                                    </div>
                                </div> -->
                                <!-- /Social -->
                                <!-- Register -->
                                <div class="log-block">
                                    <div class="log-wrap">
                                        <h6><b>New User</b></h6>
                                        <form id="form-register" name="form-register" class="validable" method="post" autocomplete="off">
                                            <input type="hidden" name="action" value="register">
                                        <div class="formx">
                                            <div class="fip">
                                                <input type="text" id="fullName" name="fullName" required>
                                                <label class="fpl">Name</label>
                                            </div>
                                            <br>
                                             <div class="fip">
                                                <input type="text" id="mobileNumber" autocomplete="off" name="mobileNumber" pattern="[0-9]{10}?$" required title="Enter valid 10 digit mobile number">
                                                <label class="fpl">Mobile Number (10 digit)</label>
                                            </div>
                                            <br>
                                            <div class="fip">
                                                <input type="email" id="email" name="email" autocomplete="off" required onkeyup="registrationEmailCheck(this.value);" onblur="registrationEmailCheck(this.value);">
                                                <label class="fpl">Email</label>
                                                <div style="clear:both;width:100%;"></div>
                                                <div id="registrationEmailCheck" style="color:red;"></div>
                                            </div>
                                            <br>
                                           
                                            <div class="fip">
                                                <input type="password" pattern="[\S]{8,}" id="password" name="password" class="trans" title="8 characters minimum and no spaces" required>
                                                <label class="fpl">Password</label>
                                            </div>
                                            <div class="security form-group">
                                                <!-- <p>Please verify that your human</p> -->
                                                <label class="g-form-row-label-h" for="message">Please verify that your human</label>
                                                <div class="securityinput">
                                                    <div id="captchaimage"><img src="captcha1/images/image.php?<?php echo time(); ?>" style="float:left;margin-bottom:15px;" width="120" height="36"></div>
                                                  <div class="refresh">
                                                        <input type="text" class="form-control" maxlength="6" name="captcha1" id="captcha1" placeholder="Enter Code" required >
                                                    </div> 
                                                </div>
                                                <span id='captchaError'></span>
                                              <div style="clear:both;width:100%;"></div>
                                            </div>
                                            <div class="fip sub">
                                                <p class="ferror register"></p>
                                            </div>
                                            <div class="fip sub">
                                                <button type="submit" name="register" id="register" class="btn block reg">Register</button>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- /Register -->
                                <!-- Login -->
                                <div class="log-block">
                                    <div class="log-wrap">
                                        <h6><b>Existing User</b></h6>
                                        <form id="form-login" name="form-login" class="validable" method="post" autocomplete="off">
                                            <input type="hidden" name="action" value="login">
                                            <input type="hidden" name="nextUrl" value="<?=$_REQUEST['next']?>">
                                        <div class="formx">
                                            <div class="fip">
                                                <input type="text" id="email" name="email" required>
                                                <label class="fpl">Email</label>
                                                
                                            </div>
                                            <br>
                                            <div class="fip">
                                                <input type="password" id="password" name="password" required>
                                                <label class="fpl">Password</label>
                                            </div>
                                            <div class="fip sub">
                                                <p class="ferror login"></p>
                                            </div>
                                            <div class="fip sub">
                                                <button type="submit" name="login" id="login" class="btn block reg">Log In</button>
                                            </div>
                                            <div class="fip sub center">
                                                <a href="<?=APP_URL?>/forgotpassword.php" class="tlink">Forgot Password?</a>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                    <!-- <fb:login-button 
                                      scope="public_profile,email"
                                      onlogin="checkLoginState();">
                                    </fb:login-button> -->
                                    <br/>
                                    <div class="row">
                                        <div class="col-xs-12 col-lg-6" style="margin-bottom: 10px;">
                                            <div scope="public_profile,email" 
                                              onlogin="checkLoginState();" class="fb-login-button" data-max-rows="1" data-size="large" data-button-type="login_with" data-show-faces="false" data-auto-logout-link="false" data-use-continue-as="false"></div>
                                          </div>
                                          <div class="col-xs-12 col-lg-6">&nbsp;&nbsp;&nbsp;&nbsp;
                                          <!-- HTML for render Google Sign-In button -->
                                          <!--   <a href="javascript:void(0);" class="googlelogin"><img src="images/gooin.png"></a> -->
                                          <a href="<?=$authUrl?>" class="googlelogin"><img src="images/gooin.png" style="height: 40px;"></a>
                                          </div>
                                      </div>
                                      <!-- <div id="gSignIn"></div> -->


                                </div>
                                <!-- /Login -->
                            </div>
                        </div>
                    </div>
                </div>
                <!--Social -->

            </section>

        </div>

    </div>
</div>

<div class="modal small" id="forgot-modal">
    <div class="modal-inner">
        <div class="modal-head">
            <a href="javascript:void(0);" class="cross trans modal-close">&times;</a>
            <h4>forgot Password?</h4>
        </div>
        <div class="modal-body" id="forgot-form">
            <div class="modal-form clearfix">
                <form id="form-forgot" name="form-forgot" class="validable" method="post" autocomplete="off">
                <div class="formx">
                    <div class="fip center">
                        <p>Please validate your email address</p>
                    </div>
                    <div class="fip">
                        <input type="text" id="forgot_email" name="forgot_email" class="trans validate[required, custom[email]] reqfield" value="">
                        <label class="fpl">Email ID</label>
                    </div>
                    <div class="fip sub">
                        <p class="ferror forgot"></p>
                    </div>
                    <div class="fip sub fsub">
                        <button type="submit" class="btn sbtn block" id="forgot">Submit</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

</section>
<script type="text/javascript">


 $(document).ready(function(e){
$("input[type='password']").attr("autocomplete","off");

});
    // $(document).ready(function(e){
        
    //     $("#login").click(function(){
    //         $('p.login').text("");
    //         if($('#form-login').validationEngine('validate')){
    //             $('#login').attr('disabled','disabled').text('Processing...');
    //             $.post("login.php",{email:$('#email').val(),pass:$('#pass').val()},function(data){
    //                 $('#login').removeAttr('disabled').text('Log In');
    //                 if(data==1)
    //                     location.href="myorders/";
    //                 else
    //                     $('p.login').text("User ID or Password is Incorrect");
    //             });
    //         }
    //     });
    //     $("#register").click(function(){
    //         $('p.register').text("");
    //         if($('#form-register').validationEngine('validate')){
    //             $('#register').attr('disabled','disabled').text('Processing...');
    //             $.post("register.php",{email:$('#user_email').val(),pass:$('#user_pass').val()},function(data){
    //                 $('#register').removeAttr('disabled').text('Register');
    //                 if(data==1)
    //                     location.href="myorders/";
    //                 else if(data==2)
    //                     $('p.register').text("Email Id already Exist");
    //                 else
    //                     $('p.register').text("Error in Register");
    //             });
    //         }
    //     });
    //     $("#forgot").click(function(){
    //         if($('#form-forgot').validationEngine('validate')){
    //             $('#forgot').attr('disabled','disabled').text('Processing...');
    //             $.post("forgot.php",{email:$('#forgot_email').val()},function(data){
    //                 if(data==1){
    //                     $('p.forgot').text("");
    //                     $('#forgot').text('Done! Please check your email.');
    //                     setTimeout(function(){
    //                         hideModal($('#forgot-modal'));
    //                         setTimeout(function(){
    //                             $('#form-forgot')[0].reset();
    //                             $('#forgot').removeAttr('disabled').text('Submit');
    //                         },600);
    //                     },1000);
    //                 }
    //                 else if(data==0){
    //                     $('p.forgot').text("Invalid Email Address");
    //                     $('#forgot').removeAttr('disabled').text('Submit');
    //                 }
    //                 else{
    //                     $('p.forgot').text("Error in sending email");
    //                     $('#forgot').removeAttr('disabled').text('Submit');
    //                 }
    //             });
    //         }
    //     });
    // });
</script>
            
          <?php include ('includes/footer.php');?>
                        
        </main>
    </main >

    <div class="modal-backdrop"></div>
    <script type="text/javascript">
        $(document).ready(function(e){
            $('.tip').tooltipster();
            $('.scrollbox').tinyscrollbar();
            // $('.validable').each(function(index, element) {
            //     $(this).validationEngine({focusFirstField:false,scroll:false,maxErrorsPerField:1,showArrow:false});
            // });
            
            
        });
        
    </script>

    
</body>
</html>
