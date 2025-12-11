<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Perisai</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-900 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md">
        <div class="bg-gray-800 rounded-lg shadow-lg p-8">
            <h1 class="text-3xl font-bold text-yellow-400 mb-6 text-center">Perisai Login</h1>
            
            @if ($errors->any())
                <div class="bg-red-500/10 border border-red-500 text-red-500 px-4 py-3 rounded mb-4">
                    <ul class="list-disc list-inside text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('success'))
                <div class="bg-green-500/10 border border-green-500 text-green-500 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif
            
            <form action="{{ route('login') }}" method="POST" class="space-y-4">
                @csrf
                
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-300 mb-2">Email</label>
                    <input 
                        type="email" 
                        id="email"
                        name="email" 
                        value="{{ old('email') }}"
                        placeholder="Enter your email"
                        class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded text-white placeholder-gray-400 focus:outline-none focus:border-yellow-400"
                        required>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-300 mb-2">Password</label>
                    <input 
                        type="password" 
                        id="password"
                        name="password" 
                        placeholder="Enter your password"
                        class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded text-white placeholder-gray-400 focus:outline-none focus:border-yellow-400"
                        required>
                </div>

                <div class="flex items-center">
                    <input 
                        type="checkbox" 
                        id="remember" 
                        name="remember"
                        class="w-4 h-4 text-yellow-400 bg-gray-700 border-gray-600 rounded focus:ring-yellow-400">
                    <label for="remember" class="ml-2 text-sm text-gray-300">Remember me</label>
                </div>

                <button 
                    type="submit" 
                    class="w-full bg-yellow-400 text-gray-900 font-semibold py-2 rounded hover:bg-yellow-500 transition duration-300">
                    Login
                </button>
            </form>

            <p class="text-center text-gray-400 text-sm mt-6">
                Admin access only
            </p>
        </div>
    </div>
</body>
</html>