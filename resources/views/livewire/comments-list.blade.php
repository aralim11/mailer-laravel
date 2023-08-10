<div class="grid max-w-lg">
    <form wire:submit.prevent='addComment'>
        @error('newComment')<p class="text-red-500 text-xs pb-1">{{ $message }}</p>@enderror
        <input type="text" placeholder="What's in your mind"
                class="p-2 w-96 h-10 border rounded-md text-lg shadow-sm focus:outline-none focus:border-sky-500 ring-1 focus:ring-sky-500" wire:model.defer='newComment'>

        <button type="submit" class="py-1 h-10 w-28 border border-sky-500 rounded-md text-lg hover:bg-sky-200 shadow">Submit</button>
    </form>

    @foreach ($comments as $comment)
        <div class="mt-3 p-2 border rounded-md outline-none border-gray-300 shadow-md bg-white">
            <div>
                <div class="flex">
                    <h1 class="text-lg font-semibold">{{ $comment->name }}</h1>
                    <p class="pl-3 text-xs mt-2 text-gray-500">{{ $comment->created_at }}</p>
                </div>

                <p class="text-md">{{ $comment->body }}</p>
            </div>
        </div>
    @endforeach
</div>