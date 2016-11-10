<footer class="teks-tengah navbar navbar-default"tyle="margin-bottom: 0">
  <div style="margin-top:10px; font-weight:600;">
    <span><? echo $pembuat;?></span>
  </div>
</footer>
</div>
<script src="<? echo site_url();?>lib/js/jquery.min.js"></script>
<script src="<? echo site_url();?>lib/js/bootstrap.js"></script>
<script src="<? echo site_url();?>lib/js/jquery.metisMenu.js"></script>
<script src="<? echo site_url();?>lib/js/custom.js"></script>
<script src="<? echo site_url();?>lib/js/sweetalert.min.js"></script>
<script>
$(document).ready(function($){
  $("#delete").on("click",function(){
    swal({
      title: "Está seguro?",
        text: "No podrá recuperar el cliente una vez sea eliminado!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: '#DD6B55',
        confirmButtonText: 'Si, Eliminarlo!',
        cancelButtonText: "No, Cancelar!",
        confirmButtonClass: "btn-danger",
        closeOnConfirm: false,
        closeOnCancel: false
          }, function(isConfirm) {
      if (isConfirm) {
        swal("Eliminado!", "Su cliente ha sido eliminado!", "success");
      } else {
        swal("Cancelado", "Su cliente está a salvo! :)", "error");
      }});
  });
});
</script>
</body>
</html>
