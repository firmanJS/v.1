<div id="page-wrapper">
    <div class="row">
      <div class="col-md-12">
            <br />
            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="site/menu/save">
            <input type="hidden" name="id" value="<?php if(isset($record->id)) echo $record->id; ?>">

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Parent
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select type="text" id="first-name" class="form-control col-md-7 col-xs-12" name="parent_id">
                    <option value="0"></option>
                    <?php foreach($parent as $p){ ?>
                      <option value="<?php echo $p->id; ?>" <?php if(isset($record->id) && $record->parent_id == $p->id) echo 'selected' ?>><?php echo $p->nama; ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Menu
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="last-name" name="nama" required="required" value="<?php if(isset($record->id)) echo $record->nama; ?>" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Target</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="target" value="<?php if(isset($record->id)) echo $record->target; ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Description</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <textarea id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="keterangan"><?php if(isset($record->id)) echo $record->keterangan; ?></textarea>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Icon
                </label>
                <div class="col-md-2 col-sm-6 col-xs-12">
                  <select type="text" id="first-name" class="form-control col-md-7 col-xs-12" style="font-family: 'FontAwesome', Helvetica;" name="icon">
                    <option value="0"></option>
                    <?php foreach($icon as $i){ ?>
                      <option value="<?php echo $i->nama; ?>" <?php if(isset($record->id) && $record->icon == $i->nama) echo 'selected' ?>><?php echo $i->kode; ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="akses">
                    akses
                </label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="akses_view" value="1" checked disabled /> view
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="akses_input" id="akses_input" value="1" <?php if(isset($record->id) && $record->akses_input==1) echo 'checked'; ?> /> input
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="akses_edit" id="akses_edit" value="1" <?php if(isset($record->id) && $record->akses_edit==1) echo 'checked'; ?>/> edit
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="akses_delete" id="akses_delete" value="1" <?php if(isset($record->id) && $record->akses_delete==1) echo 'checked'; ?>/> delete
                    </label>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Order</label>
                <div class="col-md-2 col-sm-6 col-xs-12">
                  <input id="middle-name" class="form-control col-md-7 col-xs-12" type="number" name="urutan" value="<?php if(isset($record->id)) echo $record->urutan; ?>">
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
              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button type="submit" class="btn btn-primary">Cancel</button>
                  <button type="submit" class="btn btn-success">Submit</button>
                </div>
              </div>
            </form>
      </div>
    </div>
