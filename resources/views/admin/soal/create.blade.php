<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Soal</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex min-h-screen">

    @include('components.sidebar')

    <!-- Content -->
    <div class="flex-1 p-8">
        <!-- Header -->
        <div class="bg-gradient-to-r from-yellow-500 to-green-500 text-white shadow-md rounded-lg p-6 mb-6">
            <h1 class="text-3xl font-bold">Tambah Soal</h1>
            <p class="mt-2 text-sm font-light">Masukkan informasi soal baru</p>
        </div>

        <!-- Form Tambah -->
        <div class="bg-white shadow-lg rounded-lg p-6">
            <form action="{{ route('admin.soal.store') }}" method="POST">
                @csrf

                <!-- Pilih Mata Pelajaran -->
                <div class="mb-4">
                    <label for="mapel_id" class="block text-gray-700 font-semibold mb-2">Mata Pelajaran</label>
                    <select id="mapel_id" name="mapel_id" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-yellow-200"
                            required>
                        <option value="">Pilih Mata Pelajaran</option>
                        @foreach ($mapel as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_mapel }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Input Pertanyaan -->
                <div class="mb-4">
                    <label for="question" class="block text-gray-700 font-semibold mb-2">Pertanyaan</label>
                    <textarea id="question" name="question" 
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-yellow-200"
                              placeholder="Masukkan pertanyaan" rows="4" required></textarea>
                </div>

                <!-- Input Pilihan Jawaban -->
                <div class="mb-4">
                    <label for="options" class="block text-gray-700 font-semibold mb-2">Pilihan Jawaban</label>
                    <input type="text" id="options[]" name="options[]" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-yellow-200"
                           placeholder="Pilihan 1" required>
                    <input type="text" id="options[]" name="options[]" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg mt-2 focus:outline-none focus:ring focus:ring-yellow-200"
                           placeholder="Pilihan 2" required>
                    <input type="text" id="options[]" name="options[]" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg mt-2 focus:outline-none focus:ring focus:ring-yellow-200"
                           placeholder="Pilihan 3" required>
                    <input type="text" id="options[]" name="options[]" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg mt-2 focus:outline-none focus:ring focus:ring-yellow-200"
                           placeholder="Pilihan 4" required>
                </div>

                <!-- Input Jawaban Benar -->
                <div class="mb-4">
                    <label for="correct_answer" class="block text-gray-700 font-semibold mb-2">Jawaban Benar</label>
                    <select id="correct_answer" name="correct_answer" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-yellow-200"
                            required>
                        <option value="">Pilih Jawaban Benar</option>
                        <option value="1">Pilihan 1</option>
                        <option value="2">Pilihan 2</option>
                        <option value="3">Pilihan 3</option>
                        <option value="4">Pilihan 4</option>
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