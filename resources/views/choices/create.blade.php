<x-app-layout>
    <div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-4">選択フォーム</h2>
        
        <form action="{{ route('choice.store') }}" method="POST">
            @csrf
            @method('PUT')
            
            <!-- actionのtodoを表示 -->
            <div class="mb-4">
                <label class="block text-gray-700">アクション</label>
                <p class="text-lg font-semibold text-gray-900">{{ $action->todo }}</p>
            </div>
            
            <!-- hiddenフィールドで受け渡し -->
            <input type="hidden" name="choice[user_id]" value="{{ Auth::id() }}">
            <input type="hidden" name="choice[action_id]" value="{{ $action->id }}">
            
            <!-- choiceCategory_idの選択肢 -->
            <div class="mb-4">
                <label for="choiceCategory" class="block text-gray-700">カテゴリーを選択</label>
               <select id="choiceCategory" name="choice[choiceCategory_id]" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="" disabled {{ is_null($selectedCategory) ? 'selected' : '' }}>選択してください</option>
                    @foreach ($choiceCategories as $category)
                        <option value="{{ $category->id }}" {{ $selectedCategory == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- 送信ボタン -->
            <div class="mt-6">
                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    送信
                </button>
            </div>
        </form>
    </div>
</x-app-layout>