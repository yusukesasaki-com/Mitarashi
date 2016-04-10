@extends('layouts.default')

@section('title', 'Posts')

@section('content')
 @include('layouts.nav')
  <h1>{{ $item->title }} <small>{!! link_to(url('posts/create', $item->id), ' + ') !!}</small></h1>

  <div class="table-responsive">
    <table>
      <thead>
        <tr>
          <th>タイトル</th>
          <th class="state">状態</th>
          <th class="operation">操作</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($posts as $post)
          <tr>
            <td>{!! link_to(url('posts/edit', $post->id), $post->title) !!}</td>
            <td>{{ $post->state == 0 ? '下書' : '公開' }}</td>
            <td>
              {!! link_to(url('posts/edit', $post->id), '編集') !!} ｜
              {!! Form::open(['url' => ['posts/destroy', $post->id], 'method' => 'DELETE', 'id' => 'delete_form_' . $post->id]) !!}
                {!! link_to(url('#'), '削除', ['data-id' => $post->id, 'class' => 'delete']) !!}
              {!! Form::close() !!}
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="3">記事がありません</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
  <script>
  $(function() {
    $('.delete').on('click', function() {
      var id = $(this).data('id');
      if(confirm('削除しますか？')) {
        $('#delete_form_' + id).submit();
      }
      return false;
    });
  });
  </script>
@endsection
