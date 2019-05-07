@section('title', 'フォロー機能デモ｜特設ページ')
<div class="container">
  <div class="row">
  <div class="col-md-10 col-md-offset-1">
  <div class="panel panel-default">
  <div class="panel-heading">follow</div>
 
  <div class="panel-body">
  Laravel5.2<br>
  フォロー機能デモンストレーション<br>
  <form action="/api/v1/user/2/user_follows/3" method="post">
  @csrf
    <p>
        ユーザーフォロー：
    <input type="submit" value="フォロー"><input type="reset" value="リセット">
    </p>
  </form>

  <br>

  <form action="/api/v1/user/2/user_follows" method="get">
  @csrf
    <p>
        フォロー申請状況取得：
    <input type="submit" value="取得"><input type="reset" value="リセット">
    </p>
  </form>

  <form action="/api/v1/user/2/user_follows/3" method="post">
  @csrf
  <input name="_method" type="hidden" value="DELETE">
    <p>
        フォロー申請拒否：
    <input type="submit" value="拒否"><input type="reset" value="リセット">
    </p>
  </form>