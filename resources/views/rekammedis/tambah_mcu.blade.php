<x-app-layout>
  {{-- @section('contents') --}}
  <div class="flex-auto bg-indigo-50 py-6 px-10">
    <div class="block rounded-md bg-white p-8">
      <div class="flex flex-nowrap gap-3">
        <div>
          <div class="h-48 w-48 bg-gray-200">

          </div>
        </div>
        <div class="leading-loose">
          <p class="text-2xl font-bold">{{ $penghuni->nama }}</p>
          <p>Kode Ruang : {{ $penghuni->ruang }}</p>
        </div>
      </div>
    </div>
    <div class="mt-8 block rounded-md bg-white p-8">
      <form action="{{ route('rekmed.simpan') }}" method="post">
        @csrf
        <input type="hidden" name="id_penghuni" value={{ $penghuni->id }}>
        <input type="hidden" name="id_pegawai" value={{ Session::get('auth_wlha.0.id') }}>


        <div class="grid grid-cols-2 gap-4 text-lg">
          @include('rekammedis.input1', ['key' => 'berat_badan', 'input_title' => 'Berat Badan', 'type' => 'number', 'satuan' => 'kg'])
          @include('rekammedis.input1', ['key' => 'suhu_badan', 'input_title' => 'Suhu Badan', 'type' => 'number', 'satuan' => '&deg;C'])
          @include('rekammedis.input1', ['key' => 'nadi', 'input_title' => 'Denyut Nadi', 'type' => 'number', 'satuan' => 'bpm'])
          @include('rekammedis.inputselect', ['key' => 'spo2', 'input_title' => 'SpO2', 'satuan' => 'bpm', 'options' => range(71, 101, 1)])

          <div class="col-span-2 mb-1">
            <hr>
          </div>

          <div class="col-span-2 mb-1">
            <span class="block text-lg font-medium text-gray-900">
              Tekanan Darah
            </span>
          </div>
          @include('rekammedis.inputselect', ['key' => 'systole', 'input_title' => 'Systole', 'satuan' => '', 'options' => range(60, 201, 10)])
          @include('rekammedis.inputselect', ['key' => 'diastole', 'input_title' => 'Diastole', 'satuan' => '', 'options' => range(40, 111, 10)])

          <div class="col-span-2 mb-1">
            <hr>
          </div>
          <div class="col-span-2 mb-1">
            <span class="block text-xl font-medium text-gray-900">
              Nutrisi
            </span>
          </div>
          @include('rekammedis.inputselect', ['key' => 'nutrisi_pagi', 'input_title' => 'Pagi', 'satuan' => 'porsi', 'options' => range(0.25, 1.1, 0.25)])
          @include('rekammedis.inputselect', ['key' => 'nutrisi_siang', 'input_title' => 'Siang', 'satuan' => 'porsi', 'options' => range(0.25, 1.1, 0.25)])
          @include('rekammedis.inputselect', ['key' => 'nutrisi_sore', 'input_title' => 'Sore', 'satuan' => 'porsi', 'options' => range(0.25, 1.1, 0.25)])

          <div class="col-span-2 mb-1">
            <hr>
          </div>
          <div class="col-span-2 mb-1">
            <span class="block text-xl font-medium text-gray-900">
              Cairan
            </span>
          </div>
          @include('rekammedis.inputselect', ['key' => 'cairan_pagi', 'input_title' => 'Pagi', 'satuan' => 'ml', 'options' => range(100, 1001, 100)])
          @include('rekammedis.inputselect', ['key' => 'cairan_siang', 'input_title' => 'Siang', 'satuan' => 'ml', 'options' => range(100, 1001, 100)])
          @include('rekammedis.inputselect', ['key' => 'cairan_sore', 'input_title' => 'Sore', 'satuan' => 'ml', 'options' => range(100, 1001, 100)])

          <div class="col-span-2 mb-1">
            <hr>
          </div>
          <div class="col-span-2 mb-1">
            <span class="block text-xl font-medium text-gray-900">
              Urine
            </span>
            @php
              $opsi_urine = ['1 Pampers Penuh', 'Sedikit', 'Berkali-kali', '1 urinal', '0.5 urinal', '1x toilet', '2x toilet', '3x toilet'];
            @endphp
          </div>
          @include('rekammedis.inputselect', ['key' => 'urine_pagi', 'input_title' => 'Pagi', 'satuan' => '', 'options' => $opsi_urine])
          @include('rekammedis.inputselect', ['key' => 'urine_siang', 'input_title' => 'Siang', 'satuan' => '', 'options' => $opsi_urine])
          @include('rekammedis.inputselect', ['key' => 'urine_sore', 'input_title' => 'Sore', 'satuan' => '', 'options' => $opsi_urine])

          <div class="col-span-2 mb-1">
            <hr>
          </div>
          <div class="col-span-2 mb-1">
            <span class="block text-xl font-medium text-gray-900">
              Buang Air Besar
            </span>
            @php
              $opsi_bab = ['Sedikit', 'Banyak', '1x', '2x', 'Keras', 'Lembek'];
            @endphp
          </div>
          @include('rekammedis.inputselect', ['key' => 'bab_pagi', 'input_title' => 'Pagi', 'satuan' => 'porsi', 'options' => $opsi_bab])
          @include('rekammedis.inputselect', ['key' => 'bab_siang', 'input_title' => 'Siang', 'satuan' => 'porsi', 'options' => $opsi_bab])
          @include('rekammedis.inputselect', ['key' => 'bab_sore', 'input_title' => 'Sore', 'satuan' => 'porsi', 'options' => $opsi_bab])

          <div class="col-span-2 mb-1">
            <hr>
          </div>
        </div>
        <button type="submit"
          class="w-full rounded-lg bg-blue-700 px-5 py-2.5 text-center font-medium text-white hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 sm:w-auto">Simpan
          Data</button>

        <a href={{ url()->previous() }}
          class="w-full rounded-lg bg-red-700 px-5 py-2.5 text-center font-medium text-white hover:bg-red-800 focus:ring-4 focus:ring-red-300 sm:w-auto">Batalkan</a>
      </form>
    </div>
  </div>
  {{-- @endsection --}}
</x-app-layout>