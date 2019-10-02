$(function(){
  'use strict';



  $('.part0').on('click', function(){
    var selected_id = $(this).attr('id');
    var currentPart = $(this).text();
    // alert($(this).attr('id'));
    $.post('./Ajax/_setProv.php', {
      selected_id: selected_id,
      currentPart: currentPart
    }).done(function(res){
      // alert(res['result']);
      window.location.href = './-zenbun.php';
    });
  });


  $('.part').on('click', function(){
    if($('.customButton').hasClass('selected')){
      return;
    }else if ($('.individualButton').hasClass('selected')) {
    // alert($(this).hasClass('indivSelected'));

      if($(this).hasClass('indivSelected')){
        $(this).next('.CapAndTitle').children('input:checkbox').each(function(){
          $(this).prop('checked', false);
        });
        $(this).removeClass('indivSelected');
        // alert('removed');
      }else if(!$(this).hasClass('indivSelected')){
        $(this).next('.CapAndTitle').children('input:checkbox').each(function(){
          $(this).prop('checked', true);
        });
        $(this).addClass('indivSelected');
        // alert('added');
      }

    }else{

      var selected_id = $(this).attr('id');
      // var latter_id = $(this).next('div').attr('id');
      var currentPart = $(this).text();
      // alert($(this).attr('id'));
      $.post('./Ajax/_setProv.php', {
        selected_id: selected_id,
        // latter_id: latter_id,
        currentPart: currentPart
      }).done(function(res){
        // alert(res['result']);
        window.location.href = './-questions.php';
      });
    }

  });


  $('.customButton').on('click', function(){
    if($(this).hasClass('disabled')){
      return;
    }else{

      if($(this).hasClass('selected')){
        $(this).removeClass('selected');
        $('.checkBox').addClass('hide');
        $('.customStartButton').addClass('hide');
        $('.individualButton').removeClass('disabled');
      }else{
        $(this).addClass('selected');
        $('.checkBox').removeClass('hide');
        $('.customStartButton').removeClass('hide');
        $('.individualButton').addClass('disabled');
      }
    }
  });

  $('.customStartButton').on('click',function(){
    var selected_id = [];
    var selected_parts = [];
    $('input[name="checkbox[]"]:checked').each(function(){
      selected_id.push($(this).val());
      selected_parts.push($(this).parents('label').text());
    });
    if($.isEmptyObject(selected_id)){
      selected_id = 'none';
    }
    $.post('./Ajax/_setCustomProv.php', {
      selected_id: selected_id,
      selected_parts: selected_parts
    }).done(function(res){
      if(res['res']=='not selected'){
        alert('条文を選択してください');
      }else{
        window.location.href = './-customQues.php';
        // alert(selected_id,selected_parts);
      }
    });
  });

  $('.individualButton').on('click', function(){
    if($(this).hasClass('disabled')){
      return;
    }else{

    if($(this).hasClass('selected')){
      $(this).removeClass('selected');
      $('.indivStartButton').addClass('hide');
      $('.CapAndTitle').addClass('indivHide');
      $('.customButton').removeClass('disabled');
      $('.part input').each(function(){
        $(this).prop('disabled', false);
      });
    }else{
      $(this).addClass('selected');
      $('.indivStartButton').removeClass('hide');
      $('.CapAndTitle').removeClass('indivHide');
      $('.customButton').addClass('disabled');
      $('.part input').each(function(){
        $(this).prop('disabled', true);
      });
    }
  }
});


  $('.indivStartButton').on('click', function(){
    var selected_id = [];
    var selected_caption = [];
    $('.container .CapAndTitle input:checkbox:checked').each(function(){
      selected_id.push($(this).val());
      // selected_caption.push($(this).text());
    });
    if($.isEmptyObject(selected_id)){
      selected_id = 'none';
    }
    $.post('./Ajax/_setIndivProv.php',{
      selected_id: selected_id,
      // selected_caption: selected_caption
    }).done(function(res){
      // alert(selected_id,res['result']);
      // location.reload();
      if(res['res']==='not selected'){
        alert('条文を選択してください');
      }else{
        window.location.href = './-indivQues.php';
      }

    });
  });


});
