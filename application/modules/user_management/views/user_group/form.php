<div id="page-wrapper">
    <div class="row">
      <div class="col-md-12">
            <br />
            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="user_management/user_group/save">
            <input type="hidden" name="id" value="<?php if(isset($record->id)) echo $record->id; ?>">
            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
              <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Group</a>
              </li>
              <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Akses</a>
              </li>
            </ul>

            <div id="myTabContent" class="tab-content">
              <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                <br>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Group
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="last-name" name="nama" required="required" value="<?php if(isset($record->id)) echo $record->nama; ?>" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="form-group">
                  <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Description</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <textarea id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="keterangan"><?php if(isset($record->id)) echo $record->keterangan; ?></textarea>
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
              </div>
              <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                <br>
                <?php foreach($all as $a){ ?>
                  <div class="item form-group">
                    <label class="col-md-3 col-sm-3 col-xs-12">
                      <?php echo $a->nama; ?>
                      <input type="hidden" name="id_menu[]" value="<?php echo $a->id ?>">
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <div class="checkbox custom <?php if($a->akses_view == 0) echo 'hidden' ?>">
                        <label>
                          <input type="checkbox" name="akses_view[<?php echo $a->id; ?>]" value="1" <?php if(isset($view[$a->id]) && $view[$a->id] == 1) echo 'checked' ?> /> view
                        </label>
                      </div>
                      <div class="checkbox custom <?php if($a->akses_input == 0) echo 'hidden' ?>">
                        <label>
                          <input type="checkbox" name="akses_input[<?php echo $a->id; ?>]" value="1" <?php if(isset($input[$a->id]) && $input[$a->id] == 1) echo 'checked' ?> /> input
                        </label>
                      </div>
                      <div class="checkbox custom <?php if($a->akses_edit == 0) echo 'hidden' ?>">
                        <label>
                          <input type="checkbox" name="akses_edit[<?php echo $a->id; ?>]" value="1" <?php if(isset($edit[$a->id]) && $edit[$a->id] == 1) echo 'checked' ?> /> edit
                        </label>
                      </div>
                      <div class="checkbox custom <?php if($a->akses_delete == 0) echo 'hidden' ?>">
                        <label>
                          <input type="checkbox" name="akses_delete[<?php echo $a->id; ?>]" value="1" <?php if(isset($delete[$a->id]) && $delete[$a->id] == 1) echo 'checked' ?> /> delete
                        </label>
                      </div>
                    </div>
                  </div>
                  <?php foreach($child[$a->id] as $c) { ?>
                    <div class="item form-group">
                      <label class="col-md-3 col-sm-3 col-xs-12">
                        &nbsp; &nbsp; - <?php echo $c->nama; ?>
                        <input type="hidden" name="id_menu[]" value="<?php echo $c->id ?>">
                      </label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <div class="checkbox custom <?php if($c->akses_view == 0) echo 'hidden' ?>">
                          <label>
                            <input type="checkbox" name="akses_view[<?php echo $c->id; ?>]" value="1" <?php if(isset($view[$c->id]) && $view[$c->id] == 1) echo 'checked' ?> /> view
                          </label>
                        </div>
                        <div class="checkbox custom <?php if($c->akses_input == 0) echo 'hidden' ?>">
                          <label>
                            <input type="checkbox" name="akses_input[<?php echo $c->id; ?>]" value="1" <?php if(isset($input[$c->id]) && $input[$c->id] == 1) echo 'checked' ?> /> input
                          </label>
                        </div>
                        <div class="checkbox custom <?php if($c->akses_edit == 0) echo 'hidden' ?>">
                          <label>
                            <input type="checkbox" name="akses_edit[<?php echo $c->id; ?>]" value="1" <?php if(isset($edit[$c->id]) && $edit[$c->id] == 1) echo 'checked' ?> /> edit
                          </label>
                        </div>
                        <div class="checkbox custom <?php if($c->akses_delete == 0) echo 'hidden' ?>">
                          <label>
                            <input type="checkbox" name="akses_delete[<?php echo $c->id; ?>]" value="1" <?php if(isset($delete[$c->id]) && $delete[$c->id] == 1) echo 'checked' ?> /> delete
                          </label>
                        </div>
                      </div>
                    </div>
                  <?php } ?>
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
