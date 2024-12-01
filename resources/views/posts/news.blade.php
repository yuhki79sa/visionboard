<x-app-layout>
    <header>
        
        <div>
          <form action="{{ route('news') }}" method="GET">
              @csrf
            <input type="text" name="keyword" value="{{ $keyword }}">
            <input type="submit" value="検索">
          </form>
        </div>
        
        <div>
            <div>
                @foreach ($actions as $number=>$action)
                <div class="border-top border border-black w-screen">
                    <div class="w-4/5 mx-auto flex">
                           <div class="w-1/2">
                        <div>
                            {{$number+1}}.
                            {{ $action->todo }}
                        </div>
                        <div>
                            <a href="/action/{{$action->id}}">詳細</a>
                             <a href="/action/{{$action->id}}/choice/create">評価する</a>
                            
                            {{-- いいね機能の実装 --}}
                            @auth
                                {{-- 前章のPostモデルで作成したメソッドを利用し、自身がこの記事にいいねしたのか判定します --}}
                                @if($action->isLikedByAuthUser())
                                    <div class="flexbox">
                                        <i class="fa-regular fa-thumbs-up like-btn liked" id="{{ $action->id }}"></i>
                                        <p class="count-num">{{ $action->likes->count() }}</p>
                                    </div>
                                @else
                                    <div class="flexbox">
                                        <i class="fa-regular fa-thumbs-up like-btn" id="{{ $action->id }}"></i>
                                        <p class="count-num">{{ $action->likes->count() }}</p>
                                    </div>
                                @endif
                            @endauth

                            @guest
                                <p>loginしていません</p>
                            @endguest
                        </div>
                    </div>
                    <div class="w-1/2">
                        @if($action->choices()->where('action_id',$action->id)->count()==0)
                        <div>やってみたい0%</div>
                        @else
                         <div>やってみたい{{$action->choices()->where('action_id',$action->id)->where('choiceCategory_id',1)->count()/$action->choices()->where('action_id',$action->id)->count()*100}}%</div>
                        @endif
                        
                        
                         @if($action->choices()->where('action_id',$action->id)->count()==0)
                        <div>やりたくない0%</div>
                        @else
                         <div>やりたくない{{$action->choices()->where('action_id',$action->id)->where('choiceCategory_id',2)->count()/$action->choices()->where('action_id',$action->id)->count()*100}}%</div>
                        @endif
                        
                        
                         @if($action->choices()->where('action_id',$action->id)->count()==0)
                        <div>やった0%</div>
                        @else
                         <div>やった{{$action->choices()->where('action_id',$action->id)->where('choiceCategory_id',3)->count()/$action->choices()->where('action_id',$action->id)->count()*100}}%</div>
                        @endif
                        
                        
                         @if($action->choices()->where('action_id',$action->id)->count()==0)
                        <div>特になし0%</div>
                        @else
                         <div>特になし{{$action->choices()->where('action_id',$action->id)->where('choiceCategory_id',4)->count()/$action->choices()->where('action_id',$action->id)->count()*100}}%</div>
                        @endif
                    </div>
                    </div>
                  
                
                   
                   
                          
                @endforeach
            </div>
        </div>
         <div class='paginate ml-10'>
            {{ $actions->appends(request()->query())->links() }}
        </div>
    </header>
</x-app-layout>
