{!! Form::label(null, 'タイトル') !!}
{!! Form::text('title', null) !!}
<br><br>
{!! Form::label(null, 'リスト表示のタイプ') !!}
<label>{!! Form::radio('list_type', '0', $checked) !!} 日付なし</label>
<label>{!! Form::radio('list_type', '1') !!} 日付あり</label>
<label>{!! Form::radio('list_type', '2') !!} 日付改行</label>
<br>
{!! Form::label(null, '一覧表示のタイプ') !!}
<label>{!! Form::radio('summary_type', '0', $checked) !!} 日付なし</label>
<label>{!! Form::radio('summary_type', '1') !!} 日付あり</label>
<label>{!! Form::radio('summary_type', '2') !!} 日付改行</label>
<br>
{!! Form::label(null, '記事ページのURL') !!}
{!! Form::text('url', null) !!}
<br><br>
{!! Form::submit($submitButton, ['data-role' => 'button']) !!}
