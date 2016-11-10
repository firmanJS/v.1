<div id="page-wrapper">
  <?php echo tampil_pesan(); ?>
    <div class="row">
      <div class="col-md-12">
            <div class="box-header" style="margin-top:20px;">
            <?php if($akses->akses_input == 1) { ?>
              <a href="user_management/user_list/form" class="btn btn-primary btn-sm btn-form"><i class="fa fa-plus"></i> &nbsp; Add New</a>
            <?php } ?>
            </div>
            <br />
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr class="headings">
                    <th class="teks-tengah" width="10px">No. </th>
                    <th class="teks-tengah">Nama </th>
                    <th class="teks-tengah">Username </th>
                    <th class="teks-tengah">Group </th>
                    <th class="teks-tengah" width="10px">Status </th>
                    <?php if($akses->akses_edit == 1 || $akses->akses_delete == 1) { ?>
                    <th class="teks-tengah">Action
                    </th>
                    <?php } ?>
                  </tr>
                </thead>
                <tbody>
                <?php $i = 1; foreach ($all as $a) { ?>
                  <tr>
                    <td class="teks-tengah"><?php echo $i; ?></td>
                    <td class="teks-tengah"><?php echo $a->nama; ?></td>
                    <td class="teks-tengah"><?php echo $a->username; ?></td>
                    <td class="teks-tengah"><?php echo $a->nm_group; ?></td>
                    <td class="teks-tengah">
                    <?php if($a->status == 1){ ?>
                      <span class="btn btn-info fa fa-check">Aktif</span>
                    <?php }else{ ?>
                      <span class="btn btn-danger fa fa-ban">In Active</span>
                    <?php } ?>
                    </td>
                    <?php if($akses->akses_edit == 1 || $akses->akses_delete == 1) { ?>
                      <td class="teks-tengah">
                        <?php if($akses->akses_edit == 1) { ?>
                        <a href="user_management/user_list/form/<?php echo $a->id;?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                        <?php } ?>
                        <?php if($akses->akses_delete == 1) { ?>
                        <a href="user_management/user_list/delete/<?php echo $a->id;?>" class="btn btn-sm btn-danger" onclick="
                          swall(title: 'Está seguro?',
                          text: 'No podrá recuperar el cliente una vez sea eliminado!',
                          type: 'warning',
                          showCancelButton: true,
                          confirmButtonColor: '#DD6B55',
                          confirmButtonText: 'Si, Eliminarlo!',
                          cancelButtonText: 'No, Cancelar!',
                          confirmButtonClass: 'btn-dange',
                          closeOnConfirm: false,
                          closeOnCancel: false)"><i class="fa fa-trash-o"></i></a>
                        <?php } ?>
                      </td>
                     <?php } ?>
                  </tr>
                 <?php $i++; } ?>
                </tbody>
              </table>
            </div>
  </div>
</div>
