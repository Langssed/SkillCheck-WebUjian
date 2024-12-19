<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mata Pelajaran</title>
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
        <div class="bg-gradient-to-r from-green-500 to-blue-500 text-white shadow-md rounded-lg p-6 mb-6">
            <h1 class="text-3xl font-bold">Tambah Mata Pelajaran</h1>
            <p class="mt-2 text-sm font-light">Masukkan informasi mata pelajaran baru</p>
        </div>

        <!-- Form Tambah -->
        <div class="bg-white shadow-lg rounded-lg p-6">
            <form action="{{ route('admin.mapel.store') }}" method="POST">
                @csrf

                <!-- Input Nama Mata Pelajaran -->
                <div class="mb-4">
                    <label for="nama_mapel" class="block text-gray-700 font-semibold mb-2">Nama Mata Pelajaran</label>
                    <input type="text" id="nama_mapel" name="nama_mapel" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-green-200"
                           placeholder="Masukkan nama mata pelajaran" required>
                </div>

                <!-- Tombol Simpan -->
                <div class="flex justify-end gap-4">
                    <a href="{{ url('/admin/mapel') }}" 
                       class="bg-gray-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-gray-600 transition">
                        Batal
                    </a>
                    <button type="submit" 
                            class="bg-green-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-green-600 transition">
                        Simpan
                    </button>
                </div>
            </form>
        </div>

    </div>
</body>
</html>