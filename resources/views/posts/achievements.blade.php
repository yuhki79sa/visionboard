<x-app-layout>
    <p>達成リスト</p>
   <table>
       @foreach($achieveTodos as $achieveTodo)
       <tr>
           <th>{{$achieveTodo->todo}}</th>
           <th><a href="/achievements/{{$achieveTodo->id}}">感想</a></th>
       </tr>
       @endforeach
   </table>
</x-app-layout>