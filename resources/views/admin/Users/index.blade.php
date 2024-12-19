<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Manajemen Pengguna</title>
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
            <h1 class="text-3xl font-bold">Daftar User</h1>
            <p class="mt-2 text-sm font-light">Kelola data user dengan mudah</p>
        </div>

        <!-- Tabel -->
        <div class="bg-white shadow-lg rounded-lg p-6">
            <!-- Tombol Tambah -->
            <div class="mb-4">
                <!-- Tidak ada tombol tambah untuk pengguna -->
            </div>

            <table class="table-auto w-full border-collapse">
                <thead>
                    <tr class="bg-gray-200 text-gray-700 text-sm uppercase tracking-wide">
                        <th class="border-b border-gray-300 px-6 py-3 text-left">ID</th>
                        <th class="border-b border-gray-300 px-6 py-3 text-left">Nama</th>
                        <th class="border-b border-gray-300 px-6 py-3 text-left">Email</th>
                        <th class="border-b border-gray-300 px-6 py-3 text-left">Sekolah</th>
                        <th class="border-b border-gray-300 px-6 py-3 text-left">Provinsi</th>
                        <th class="border-b border-gray-300 px-6 py-3 text-left">Kota</th>
                        <th class="border-b border-gray-300 px-6 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($users as $user)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 text-gray-700">{{ $user->id }}</td>
                            <td class="px-6 py-4 text-gray-700">{{ $user->name }}</td>
                            <td class="px-6 py-4 text-gray-700">{{ $user->email }}</td>
                            <td class="px-6 py-4 text-gray-700">{{ $user->school }}</td>
                            <td class="px-6 py-4 text-gray-700">{{ $user->province }}</td>
                            <td class="px-6 py-4 text-gray-700">{{ $user->city }}</td>
                            <td class="px-6 py-4 text-center">
                                <a href="{{ url('/admin/users/edit/' . $user->id) }}" 
                                class="inline-block bg-blue-500 text-white px-4 py-2 text-sm font-semibold rounded-lg shadow-md hover:bg-blue-600 transition">
                                    Edit
                                </a>
                                <form action="{{ url('/admin/users/delete/' . $user->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    <button type="submit" 
                                            class="bg-red-500 text-white px-4 py-2 text-sm font-semibold rounded-lg shadow-md hover:bg-red-600 transition">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</body>
</html>