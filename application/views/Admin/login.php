<title><?php echo $title;?></title>

<div class="login-container">
    <div class="row">
        <div class="col-md-12">
            <div class="text-center m-b-md">                
                <h3>Beachcombers</h3>
            </div>
            <div class="hpanel">
                <div class="panel-body">
					<?php
						$this->load->helper('form');
						echo validation_errors();
					?>
                    <?php if(isset($login_error) && count($login_error)> 0) { ?>
                        <div class="alert alert-<?=$login_error['color']?> alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <strong> <?=$login_error['message'];?> </strong>
                        </div>
                    <?php } ?>

                    <form action="<?=base_url("login")?>" id="loginForm" method="post">
                        <div class="form-group">
                            <label class="control-label" for="username">Email</label>
                            <input type="text" placeholder="example@gmail.com" title="Please enter you email" required="" value="" name="username" id="username" class="form-control">
                            <span class="input-form-error"><?=form_error('email');?></span>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="password">Password</label>
                            <input type="password" title="Please enter your password" placeholder="******" required="" value="" name="password" id="password" class="form-control">
                            <span class="input-form-error"><?=form_error('email');?></span>
                        </div>
                        <button type="submit" class="btn btn-success btn-block" name="btn_login">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded',function ()
    {
        $("#loginForm").validate({
            rules: {
                password: {
                    required: true
                },
                username: {
                    required: true
                }
            },
            submitHandler: function(form) {
                form.submit();
            }
        });
    });
</script>