@extends('layouts.default')

@section('title', 'Items')

@section('css')
<link rel="stylesheet" href="/cms/css/colorbox.css">
@endsection

@section('content')
  @include('layouts.nav')
  <h1>Items</h1>

  <div class="table-responsive">
    <table class="sortable">
      <thead>
        <tr>
          <th>タイトル</th>
          <th class="getcode">リスト用</th>
          <th class="getcode">一覧用</th>
          <th class="getcode">個別記事用</th>
          <th class="operation">操作</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($items as $item)
          <tr id="sort_{{ $item->id }}">
            <td>{!! link_to(url('items/posts', $item->id), $item->title) !!}</td>
            <td>
              <input type="text" id="getcode_{{ $item->id }}">
              {!! link_to(url('posts/getcodelist', [$item->id]), '取得', ['data-id' => $item->id, 'class' => 'getcode']) !!}
            </td>
            <td>
              <input type="text" id="getcode_{{ $item->id }}">
              {!! link_to(url('posts/getcodesummary', [$item->id]), '取得', ['data-id' => $item->id, 'class' => 'getcode']) !!}
            </td>
            <td>
              <input type="text" id="getcode_{{ $item->id }}">
              {!! link_to(url('posts/getcodedetail', [$item->id]), '取得', ['data-id' => $item->id, 'class' => 'getcode']) !!}
            </td>
            <td>
              {!! link_to(url('items/edit', $item->id), '編集') !!} ｜
              {!! Form::open(['url' => ['items/destroy', $item->id], 'method' => 'DELETE', 'id' => 'delete_form_' . $item->id]) !!}
                {!! link_to(url('#'), '削除', ['data-id' => $item->id, 'class' => 'delete']) !!}
              {!! Form::close() !!}
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="3">Itemがありません</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
  <script src="/cms/js/jquery.colorbox-min.js"></script>
  <script>
  $(function() {
    $('.getcode').on('click', function() {
      var id = $(this).data('id');
      var num = $('#getcode_' + id).val();
      if (num > 0) {
        var link = $(this).attr('href') + '/' + num;
        $(this).attr('href', link);
        return true;
      }
      return false;
    }).colorbox({iframe:true, width:"80%", height:"80%"});
    $('.delete').on('click', function() {
      var id = $(this).data('id');
      if(confirm('削除しますか？\n(記事も同時に削除されます)')) {
        $('#delete_form_' + id).submit();
      }
      return false;
    });
    $('.sortable tbody').sortable({
      cursor: 'move',
      opacity: .3,
      update: function() {
        $.post('{{ url('items/sortable') }}', {
          sort: $(this).sortable('serialize')
        });
      }
    });
  });
  </script>
@endsection
