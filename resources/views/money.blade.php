@section('title', 'サービス内通貨機能デモ｜特設ページ')
<div class="container">
  <div class="row">
  <div class="col-md-10 col-md-offset-1">
  <div class="panel panel-default">
  <div class="panel-heading">TOP</div>
 
  <div class="panel-body">
  Laravel5.2<br>
  サービス内通貨機能デモンストレーション<br>
  <form action="/api/v1/timecapsule/5/user_moneys/14" method="post">
  @csrf
  <input name="_method" type="hidden" value="PUT">
    <p>
    <input type="submit" value="通貨更新"><input type="reset" value="リセット">
    </p>
  </form>

  <br>

  <form action="/api/v1/user_moneys/13" method="get">
  @csrf
        サービス内通貨を取得：
    <input type="submit" value="取得"><input type="reset" value="リセット">
    </p>
  </form>