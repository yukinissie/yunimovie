$(function() {
  $('#send').click(function() {
    if($("#movie").prop('files')[0] == null) {
      alert('動画を選択してください');
      return false;
    }
    if($("#thumbnail").prop('files')[0] == null) {
      alert('サムネイルを選択してください');
      return false;
    }
    // フォームデータを取得
    var formdata = new FormData($('#post_movie').get(0));
    // POSTでアップロード
    $.ajax({
      url  : "./scripts/postMovie.php",
      type : "POST",
      data : formdata,
      cache       : false,
      contentType : false,
      processData : false,
      dataType    : "html"
    })
    .done(function(getData, textStatus){
      // デバッグ用 アラートとコンソール
      alert(getData);
      console.log(getData);
      //出力する部分
      $('#result').html(getData);
      $("#textStatus").html("textStatus : " + textStatus);
      location.reload();
      return false;
    })
    .fail(function(XMLHttpRequest, textStatus, errorThrown) {
      alert('Error : ' + errorThrown);
      $("#XMLHttpRequest").html("XMLHttpRequest : " + XMLHttpRequest.status);
      $("#textStatus").html("textStatus : " + textStatus);
      $("#errorThrown").html("errorThrown : " + errorThrown);
    });
  });
});