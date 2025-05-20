<x-app-layout>



    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <x-app.navbar />
        <div class="container-fluid py-4 px-5">
            <div class="row">
                <div class="col-12"></div>
  <title>Tambah Meeting</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <x-app.navbar />
  <x-app.sidebar />
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

  <div class="bg-white p-8 rounded-xl shadow-md w-full max-w-md text-center">
    <h2 class="text-2xl font-bold mb-4">Buat Ruang Meeting</h2>
    <input type="text" id="roomInput"
           class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
           placeholder="Contoh: RapatTimA" />
    <button onclick="goToMeeting()"
            class="mt-4 w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition">
      Mulai Meeting
    </button>
  </div>

  <script>
    function goToMeeting() {
      const roomName = document.getElementById('roomInput').value.trim();
      if (roomName) {
        const encodedRoom = encodeURIComponent(roomName);
        window.location.href = `/meeting?room=${encodedRoom}`;
      } else {
        alert("Silakan isi nama meeting terlebih dahulu!");
      }
    }
  </script>
 <x-app.footer />
</x-app-layout>