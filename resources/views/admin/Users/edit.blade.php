<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
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

    <!-- Content -->
    <div class="flex-1 p-8">
        <!-- Header -->
        <div class="bg-gradient-to-r from-blue-500 to-green-500 text-white shadow-md rounded-lg p-6 mb-6">
            <h1 class="text-3xl font-bold">Edit User</h1>
            <p class="mt-2 text-sm font-light">Perbarui informasi pengguna</p>
        </div>

        <!-- Form Edit -->
        <div class="bg-white shadow-lg rounded-lg p-6">
            <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-semibold mb-2">Nama</label>
                    <input type="text" id="name" name="name" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-200"
                           placeholder="Masukkan nama lengkap" value="{{ $user->name }}" required>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-semibold mb-2">Email</label>
                    <input type="email" id="email" name="email" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-200"
                           placeholder="Masukkan alamat email" value="{{ $user->email }}" required>
                </div>
                <div class="mb-4">
                    <label for="school" class="block text-gray-700 font-semibold mb-2">Sekolah</label>
                    <input type="text" id="school" name="school" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-200"
                           placeholder="Masukkan nama sekolah" value="{{ $user->school }}" required>
                </div>
                <div class="mb-4">
                    <label for="province" class="block text-gray-700 font-semibold mb-2">Provinsi</label>
                    <input type="text" id="province" name="province" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-200"
                           placeholder="Masukkan nama provinsi" value="{{ $user->province }}" required>
                </div>
                <div class="mb-4">
                    <label for="city" class="block text-gray-700 font-semibold mb-2">Kota</label>
                    <input type="text" id="city" name="city" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-200"
                           placeholder="Masukkan nama kota" value="{{ $user->city }}" required>
                </div>
            
                <div class="flex justify-end gap-4">
                    <a href="{{ url('/admin/users') }}" 
                       class="bg-gray-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-gray-600 transition">
                        Batal
                    </a>
                    <button type="submit" 
                            class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-600 transition">
                        Simpan Perubahan
                    </button>
                </div>
            </form>            
        </div>

    </div>
</body>
</html>