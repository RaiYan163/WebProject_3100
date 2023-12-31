@auth
    <x-panel>
        <form method="POST" action="/posts/{{ $post->slug }}/comments">
            @csrf
            <header class="flex items-center">
                <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}" alt="" width="60" height="60" class="rounded-full">
                <h2 class="ml-4">Comment Now!</h2>
            </header>

            <div class="mt-6">
                       <textarea name="body"
                                 class="w-full focus:outline-none focus:ring"
                                 rows="5"
                                 placeholder="Share your thoughts about the post.."
                                 required></textarea>

                @error('body')
                <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-end mt-6 pt-6 border-gray-200">

                    <x-form.button>POST</x-form.button>

            </div>



        </form>
    </x-panel>
@else
    <p class="text-xs, text-red-500">
        <a href="/register" class="hover:underline">Register</a> or <a href="/login" class="hover:underline">log in</a> to comment.
    </p>
@endauth
