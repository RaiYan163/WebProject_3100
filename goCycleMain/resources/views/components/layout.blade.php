<!doctype html>

<title>Laravel From Scratch Blog</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<style>

    html{
        scroll-behavior: smooth;
    }
    .clamp{
        display: -webkit-box;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .clamp.one-line{
        -webkit-line-clamp: 1;
    }
</style>

<body style="font-family: Open Sans, sans-serif">
<section class="px-6 py-8">
    <nav class="md:flex md:justify-between md:items-center">
        <div class="flex items-center ml-8">
            <a href="/">
                <img src="/images/GoCycle.png" alt="Laracasts Logo" width="200" height="10">
            </a>
        </div>
        <div class="mt-8 md:mt-0 flex items-center">

            @auth
                <span class="text-xs font-bold uppercase">Welcome, {{ auth()->user()->name }} </span>
                <a href="/" class="ml-6 rounded-full text-xs font-semibold text-white uppercase py-3 px-5 bg-red-700 hover:bg-red-900 transition duration-500" style="font-size: 13px;">Home</a>
{{--                <a href="/" class="ml-6 rounded-full text-xs font-semibold text-white uppercase py-3 px-5 bg-red-700 hover:bg-red-900 transition duration-500" style="font-size: 13px;">UserDash</a>--}}
               @can('admin')
                <a href="/admin/posts/create" class="bg-red-700 ml-6 rounded-full text-xs font-semibold text-white uppercase py-3 px-5 hover:bg-red-900 transition duration-500" style="font-size: 13px;">Create Post</a>
                @endcan

                <form method="POST" action="{{ route('login') }}" class="bg-red-700 ml-6 rounded-full text-xs font-semibold text-white uppercase py-3 px-5 hover:bg-red-900 transition duration-500" style="font-size: 13px;">
                    @csrf

                    <button type="submit" style="font-weight: 600; font-size: 13px;">LOG OUT</button>
                </form>

            @else
                <a href="/" class="bg-red-700 ml-6 rounded-full text-xs font-semibold text-white uppercase py-3 px-5 hover:bg-red-900 transition duration-500" style="font-size: 13px;">Home</a>
                <a href="/register" class="bg-red-700 ml-6 rounded-full text-xs font-semibold text-white uppercase py-3 px-5 hover:bg-red-900 transition duration-500" style="font-size: 13px;">Register</a>
                <a href="/login" class="bg-red-700 ml-6 rounded-full text-xs font-semibold text-white uppercase py-3 px-5 hover:bg-red-900 transition duration-500" style="font-size: 13px;">Login</a>

            @endauth
                <a href="#newsletter" class="bg-red-700 ml-6 rounded-full text-xs font-semibold text-white uppercase py-3 px-5 hover:bg-red-900 transition duration-500" style="font-size: 13px;">Subscribe for Updates</a>

        </div>
    </nav>

           {{ $slot  }}

    <footer id="newsletter" class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
        <img src="/images/newsletter.png" alt="" class="mx-auto -mb-6" style="width: 160px;">
        <h5 class="text-3xl">Stay in touch with the latest posts of Cycling</h5>
        <p class="text-sm mt-3">Promise to keep the inbox clean. No bugs.</p>

        <div class="mt-10">
            <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">

                <form method="POST" action="/newsletter" class="lg:flex text-sm">
                    @csrf
                    <div class="lg:py-3 lg:px-5 flex items-center">
                        <label for="email" class="hidden lg:inline-block">
                            <img src="/images/mailbox-icon.svg" alt="mailbox letter">
                        </label>

                        <div>

                            <input
                                id="email"
                                name="email"
                                type="text"
                                placeholder="Your email address"
                                class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">

                            @error('body')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>

                    <button type="submit" class="transition-colors duration-300 bg-red-700 hover:bg-red-900 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8">Subscribe</button>

                </form>
            </div>
        </div>
    </footer>
</section>
<x-flash/>
</body>
