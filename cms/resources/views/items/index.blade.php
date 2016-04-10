@extends('layouts.default')

@section('title', 'Items')

@section('content')
  @include('layouts.nav')
  <h1>Items</h1>

  <div class="table-responsive">
    <table class="sortable">
      <thead>
        <tr>
          <th>タイトル</th>
          <th class="operation">操作</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($items as $item)
          <tr id="sort_{{ $item->id }}">
            <td>{!! link_to(url('items/posts', $item->id), $item->title) !!}</td>
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
  <script>
  $(function() {
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
