<?php if(!isset($Translation)){ @header('Location: index.php?signIn=1'); exit; } ?>
<?php include_once("$currDir/header.php"); ?>

<?php if($_GET['loginFailed']){ ?>
	<div class="alert alert-danger"><?php echo $Translation['login failed']; ?></div>
<?php } ?>

<div class="row">
	<div class="col-sm-6 col-lg-8" id="login_splash">
		
		<!-- customized splash content here -->
		
This is a basic protoype of the Spindle Game. It uses the Asuwada Game mode, which was developed for collaborative historiographic narratives.<br></br>

The data used in here are derived from the research Principles of Liberty by Tabea Hirzel.<br></br>

Since the game was developed at the end of the research, as part of its performance, the original data analysis was not made with this tool and data are incomplete, only for demonstrative purpose. <br></br>
Use one of the following users with their corresponding passwords.<br></br>
		<!-- Start user entry options -->
		<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
  overflow:hidden;padding:10px 5px;word-break:normal;}
.tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
  font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
.tg .tg-0lax{text-align:left;vertical-align:top}
</style>
<table class="tg">
<thead>
  <tr>
    <th class="tg-0lax">User</th>
    <th class="tg-0lax">password</th>
  </tr>
</thead>
<tbody>
  <tr>
    <td class="tg-0lax">Explorer</td>
    <td class="tg-0lax">explorer</td>
  </tr>
  <tr>
    <td class="tg-0lax">Analyst</td>
    <td class="tg-0lax">analyst</td>
  </tr>
  <tr>
    <td class="tg-0lax">Narrator</td>
    <td class="tg-0lax">narrator</td>
  </tr>
  <tr>
    <td class="tg-0lax">Coordinator</td>
    <td class="tg-0lax">coordinator</td>
  </tr>
</tbody>
</table><br></br>
<!-- End user entry options -->


	</div>
	<div class="col-sm-6 col-lg-4">
		<div class="panel panel-success">

			<div class="panel-heading">
				<h1 class="panel-title"><strong><?php echo $Translation['sign in here']; ?></strong></h1>
				<?php if(sqlValue("select count(1) from membership_groups where allowSignup=1")){ ?>
					<a class="btn btn-success pull-right" href="membership_signup.php"><?php echo $Translation['sign up']; ?></a>
				<?php } ?>
				<div class="clearfix"></div>
			</div>

			<div class="panel-body">
				<form method="post" action="index.php">
					<div class="form-group">
						<label class="control-label" for="username"><?php echo $Translation['username']; ?></label>
						<input class="form-control" name="username" id="username" type="text" placeholder="<?php echo $Translation['username']; ?>" required>
					</div>
					<div class="form-group">
						<label class="control-label" for="password"><?php echo $Translation['password']; ?></label>
						<input class="form-control" name="password" id="password" type="password" placeholder="<?php echo $Translation['password']; ?>" required>
						<span class="help-block"><?php echo $Translation['forgot password']; ?></span>
					</div>
					<div class="checkbox">
						<label class="control-label" for="rememberMe">
							<input type="checkbox" name="rememberMe" id="rememberMe" value="1">
							<?php echo $Translation['remember me']; ?>
						</label>
					</div>

					<div class="row">
						<div class="col-sm-offset-3 col-sm-6">
							<button name="signIn" type="submit" id="submit" value="signIn" class="btn btn-primary btn-lg btn-block"><?php echo $Translation['sign in']; ?></button>
						</div>
					</div>
				</form>
			</div>

			<?php if(is_array(getTableList()) && count(getTableList())){ /* if anon. users can see any tables ... */ ?>
				<div class="panel-footer">
					<?php echo $Translation['browse as guest']; ?>
				</div>
			<?php } ?>

		</div>
	</div>
</div>

<script>document.getElementById('username').focus();</script>
<?php include_once("$currDir/footer.php"); ?>
