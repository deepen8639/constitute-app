$(function(){
  "use strict";

  $('#btn').on('click', function(){
    var id = $('input[name="ID"]').val();
    var password = $('input[name="password"]').val();
    $.post('./Ajax/_signUp.php', {
      id: id,
      password: password,
    }).done(function(res){
      if(res['result']===true){
        // alert(res['result']);
        window.location.href = './-loginPage.php';
      }else{
        alert(res['result']);
      }
    });
    // alert(id,password);
  });
  $('.title').on('click', function(){
    window.location.href = './index.php';
  });
});
