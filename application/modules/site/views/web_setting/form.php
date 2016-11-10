<div id="page-wrapper">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
        <?php echo tampil_pesan(); ?>
          <div class="x_content">
            <br />
            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="site/site_profil/save/1" enctype="multipart/form-data">
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Title
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="last-name" name="title" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $edit->title; ?>">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Description
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <textarea type="text" id="last-name" name="description" required="required" class="form-control col-md-7 col-xs-12"><?php echo $edit->description; ?></textarea>
                </div>
              </div>
              <div class="form-group">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Keywords</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="keywords" value="<?php echo $edit->keywords; ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="middle-name" class="form-control col-md-7 col-xs-12" type="email" name="email" value="<?php echo $edit->email; ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Phone</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="middle-name" class="form-control col-md-7 col-xs-12" type="number" name="phone" value="<?php echo $edit->phone; ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Fax</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="fax" value="<?php echo $edit->fax; ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Address</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <textarea id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="address"><?php echo $edit->address; ?></textarea>
                </div>
              </div>
              <div class="form-group">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Post Code</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="post_code" value="<?php echo $edit->post_code; ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Footer Tags</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="footer_tags" value="<?php echo $edit->footer_tags; ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Longitude</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="longitude" value="<?php echo $edit->longitude; ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Latitude</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="latitude" value="<?php echo $edit->latitude; ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Logo</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <?php if((empty($edit->logo))) { ?>
                    <img src="lib/images/noimage.png">
                  <?php }else{ ?>
                    <img src="gbr/site_profil/<?php echo $edit->logo; ?>" style="width: 100px;">
                  <?php } ?>
                  <input id="middle-name" class="form-upload col-md-7 col-xs-12" type="file" name="logo">
                  <input type="hidden" name="logo2" value="<?php echo $edit->logo; ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Favicon</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <?php if((empty($edit->favicon))) { ?>
                    <img src="lib/images/noimage.png">
                  <?php }else{ ?>
                    <img src="gbr/site_profil/<?php echo $edit->favicon; ?>" style="width: 64px;">
                  <?php } ?>
                  <input id="middle-name" class="form-upload col-md-7 col-xs-12" type="file" name="favicon">
                  <input type="hidden" name="favicon2" value="<?php echo $edit->favicon; ?>">
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button type="submit" class="btn btn-success">Change</button>
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
