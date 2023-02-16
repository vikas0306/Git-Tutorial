
<link rel="stylesheet" type="text/css" href="<?= base_url('assetsNew/custom_css/custom_style.css');?>"  />

<?php $this->load->view('common/head');?>
    <body>
        <div class="login-container" id="back_img"><!-- style="background-image:url('<//?php echo base_url('assetsNew/logo/fire2.jpg');  ?>');background-size: cover;  background-position: center ; background-repeat: no-repeat; -->
            <div class="login-box animated fadeInDown">
                <div class="login-title" style="font-size:2.7rem; color:#FFF;">
                    <strong><center><b>Project -&nbsp;<small>Test</small></b></center></strong>
                </div>
                <div class="login-body" id="inner_img"><!-- style="background-image:url('<//?php echo base_url('assetsNew/logo/backgray.jpg');  ?>');background-size: cover;  background-position: center ; background-repeat: no-repeat;border-radius:70px 10px;border:2px solid #fff;" -->
                    <div class="login-title"><strong><center></center></strong></div>
                    <div style="height:25px;" class="col-md-12">
                        <h5><b><span class="errorDiv" id="loginError"></b></span></h5>
                        <span id="FlashError">
                             <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : '';?>
                        </span>
                    </div>
                    <form class="form-auth-small" action="<?php echo site_url();?>Welcome/login_action" method="post">
                    <div class="form-group">
                        <div class="col-md-12" >
                            <input type="text" class="form-control" name="email" id="email" placeholder="E-mail" autocomplete="off" style="border: 1px solid #fff;"/>
                            <strong><span class="error text-center pull-right text-danger" id="err_email">&nbsp;</span></strong>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password" style="border: 1px solid #fff;"/>
                            <strong><span class="error text-center pull-right text-danger" id="err_pass">&nbsp;</span></strong>
                        </div>
                    </div>
                    <div class="form-group" style="color:#fff;">
                        <div class="col-md-12">
                            <input type="checkbox" onclick="myFunction()">&nbsp;&nbsp;Show Password
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <!-- <a href="<//?=site_url('Login/forgot_pass');?>" class="btn btn-link btn-block"><i class="fa fa-arrow-left"></i> &nbsp;I forgot my password</a> -->
                        </div>
                        <div class="col-md-6">
                            <input type="hidden" name="site_url" id="site_url" value="<?= site_url(); ?>">
                            
                            <button type="submit" class="btn create btn-info btn-block" onclick="return login_validation()" style="border-radius: 20px 0px;">LOG IN</button>
                        </div>
                    </div>
                   <!--  <//?php echo form_close();?> -->
                   </form>
                </div>
            </div>
        </div>
    </body>
<?php $this->load->view('common/footer');?>

<script type="text/javascript" src="<?php echo base_url(); ?>assetsNew/customjs/login_validation.js"></script>

