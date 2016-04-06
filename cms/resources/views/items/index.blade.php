@extends('layouts.default')

@section('title', 'Items')

@section('content')
  @include('layouts.nav')
  <h1>Items</h1>

  <div class="table-responsive">
    <table>
      <thead>
        <tr>
          <th>タイトル</th>
          <th class="operation">操作</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($items as $item)
          <tr>
            <td>{!! link_to(url('items/posts', $item->id), $item->title) !!} {{ $item->sort }}</td>
            <td>
              {!! link_to(url('items/edit', $item->id), '編集') !!} ｜
              {!! Form::open(['url' => ['items/destroy', $item->id], 'method' => 'DELETE', 'id' => 'delete_form_' . $item->id]) !!}
                {!! link_to(url('#'), '削除', ['data-id' => $item->id, 'class' => 'delete']) !!}
              {!! Form::close() !!}
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <script>
  $(function() {
    $('.delete').on('click', function() {
      var id = $(this).data('id');
      if(confirm('削除しますか？\n(記事も同時に削除されます)')) {
        $('#delete_form_' + id).submit();
      }
      return false;
    });
  });
  </script>
@endsection
