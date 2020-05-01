<div class="modal fade" id="postModal" tabindex="-1" role="dialog" aria-labelledby="postModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="postModalLabel">Post Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="post">
          <div class="container">
            <form method="post" enctype="multipart/form-data" id="post_movie">
              <input type="hidden" name="csrf_token" value="<?=CSRF::getToken();?>">
                Movie
              <label class="float-right">
                <span class="btn btn-outline-primary">
                  Choose Movie
                  <input type="file" accept="video/*" multiple name="movie" id="movie" style="display:none;"><br>
                </span>
              </label>
              <input type="text" class="form-control" readonly="">
              <br>
              <br>
                Thumbnail
              <label class="float-right">
                <span class="btn btn-outline-primary">
                  Choose Thumbnail
                  <input type="file" accept="image/png, image/jpeg, image/gif" multiple name="thumbnail" id="thumbnail" style="display:none;"><br>
                </span>
              </label>
              <input type="text" class="form-control" readonly="">
              <br>
              <br>
              タイトル
              <textarea name="title" cols="35" rows="1" class="form-control col-xs-12" id="title" placeholder="タイトルを入力してください" onclick="this.focus();this.select()">No Title</textarea><br>
              説明文
              <textarea name="explanation" cols="35" rows="5" class="form-control col-xs-12" id="explanation" placeholder="説明文を入力してください" onclick="this.focus();this.select()">Grateful Movie.</textarea><br>
            </form>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="send">Up Load</button>
      </div>
    </div>
  </div>
</div>
<?php if ($T->session_status === 'login'):?>
  <button type="button" class="btn-lg btn-primary post-button" data-toggle="modal" data-target="#postModal">
    <i class="fas fa-video"></i>
  </button>
<?php endif ?>