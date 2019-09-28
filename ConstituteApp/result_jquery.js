$(function(){
  'use strict';

  $('.wrongProv').on('click', function(){
    var id = $(this).attr('id');
    if($('.' + id).hasClass('hide')){
      $('.' + id).removeClass('hide');
    }else{
      $('.' + id).addClass('hide');
    }
  });

  $('.backHome').on('click',function(){
    window.location.href = '/index.php';
  });

});
