

$(function(){
  'use strict';
        //leftの値 = (ウィンドウ幅 -コンテンツ幅) ÷ 2
  var leftPosition = (($(window).width() - $("#dialog_id").outerWidth(true)) / 2);

  $('.ans').on('click', function(){
    $('.selected').removeClass('selected');
    $(this).addClass('selected');

    $('#button').removeClass('disabled');
  });

  $('#button').on('click', function(){
    // 回答が選択されていない状態と、既に回答がクリックされている状態を振り分ける
    // （ダイアログが表示されている時は、回答ボタンを押した際のPOSTを無効化する）
    if(!$(this).hasClass('disabled') && !$(this).hasClass('clicked')){
      var answer = $('.selected').text();
      //回答がクリックされたことをclassに"clicked"を加えることで示す
      $(this).addClass('clicked');
      $.post('/_answer.php',{
        answer: answer
      }).done(function(res){
        if(res['result'] === 'collect'){
          //CSSを変更
          $("#dialog_id").css({"left": leftPosition + "px"});
          $('.dialog-content').text('正解です');
          //ダイアログを表示する
          $("#dialog_id").show();
        }else{
          //CSSを変更
          $("#dialog_id").css({"left": leftPosition + "px"});
          $('.dialog-content').html('不正解です<br>正解は「'
          + '<span class="dialog-result" >' + res['result'] + '</span>」です');
          //ダイアログを表示する
          $("#dialog_id").show();
        }
      });
    }
  });

  $(".dialog-close").on("click", function(){
    $(this).parents(".dialog").hide();
    if($(this).val() === 'result'){
      window.location.href = '/result.php';
    }else if($(this).val() === 'close'){
    $.post('/_pageReload.php',{

    }).done(function(){
      $('input[name="choices"]:checked').prop('checked', false);
      location.reload();
    });
  }
  });

  $('.startbutton').on('click', function(){
    var random;
    if($('input[name="random"]').prop('checked')){
      random = 1;
    }else{
      random = 0;
    }
    $.post('/_pageStart.php',{
      random: random
    }).done(function(){
      // alert(random);
      // window.location.href = '/_pageStart.php';
      location.reload();
    });
  });

  $('.backHome').on('click', function(){
    window.location.href = '/index.php';
  });

});


//閉じるボタンで非表示
