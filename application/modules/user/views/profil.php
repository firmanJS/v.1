<div id="page-wrapper">
    <div class="row">
      <div class="col-md-12">
        <br>
            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="user_management/user_list/save" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php if(isset($record->id)) echo $record->id; ?>">
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nama
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="last-name" name="nama" required="required" value="<?php if(isset($record->id)) echo $record->nama; ?>" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Username
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="last-name" name="username" required="required" value="<?php if(isset($record->id)) echo $record->username; ?>" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Password
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="password" id="password" name="password" placeholder="<?php if(isset($record->id)) echo 'Empty if not change'; ?>" class="form-control col-md-7 col-xs-12" <?php if(empty($record->id)) echo 'required'; ?>>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Confirm Password
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="password" id="confirm" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Group
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select type="text" id="first-name" class="form-control col-md-7 col-xs-12" name="id_group">
                    <option value="0"></option>
                    <?php foreach($group as $p){ ?>
                      <option value="<?php echo $p->id; ?>" <?php if(isset($record->id) && $record->id_group == $p->id) echo 'selected' ?>><?php echo $p->nama; ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="status">
                  Status
                </label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <div class="radio">
                    <label>
                      <input type="radio" name="status" id="status1" value="1" <?php if(empty($record->id) || ( isset($record->id) && $record->status==1) ) echo 'checked'; ?> /> Active
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="status" id="status0" value="0" <?php if(isset($record->id) && $record->status==0) echo 'checked'; ?>/> Inactive
                    </label>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Foto</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                <?php if(empty($record->id)){?>
                    <img src="gbr/user/default.png">
                    <input class="form-upload col-md-7 col-xs-12" type="file" name="foto">
                    <input type="hidden" name="foto2" value="default.png">
                <?php }else{ ?>
                  <?php if(!file_exists(FCPATH.'gbr/user/'.$record->foto)) { ?>
                    <img src="gbr/user/default.png">
                  <?php }else{ ?>
                    <img src="gbr/user/<?php echo $record->foto; ?>" style="width: 100px;">
                  <?php } ?>
                  <input class="form-upload col-md-7 col-xs-12" type="file" name="foto">
                  <input type="hidden" name="foto2" value="<?php if(isset($record->foto)) echo $record->foto; ?>">
                <?php } ?>
                </div>
              </div>
              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button type="submit" class="btn btn-success">Submit</button>
                </div>
              </div>
            </form>
          </div>
      </div>
