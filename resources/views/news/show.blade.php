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
</x-app-layout>