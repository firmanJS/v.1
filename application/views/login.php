<!DOCTYPE html>
<html lang="id" >
<head>
  <base href="<?php echo base_url()?>">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Login</title>
  <link rel="stylesheet" href="<?echo base_url();?>lib/css/bootstrap.min.css" type="text/css" />
  <link rel="stylesheet" href="<?echo base_url();?>lib/css/custom.css" type="text/css" />
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <center>
													<h3 class="panel-title">Login Form</h3>
												</center>
                    </div>
                    <div class="panel-body">
                      <?
                        echo tampil_pesan();
                        ?>
                        <form role="form" method="post" action="<? echo site_url();?>auth/do_login">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username"
																		 name="username" type="text" autofocus required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password"
																		name="password" type="password" required>
                                </div>
                                <button type="submit" class="btn btn-lg btn-success btn-block">Submit</a>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Core Scripts - Include with every page -->
    <script src="<? echo site_url();?>lib/js/jquery.min.js"></script>
    <script type="text/javascript">
        window.setTimeout(function() {
          $(".alert").fadeTo(300, 0).slideUp(500, function(){
            $(this).remove();
          });
        }, 4000);
    </script>
</body>
</html>
