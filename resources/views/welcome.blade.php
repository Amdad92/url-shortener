<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>URL Shortener</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-900 text-white min-h-screen">

    <!-- Navbar -->
    <nav class="border-b border-gray-800 bg-gray-900/80 backdrop-blur-md">
        <div class="container mx-auto flex h-16 items-center justify-between px-4">
            <a href="#" class="flex items-center gap-2 text-xl font-bold">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="text-blue-400">
                    <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71" />
                    <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71" />
                </svg>
                <span>LinkShort</span>
            </a>
        </div>
    </nav>

    <main class="container mx-auto px-4 py-8 max-w-3xl">
        <!-- Header -->
        <header class="mb-8 text-center">
            <h1 class="mb-3 text-3xl font-bold md:text-4xl lg:text-5xl">
                URL <span class="text-blue-400">Shortener</span>
            </h1>
            <p class="text-gray-300 text-md lg:text-lg">
                Shorten your long URLs into compact links in seconds
            </p>
        </header>

        <!-- Form -->
        <form method="POST" action="{{ route('shorten') }}"
            class="mb-8 rounded-xl border border-gray-700 bg-gray-800 p-6 shadow-sm">
            @csrf
            <div class="flex flex-col space-y-4 sm:flex-row sm:space-y-0 sm:space-x-4">
                <div class="flex-1 relative">
                    <input type="url" name="original_url"
                        class="w-full h-12 px-4 pr-12 rounded-lg border border-gray-600 
                               bg-gray-700 text-white focus:border-blue-400 
                               focus:ring-2 focus:ring-blue-400/20"
                        placeholder="Enter your long URL here..." required>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="absolute right-3 top-3 h-6 w-6 text-gray-500">
                        <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71" />
                        <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71" />
                    </svg>
                </div>
                <button type="submit"
                    class="h-12 px-6 font-medium text-white bg-blue-500 rounded-lg hover:bg-blue-600 
                           transition-colors focus:outline-none focus:ring-2 focus:ring-blue-400 
                           focus:ring-offset-2 shrink-0">
                    Shorten URL
                </button>
            </div>
        </form>

        <!-- Success Message -->
        @if (session('success'))
            <div class="mb-4 p-4 bg-green-900/20 border-l-4 border-green-400 text-green-200">
                {{ session('success') }}
            </div>
        @endif

        @if (session('info'))
            <div class="mb-4 p-4 bg-blue-900/20 border-l-4 border-blue-400 text-blue-200">
                {{ session('info') }}
            </div>
        @endif
    </main>
</body>

</html>
