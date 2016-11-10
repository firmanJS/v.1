<div id="page-wrapper">
    <div class="row">
      <div class="col-md-12">
            <div class="box-header" style="margin-top:20px;">
              <a href="site/menu/form" class="btn btn-primary btn-sm btn-form"><i class="fa fa-plus"></i> &nbsp; Add New</a>
            </div>
            <br />
            <div class="table-responsive">
              <table class="table table-striped jambo_table bulk_action">
                <thead>
                  <tr class="headings">
                    <th class="teks-tengah">No. </th>
                    <th class="teks-tengah">Menu </th>
                    <th class="teks-tengah">Target </th>
                    <th class="teks-tengah">#ID </th>
                    <th class="teks-tengah">#</th>
                    <th class="teks-tengah">Status</th>
                    <th class="teks-tengah">Action</th>
                  </tr>
                </thead>
                <tbody>
                <? $i = 1; foreach ($all as $a) { ?>
                  <tr>
                    <td class="teks-tengah"><? echo $i;?></td>
                    <td class="teks-tengah"><? echo $a->nama; ?></td>
                    <td class="teks-tengah"><? echo $a->target; ?></td>
                    <td class="teks-tengah"><? echo $a->id; ?></td>
                    <td class="teks-tengah"><? echo $a->urutan; ?></td>
                    <td class="teks-tengah">
                    <?php if($a->status == 1){ ?>
                      <span class="btn btn-info fa fa-check">Aktif</span>
                    <?php }else{ ?>
                      <span class="btn btn-danger fa fa-ban">In Active</span>
                    <?php } ?>
                    </td>
                    <td class="teks-tengah">
                    <a href="site/menu/form/<? echo $a->id;?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                    <a href="site/menu/delete/<? echo $a->id;?>" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin menghapus data ini ?')"><i class="fa fa-trash-o"></i></a>
                    </td>
                  </tr>
                  <? $i++; foreach($child[$a->id] as $c ){ ?>
                    <tr>
                      <td class="teks-tengah"><? echo $i;?></td>
                      <td class="teks-tengah"> &nbsp; - <? echo $c->nama; ?></td>
                      <td class="teks-tengah"><? echo $c->target; ?></td>
                      <td class="teks-tengah"><? echo $c->id; ?></td>
                      <td class="teks-tengah"><? echo $c->urutan; ?></td>
                      <td class="teks-tengah">
                      <?php if($c->status == 1){ ?>
                        <span class="btn btn-info fa fa-check">Aktif</span>
                      <?php }else{ ?>
                        <span class="btn btn-danger fa fa-ban">In Active</span>
                      <?php } ?>
                      </td>
                      <td class="teks-tengah">
                      <a href="site/menu/form/<? echo $c->id;?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                      <a href="site/menu/delete/<? echo $c->id;?>" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin menghapus data ini ?')"><i class="fa fa-trash-o"></i></a>
                      </td>
                    </tr>
                  <? $i++; } ?>
                 <? } ?>
                </tbody>
              </table>
            </div>
          </div>
    </div>
