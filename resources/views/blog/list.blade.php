@extends('blog.layout')
@section('title','ブログ一覧')
@section('content')
<div class="row">
  <div class="col-md-10 col-md-offset-2">
      <h2>ブログ記事一覧</h2>
      @if (session('err_msg'))
          <p class="text_tanger">
          {{  session('err_msg')  }}
          </p>
      @endif
      <table class="table table-striped">
          <tr>
              <th>記事番号</th>
              <th>タイトル</th>
              <th>日付</th>
              <th>編集</th>
              <th>削除</th>
          </tr>
          @foreach($blogs as $blog)
          <tr>
              <td>{{$blog->id}}</td>
              <td><a href="/blog/{{ $blog->id }}">{{ $blog->title  }}</a></td>
              <td>{{$blog->updated_at}}</td>
              <td><button type="button" class="button-primary" onclick="location.href='/blog/edit/{{ $blog->id }}'">編集</button></td>
              <form method="POST" action="{{ route('delete',$blog->id) }}" onSubmit="return checkDelete()">
              <input type="hidden" name="id" value="{{  $blog->id  }}">
              @csrf
              <td><button type="submit" class="button-primary" onclick=>削除</button></td>
              </form>
          </tr>
          @endforeach
      </table>
  </div>
</div>
<script>
function checkDelete(){
if(window.confirm('削除してよろしいですか？')){
    return true;
} else {
    return false;
}
}
</script>
@endsection
