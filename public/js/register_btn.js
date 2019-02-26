$(document).ready(function(){
  $('#btn-register').on('click',function(e){
    //e.preventDefault()
    var email = $('#email').val();
    var password = $('#password').val();
    var username = $('#username').val();
    var tel = $('#tel').val();
    // console.log(`${email} ${password} ${username} ${tel}`)
    // if (email && password && username && tel){
  //                //console.log('ok')
  //               // window.location.replace('/flight-list');
  //               $('#register').submit()
  //           }
  //       else
  //       {
  //           swal("Thiếu thông tin", "Vui lòng nhập đủ thông tin", "error");
  //       }
  })
  function validate(email, password, name, tel) {
        var flag = true;
        if (!email || !password || !name || !tel) {
            swal("Cảnh báo", "Vui lòng điền đủ thông tin", "error");
            flag = false;
        }
        return flag;

    }
})
