<title><?php echo $title; ?></title>

<div class="small-header transition animated fadeIn">
    <div class="hpanel">
        <div class="panel-body">
            <div id="hbreadcrumb" class="pull-right">
                <ol class="hbreadcrumb breadcrumb">
                    <li><a href="<?php echo base_url("Dashboard")?>">Dashboard</a></li>
					<li class="active">
                        <span><?php echo $title;?></span>
                    </li>
                </ol>
            </div>
            <h2 class="font-light m-b-xs">
                <?php echo $title;?>
            </h2>
            <!--<small>Examples of various form controls.</small>-->
        </div>
    </div>
</div>

<div class="content animate-panel">
	<div class="row">
        <div class="col-lg-12">
            <div class="hpanel">
                <!--<div class="panel-heading">
                    <div class="panel-tools">
                        <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                        <a class="closebox"><i class="fa fa-times"></i></a>
                    </div>                         
                </div>-->
                <div class="panel-body">
					
					<form method="POST" class="form-horizontal">
					
					<?php
						if(!empty($message))
						{
							echo '<div class="form-group"><div class="col-lg-12">';
							echo $message;
							echo '</div></div>';
						}
					?>
					
						<div class="form-group">
							<label class="col-lg-2 control-label">Current Password</label>
                            <div class="col-lg-10">
								<input class="form-control" type="password" name="txt_opassword" placeholder="Current Password">
                            </div>
						</div>
						<div class="form-group">
							<label class="col-lg-2 control-label">New Password</label>
                            <div class="col-lg-10">
								<input class="form-control" type="password" name="txt_npassword" placeholder="New Password">
                            </div>
						</div>
						<div class="form-group">
							<label class="col-lg-2 control-label">Confirm New Password</label>
                            <div class="col-lg-10">
								<input class="form-control" type="password" name="txt_cnpassword" placeholder="Confirm New Password">
                            </div>
						</div>
						<div class="form-group">
							<div class="col-sm-10 col-sm-offset-2">
								<input class="btn btn-primary" type="submit" name="change_pwd" value="Change Password" />
							</div>
						</div>
					</form>
					
						
				
                	
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
document.addEventListener('DOMContentLoaded', function()
{
	

});
</script>
