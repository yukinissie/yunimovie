$(function() {
  //投稿メソッド
  $('#send').click(function(){
    var postData = {
      title : $('#title').val(),
      explanation : $('#explanation').val(),
      url : $('#url').val(),
      thumbnail : $('#thumbnail').val()
    };
    $.ajax({
      type: "POST",
      url: "./scripts/postMovie.php",
      data: postData,
    }).done(function(getData, dataType) {
      //デバッグ用 アラートとコンソール
      alert(getData);
      console.log(getData);
      //出力する部分
      $('#result').html(getData);
    }).fail(function(XMLHttpRequest, textStatus, errorThrown) {
      alert('Error : ' + errorThrown);
      $("#XMLHttpRequest").html("XMLHttpRequest : " + XMLHttpRequest.status);
      $("#textStatus").html("textStatus : " + textStatus);
      $("#errorThrown").html("errorThrown : " + errorThrown);
    });
    location.reload();
    return false;
  });
});