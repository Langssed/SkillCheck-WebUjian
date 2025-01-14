<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        function showDetailLogin() {
            document.getElementById('form-detail-profil').style.display = 'none';
            document.getElementById('form-detail-login').style.display = 'block';
        }

        function showDetailProfil() {
            document.getElementById('form-detail-login').style.display = 'none';
            document.getElementById('form-detail-profil').style.display = 'block';
        }

        function validateForm(event) {
            const name = document.getElementById('name').value.trim();
            const school = document.getElementById('school').value.trim();
            const phone = document.getElementById('phone').value.trim();
            const email = document.getElementById('email').value.trim();
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirm_password').value;

            if (!name || !school || !phone || !email || !password || password !== confirmPassword) {
                event.preventDefault();
                alert('Semua input harus diisi dan password harus sesuai!');
                return false;
            }
            return true;
        }
    </script>
</head>
<body>

    @include('components.navbar')
    
    <script>
        function alertLogin() {
            @if (!Auth::check())
                alert('Harap login terlebih dahulu untuk mengakses soal!');
            @else
                window.location.href = '/soal';
            @endif
        }
    </script>   

    <main class="bg-gradient-to-b from-green-100 to-gray-50 py-16">
        <div class="p-8 min-h-screen">
            <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-lg mx-auto">

                <!-- Menampilkan Pesan Sukses atau Error -->
                @if(session('success'))
                    <p class="text-green-500 text-center mb-4">{{ session('success') }}</p>
                @endif

                @if($errors->any())
                    <ul class="text-red-500 mb-4">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif

                <!-- Form Pendaftaran -->
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div id="form-detail-profil">
                        <h2 class="text-2xl font-semibold mb-6">Detail Profil</h2>
                        <!-- Nama -->
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" required
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500">
                        </div>

                        <!-- Nama Sekolah -->
                        <div class="mb-4">
                            <label for="school" class="block text-sm font-medium text-gray-700">Nama Sekolah</label>
                            <input type="text" id="school" name="school" value="{{ old('school') }}" required
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500">
                        </div>

                        <!-- Jenis Kelamin -->
                        <div class="mb-4">
                            <label for="gender" class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                            <select id="gender" name="gender" required
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500">
                                <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                <option value="Laki-laki" {{ old('gender') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="Perempuan" {{ old('gender') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>

                        <!-- Provinsi -->
                        <div class="mb-4">
                            <label for="province" class="block text-sm font-medium text-gray-700">Provinsi</label>
                            <select id="province" name="province" required
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500">
                                <option value="" disabled selected>Pilih Provinsi</option>
                                <option value="Jawa Barat" {{ old('province') == 'Jawa Barat' ? 'selected' : '' }}>Jawa Barat</option>
                                <option value="DKI Jakarta" {{ old('province') == 'DKI Jakarta' ? 'selected' : '' }}>DKI Jakarta</option>
                                <option value="Jawa Timur" {{ old('province') == 'Jawa Timur' ? 'selected' : '' }}>Jawa Timur</option>
                            </select>
                        </div>

                        <!-- Kabupaten / Kota -->
                        <div class="mb-4">
                            <label for="city" class="block text-sm font-medium text-gray-700">Kabupaten / Kota</label>
                            <select id="city" name="city" required
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500">
                                <option value="" disabled selected>Pilih Kabupaten / Kota</option>
                                <option value="Tangerang" {{ old('city') == 'Tangerang' ? 'selected' : '' }}>Tangerang</option>
                                <option value="Jakarta Barat" {{ old('city') == 'Jakarta Barat' ? 'selected' : '' }}>Jakarta Barat</option>
                                <option value="Pekalongan" {{ old('city') == 'Pekalongan' ? 'selected' : '' }}>Pekalongan</option>
                            </select>
                        </div>

                        <!-- Nomor Telepon -->
                        <div class="mb-4">
                            <label for="phone" class="block text-sm font-medium text-gray-700">Nomor Telepon / Hp</label>
                            <input type="text" id="phone" name="phone" value="{{ old('phone') }}" required
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500">
                        </div>

                        <!-- Tombol Next -->
                        <button type="button" onclick="showDetailLogin()" class="w-full bg-green-500 text-white py-2 px-4 rounded-md hover:bg-green-600">
                            Next
                        </button>
                    </div>

                    <div id="form-detail-login" style="display:none;">
                        <h2 class="text-2xl font-semibold mb-6">Detail Login</h2>
                        <!-- Email -->
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" required
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500">
                        </div>

                        <!-- Password -->
                        <div class="mb-4">
                            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                            <input type="password" id="password" name="password" required
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500">
                        </div>

                        <!-- Konfirmasi Password -->
                        <div class="mb-4">
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" required
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500">
                        </div>

                        <!-- Tombol Daftar -->
                        <button type="submit" class="w-full bg-green-500 text-white py-2 px-4 rounded-md hover:bg-green-600">
                            Daftar Sekarang
                        </button>

                        <!-- Button Kembali -->
                        <button type="button" onclick="showDetailProfil()" class="w-full mt-4 bg-gray-500 text-white py-2 px-4 rounded-md hover:bg-gray-600">
                            Kembali
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    @include('components.footer')

</body>
</html>