<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex min-h-screen">
    <!-- Sidebar -->
    <div class="bg-white shadow-lg w-1/4 min-h-screen p-8">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Admin Dashboard</h1>
            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit" 
                        class="text-white text-sm px-4 py-2 rounded-full border border-red-500 bg-red-500 hover:bg-red-600 hover:border-red-600 transition-all duration-300 ease-in-out transform hover:scale-105">
                    Keluar
                </button>
            </form>
        </div>
        <div class="flex flex-col gap-4">
            <a href="/admin/users" 
            class="block text-center bg-blue-500 text-white font-semibold py-3 rounded-lg hover:bg-blue-600 transition">
                User
            </a>
            <a href="/admin/mapel" 
            class="block text-center bg-green-500 text-white font-semibold py-3 rounded-lg hover:bg-green-600 transition">
                Mapel
            </a>
            <a href="/admin/soal" 
            class="block text-center bg-yellow-500 text-white font-semibold py-3 rounded-lg hover:bg-yellow-600 transition">
                Soal
            </a>
        </div>
    </div>

    <!-- Content Area -->
    <div class="flex-1 p-8">
        <h2 class="text-xl font-semibold text-gray-800">Selamat datang di Admin Dashboard</h2>
        <p class="text-gray-600 mt-2">
            Pilih salah satu menu di sebelah kiri untuk mulai mengelola data.
        </p>
    </div>
</body>
</html>