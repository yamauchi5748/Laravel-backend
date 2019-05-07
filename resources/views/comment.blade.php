@section('title', 'コメント機能デモ｜特設ページ')
<div class="container">
  <div class="row">
  <div class="col-md-10 col-md-offset-1">
  <div class="panel panel-default">
  <div class="panel-heading">TOP</div>
 
  <div class="panel-body">
  Laravel5.2<br>
  コメント機能デモンストレーション<br>
  <form action="/api/v1/timecapsule/1/comment/2" method="post">
  @csrf
    <p>
    <input type="num" name="target_user_id" value="3">
    </p>
    <p>
    <input type="text" name="text" value="コメント">
    </p>
    <p>
    <input type="submit" value="コメント"><input type="reset" value="リセット">
    </p>
  </form>

  <br>

  <form action="/api/v1/comment/1" method="post">
  @csrf
  <input name="_method" type="hidden" value="DELETE">
    <p>
    <input type="num" name="target_user_id" value="3">
    </p>
    <p>
        コメント削除：
    <input type="submit" value="削除"><input type="reset" value="リセット">
    </p>
  </form>

  <form action="/api/v1/timecapsule/1/comment" method="get">
  @csrf
    <p>
        コメント取得：
    <input type="submit" value="取得"><input type="reset" value="リセット">
    </p>
  </form>