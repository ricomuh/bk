<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Riwayat Periksa
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">
            <div class="p-4 bg-white shadow sm-sm:p-8 sm:rounded-lg">
                <section>
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">
                            Riwayat Janji Periksa
                        </h2>
                    </header>

                    <!-- Table -->
                    <table class="table mt-6 overflow-hidden rounded table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Poliklinik</th>
                                <th scope="col">Dokter</th>
                                <th scope="col">Hari</th>
                                <th scope="col">Mulai</th>
                                <th scope="col">Selesai</th>
                                <th scope="col">Antrian</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Dummy Row 1 -->
                            {{-- <tr>
                                <th scope="row" class="align-middle text-start">1</th>
                                <td class="align-middle text-start">Umum</td>
                                <td class="align-middle text-start">Dr. Ahmad</td>
                                <td class="align-middle text-start">Senin</td>
                                <td class="align-middle text-start">08.00</td>
                                <td class="align-middle text-start">10.00</td>
                                <td class="align-middle text-start">5</td>
                                <td class="align-middle text-start">
                                    <span class="badge badge-pill badge-warning">Belum Diperiksa</span>
                                </td>
                                <td class="align-middle text-start">
                                    <a href="#" class="btn btn-info">Detail</a>
                                    </div>
                                </td>
                            </tr>

                            <!-- Dummy Row 2 -->
                            <tr>
                                <th scope="row" class="align-middle text-start">2</th>
                                <td class="align-middle text-start">Gigi</td>
                                <td class="align-middle text-start">Dr. Sari</td>
                                <td class="align-middle text-start">Rabu</td>
                                <td class="align-middle text-start">14.00</td>
                                <td class="align-middle text-start">16.00</td>
                                <td class="align-middle text-start">3</td>
                                <td class="align-middle text-start">
                                    <span class="badge badge-pill badge-success">Sudah Diperiksa</span>
                                </td>
                                <td class="align-middle text-start">
                                    <a href="#" class="btn btn-secondary">Riwayat</a>
                                </td>
                            </tr> --}}

                            @foreach ($janjiPeriksa as $janji)
                            {{-- #escapeWhenCastingToString: false
      #attributes: array:7 [▼
        "id" => 1
        "id_pasien" => 1
        "id_jadwal_periksa" => 5
        "keluhan" => "gabisa makan"
        "no_antrian" => "1"
        "created_at" => "2025-06-16 02:57:47"
        "updated_at" => "2025-06-16 02:57:47"
      ] --}}
                            <tr>
                                                         <td class="align-middle text-start">{{ $loop->iteration }}</td>
                                <td class="align-middle text-start">{{ $janji->jadwalPeriksa->dokter->poli->nama ?? 'N/A' }}</td>
                                <td class="align-middle text-start">{{ $janji->jadwalPeriksa->dokter->nama ?? 'N/A' }}</td>
                                <td class="align-middle text-start">{{ $janji->jadwalPeriksa->hari ?? 'N/A' }}</td>
                                <td class="align-middle text-start">{{ $janji->jadwalPeriksa->jam_mulai ?? 'N/A' }}</td>
                                <td class="align-middle text-start">{{ $janji->jadwalPeriksa->jam_selesai ?? 'N/A' }}</td>
                                <td class="align-middle text-start">{{ $janji->no_antrian ?? 'N/A' }}</td>
                                <td class="align-middle text-start">
                                    @if ($janji->periksa)
                                        <span class="badge badge-pill badge-success">Sudah Diperiksa</span>
                                    @else
                                        <span class="badge badge-pill badge-warning">Belum Diperiksa</span>
                                    @endif
                                </td>
                                <td class="align-middle text-start">
                                    @if ($janji->periksa)
                                        <a href="{{ route('pasien.riwayat-periksa.riwayat', $janji->id) }}" class="btn btn-secondary">Riwayat</a>
                                    @else
                                        <a href="{{ route('pasien.riwayat-periksa.show', $janji->id) }}" class="btn btn-info">Detail</a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
