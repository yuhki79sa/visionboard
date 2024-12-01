<x-app-layout>
       <header>
         <table>
                <tr>
                       <th>やりたいことリスト</th>
                </tr>
                 @foreach($NotAchieveTodos as $NotAchieveTodo)
                <tr>
                     <th> {{$NotAchieveTodo->todo}}</th>
                </tr>
         </table>
       </header>
   </x-app-layout>