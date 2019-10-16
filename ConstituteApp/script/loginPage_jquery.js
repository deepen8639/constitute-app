$(function(){
  "use strict";

  $('#btn').on('click', function(){
    var id = $('input[name="ID"]').val();
    var password = $('input[name="password"]').val();
    $.post('./Ajax/_login.php', {
      id: id,
      password: password
    }).done(function(res){
    if(res['result']===true){
      window.location.href = './-MyPage.php';
    }else{
      alert('IDかパスワードが間違っています');
    }
    });
    // alert(id,password);
  });

  $('.title').on('click', function(){
    window.location.href = './index.php';
  });
});
