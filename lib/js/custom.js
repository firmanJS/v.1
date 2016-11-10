$(function() {

    $('#side-menu').metisMenu();

});

//collapses the sidebar on window resize.
$(function() {
    $(window).bind("load resize", function() {
        // console.log($(this).width())
        if ($(this).width() < 768) {
            $('div.sidebar-collapse').addClass('collapse')
        } else {
            $('div.sidebar-collapse').removeClass('collapse')
        }
    })
})
//for timeout
window.setTimeout(function() {
  $(".alert").fadeTo(300, 0).slideUp(500, function(){
    $(this).remove();
  });
}, 2000);

//validation password
$(document).ready(function(){
  $('form').submit(function(){
    if($('#password').val()===$('#confirm').val()){
      return true;
    }else{
      swal("Password not match !","",'warning');
      return false;
    }
    return false;
  });
});
