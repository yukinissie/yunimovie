$(function() {
  // 削除メソッド
  $('.delete').click(function(){
    if(!confirm('本当に削除しますか？\nこの操作は取り消せません。')){
      return false;
    } else {
      var deleteData = {
        id : $(this).attr('id')
      };
      $.ajax({
        type: "POST",
        url: "./scripts/deleteMovie.php",
        data: deleteData,
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
    }
  });
});