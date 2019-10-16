$(function(){
  "use strict";
  $(".open").on('click', function(){
    if($(this).parents().next().hasClass('indivHide')){
      $(this).parents().next().removeClass('indivHide');
      $(this).text('隠す');
    }else{
      $(this).parents().next(".CapAndTitle").addClass('indivHide');
      $(this).text('条文ごとに見る');
    }
  });

  $('.title').on('click', function(){
    window.location.href = './index.php';
  });

});
