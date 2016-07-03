@extends('layouts.default')

@section('title', 'GetCodeDetail')

@section('content')

<p>下記コードを<span class="red bold">ファイルの一番最初</span>に貼り付けてください。</p>

<pre>
&lt;?php
  $id = $_GET["id"] + 0;
  $data = file_get_contents("http://" . $_SERVER["SERVER_NAME"] . "/Mitarashi/posts/detail/" . $id);
  $data = json_decode($data, true);
  $data = $data[0];
  if (empty($data["title"])) {
    $data["title"] = "記事がみつかりませんでした。";
    $data["published_at"] = "";
    $data["body"] = "";
  } else {
    $data['published_at'] = date('Y年m月d日', strtotime($data["published_at"]));
  }
?&gt;
</pre>

<p>下記コードを<span class="red bold">タイトルを表示したい場所</span>に貼り付けてください。</p>

<pre>
&lt;?php echo $data["title"]; ?&gt;
</pre>

p>下記コードを<span class="red bold">登校日を表示したい場所</span>に貼り付けてください。</p>

<pre>
  &lt;?php echo $data["published_at"]; ?&gt;
</pre>

<p>下記コードを<span class="red bold">本文を表示したい場所</span>に貼り付けてください。</p>

<pre>
&lt;?php echo $data["body"]; ?&gt;
</pre>

@endsection
