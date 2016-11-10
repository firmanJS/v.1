<div id="page-wrapper">
  <div class="row">
      <div class="col-lg-12">
        <br>
            <div class="table-responsive">
              <div class="box-header" style="margin-bottom:10px;">
                <a href="user_management/user_group/form" class="btn btn-info fa fa-plus"> Tambah</a>
              </div>
              <table class="table table-striped">
                <thead>
                  <tr class="headings">
                    <th style="text-align:center;">No. </th>
                    <th style="text-align:center;">Nama </th>
                    <th style="text-align:center;">Description </th>
                    <th style="text-align:center;">Status </th>
                    <? if($akses->akses_edit == 1 || $akses->akses_delete == 1) { ?>
                    <th style="text-align:center;">Action
                    </th>
                    <? } ?>
                  </tr>
                </thead>
                <tbody>
                <? $i = 1; foreach ($all as $a) { ?>
                  <tr>
                    <td style="text-align:center;"><? echo $i; ?></td>
                    <td style="text-align:center;"><? echo $a->nama; ?></td>
                    <td style="text-align:center;"><? echo $a->keterangan; ?></td>
                    <td class="teks-tengah">
                    <?php if($a->status == 1){ ?>
                      <span class="btn btn-info fa fa-check">Aktif</span>
                    <?php }else{ ?>
                      <span class="btn btn-danger fa fa-ban">In Active</span>
                    <?php } ?>
                    </td>
                    <? if($akses->akses_edit == 1 || $akses->akses_delete == 1) { ?>
                    <td style="text-align:center;">
                    <? if($akses->akses_edit == 1) { ?>
                    <a href="user_management/user_group/form/<? echo $a->id;?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                    <? } ?>
                    <? if($akses->akses_delete == 1) { ?>
                    <a href="user_management/user_group/delete/<? echo $a->id;?>" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin menghapus data ini ?')"><i class="fa fa-trash-o"></i></a>
                    <? } ?>
                    </td>
                    <? } ?>
                  </tr>
                 <? $i++; } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
