<x-app-layout>
           <form action="/actions" method="POST">
               @csrf
               <p>やりたいことリストに追加する</p>
              <input type="text" name="actions[todo]" placeholder="世界一周" required>
                <input type="submit" value="実行"/>
              </form>
               <p>やりたいことリスト</p>
         <table>
                 @foreach($NotAchieveTodos as $NotAchieveTodo)
                <tr>
                     <th> {{$NotAchieveTodo->todo}}</th>
                     <th>
                             <form action="/actions/{{$NotAchieveTodo->id}}/done" method="POST">
                                   @csrf
                                   @method('PUT')
                                    <input type="submit" value="達成" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"/>
                             </form>
                     </th>
                </tr>
                @endforeach
         </table>
   </x-app-layout>