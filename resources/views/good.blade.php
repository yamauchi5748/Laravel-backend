@section('title', 'いいね機能デモ｜特設ページ')
<div class="container">
  <div class="row">
  <div class="col-md-10 col-md-offset-1">
  <div class="panel panel-default">
  <div class="panel-heading">TOP</div>
 
  <div class="panel-body">
  Laravel5.2<br>
  いいね機能デモンストレーション<br>
  <form action="/api/v1/user_timecapsule_good/2/timecapsule/2" method="post">
  @csrf
  <input name="_method" type="hidden" value="PUT">
    <p>
    <input type="submit" value="いいね"><input type="reset" value="リセット">
    </p>
  </form>

  <br>

  <form action="/api/v1/user_timecapsule_good/2/timecapsule/2" method="post">
  @csrf
  <input name="_method" type="hidden" value="DELETE">
    <p>
        いいね解除：
    <input type="submit" value="解除"><input type="reset" value="リセット">
    </p>
  </form>