$(function() {
  $('video').on('ended', function(){
    $.ajax({
        type: 'POST',
        url: "scripts/countUp.php",
        data: 'movieId='+$(this).attr('name'),
    })
    .done(function(getData, textStatus){
      // // デバッグ用 アラートとコンソール
      // alert(getData);
      // console.log(getData);
      // //出力する部分
      // $('#result').html(getData);
      // $("#textStatus").html("textStatus : " + textStatus);
      // location.reload();
      return false;
    })
    .fail(function(XMLHttpRequest, textStatus, errorThrown) {
      alert('Error : ' + errorThrown);
      $("#XMLHttpRequest").html("XMLHttpRequest : " + XMLHttpRequest.status);
      $("#textStatus").html("textStatus : " + textStatus);
      $("#errorThrown").html("errorThrown : " + errorThrown);
      return false;
    });
  });
});