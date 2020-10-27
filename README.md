# YuniMovie. on PHP

## 動画投稿プラットフォームを作ってみた（はじめてのPHP）

### 目的
- PHPのアウトプット
- 自分の手でものを作る

### 背景
- せっかくPHPを学んだので、そのアウトプットがしたい
- 自分の手で何かしらのプラットフォームを作ったら絶対おもしろい

### 構想
- 動画配信プラットフォーム
- YouTube * twitter / 2
- モバイルファースト

### 結果（成果物）
- YouTubeの超超超下位互換の動画投稿プラットフォームがDocker上でできた。
- 最大2Gバイトの動画を投稿できる。
- MOV（iOS）形式の動画はmp4に変換される。
- プレーンなPHP製。
- セッションやクッキーとかがなんとなくわかった。
- 「テストを書く」の意味を作りきってから理解した。
- SQLインジェクション、XSS、CSRF対策を実装できた。

**※注意**<br>
**phpmyadminコンテナが4040ポートで公開されているので、セキュリティーはガバガバです。**


### 将来したいこと
- 機能の追加
  - いいね機能
  - 共有機能
  - コメント機能
  - 配信機能
  - 退会機能
- UI/UX体験の向上
- アップロード中がわかるUI
- 新規登録直後のルーティング？の設計と構築
- テスト概念の導入
- CircleCIとの連携
- AWSにてデプロイ
- etc..

### ギャラリー
- 最初のゲストユーザーのメイン画面<br>
<img src="gallery/firstGuestAccess.png" width="320px" alt="firstGuestUserPage">

- サインアップ<br>
<img src="gallery/signUp.png" width="320px" alt="signUp">

- ログイン<br>
<img src="gallery/signIn.png" width="320px" alt="signIn">

- 最初のログインユーザーのメイン画面<br>
<img src="gallery/firstUserAccess.png" width="320px" alt="firstUserPage">

- 投稿画面<br>
<img src="gallery/postView.png" width="320px" alt="postView">

- 動画の選択<br>
<img src="gallery/selectMovie.png" width="320px" alt="selectMovie">

- 説明文の記述<br>
<img src="gallery/writeBody.png" width="320px" alt="writeBody">

- メイン画面（動画の再生、削除ができる）<br>
<img src="gallery/mainView1.png" width="320px" alt="mainView1">

- 他ユーザーは削除できない（削除ボタンが消える）<br>
<img src="gallery/mainView2.png" width="320px" alt="mainView2">

### 制作期間
#### 全工数
- 約1か月

#### 構想
- 2020 3/30 ~ 3/31

#### コーディング
- 2020 4/1 ~ 5/1

### 進捗
#### 2020 4/9
- 動画の投稿＆削除ができるようになった

#### 2020 4/20
- CSRF対策
- HTMLファイルのテンプレート化
- ログイン機能の実装
  - 投稿ユーザーの登録機能
  - 投稿したユーザーと動画の紐付け
- UIの整備

#### 2020 4/23
- デファクタリング（主にカプセル化）

#### 2020 4/24
- カプセル化完了
- 投稿者の表示
- 再生回数機能の実装
- UIの整備

#### 2020 5/1
- タイトル、説明欄にデフォルト値を設定
- 開発停止

#### Next
- railsで作り直す（かも）

