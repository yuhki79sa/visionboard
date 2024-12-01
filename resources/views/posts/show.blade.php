<x-app-layout>
    
    {{$action->todo}}
    
<ul>
  @forelse ($action->comments as $comment)
  <li>{{ $comment->body }}</li>
  <li><a href='{{ $comment->URL }}'>{{ $comment->URL }}</a></li>
  @empty
  <li>No comment yet</li>
  @endforelse
</ul>

//コメント追加フォーム

<h2>Add New Comment</h2>
<form method="post" action="/actions/{{$action->id}}/comments">
  {{ csrf_field() }}
  <p>
    <input type="text" name="body" placeholder="body" value="{{ old('body') }}">
    @if ($errors->has('body'))
    <span class="error">{{ $errors->first('body') }}</span>
    @endif
  </p>
   <input type="text" name="URL" placeholder="URL" value="{{ old('URL') }}">
  <p>
    <input type="submit" value="コメントする">
  </p>
</form>
    
</x-app-layout>