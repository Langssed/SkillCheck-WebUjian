<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Soal</title>
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
        <div class="bg-gradient-to-r from-yellow-500 to-green-500 text-white shadow-md rounded-lg p-6 mb-6">
            <h1 class="text-3xl font-bold">Edit Soal</h1>
            <p class="mt-2 text-sm font-light">Masukkan informasi soal yang akan diperbarui</p>
        </div>

        <!-- Form Edit -->
        <div class="bg-white shadow-lg rounded-lg p-6">
            <form action="{{ route('admin.soal.update', $soal->id) }}" method="POST">
                @csrf

                <!-- Mata Pelajaran (Non-editable) -->
                <div class="mb-4">
                    <label for="mapel_id" class="block text-gray-700 font-semibold mb-2">Mata Pelajaran</label>
                    <input type="text" id="mapel_id" name="mapel_id" 
                           value="{{ $soal->mapel->nama_mapel }}" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-200 cursor-not-allowed" 
                           readonly>
                </div>

                <!-- Input Pertanyaan -->
                <div class="mb-4">
                    <label for="question" class="block text-gray-700 font-semibold mb-2">Pertanyaan</label>
                    <textarea id="question" name="question" 
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-yellow-200"
                              placeholder="Masukkan pertanyaan" rows="4" required>{{ $soal->question }}</textarea>
                </div>

                <!-- Input Pilihan Jawaban -->
                <div class="mb-4">
                    <label for="options" class="block text-gray-700 font-semibold mb-2">Pilihan Jawaban</label>
                    @foreach (json_decode($soal->options) as $index => $option)
                        <input type="text" 
                            id="options_{{ $index }}" 
                            name="options[]" 
                            value="{{ $option }}" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg @if($index > 0) mt-2 @endif focus:outline-none focus:ring focus:ring-yellow-200"
                            placeholder="Pilihan {{ $index + 1 }}" required>
                    @endforeach
                </div>

                <!-- Input Jawaban Benar -->
                <div class="mb-4">
                    <label for="correct_answer" class="block text-gray-700 font-semibold mb-2">Jawaban Benar</label>
                    <select id="correct_answer" name="correct_answer" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-yellow-200"
                            required>
                        <option value="">Pilih Jawaban Benar</option>
                        <option value="1" {{ $soal->correct_answer == 0 ? 'selected' : '' }}>Pilihan 1</option>
                        <option value="2" {{ $soal->correct_answer == 1 ? 'selected' : '' }}>Pilihan 2</option>
                        <option value="3" {{ $soal->correct_answer == 2 ? 'selected' : '' }}>Pilihan 3</option>
                        <option value="4" {{ $soal->correct_answer == 3 ? 'selected' : '' }}>Pilihan 4</option>
                    </select>
                </div>

                <!-- Tombol Simpan -->
                <div class="flex justify-end gap-4">
                    <a href="{{ url('/admin/soal') }}" 
                       class="bg-gray-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-gray-600 transition">
                        Batal
                    </a>
                    <button type="submit" 
                            class="bg-yellow-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-yellow-600 transition">
                        Simpan
                    </button>
                </div>
            </form>
        </div>

    </div>
</body>
</html>