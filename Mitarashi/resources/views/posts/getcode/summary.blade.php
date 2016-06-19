@extends('layouts.default')

@section('title', 'GetCodeSummary')

@section('content')

<p>下記コードを貼り付けてください。</p>

<pre>
&lt;?php echo file_get_contents(&quot;http://&quot; . $_SERVER[&quot;SERVER_NAME&quot;] . &quot;/Mitarashi/posts/summary/{{ $item_id }}/{{ $num }}&quot;); ?&gt;
</pre>

<br>

<p>下記のように表示されます。</p>

<?php echo file_get_contents("http://" . $_SERVER["SERVER_NAME"] . "/Mitarashi/posts/summary/" . $item_id . "/" . $num); ?>


@endsection
