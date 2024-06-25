<x-app-layout>

    @section('title', $page_title)

    <div class="px-32 py-20">

        <div class="mx-auto rounded-xl">
            <span class="text-2xl font-semibold text-slate-600">Data Anak</span>
        </div>

        <section class="mt-6 rounded-xl">
            <div class="max-w-screen-xl mx-auto">
                <div class="relative overflow-hidden bg-white shadow-md rounded-xl">
                    <div class="overflow-x-auto">
                        <table class="w-full text-slate-500">
                            <thead class="text-slate-700 bg-slate-50 dark:bg-slate-700">
                                <tr class="text-center text-slate-600">
                                    <th scope="col" class="w-10 px-4 py-3 text-center">No</th>
                                    <th scope="col" class="px-4 py-3">Nama</th>
                                    <th scope="col" class="px-4 py-3">Umur</th>
                                    <th scope="col" class="px-4 py-3">Jenis Kelamin</th>
                                    <th scope="col" class="px-4 py-3">Layanan Anak</th>
                                    <th scope="col" class="px-4 py-3">Imunisasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @forelse ($anaks as $row)
                                    <tr class="text-center border-b">
                                        <td class="px-4 py-3">{{ $no++ }}</td>
                                        <td class="px-4 py-3">{{ $row->name }}</td>
                                        <td class="px-4 py-3">{{ $row->umur }} bulan</td>
                                        <td class="px-4 py-3">
                                            {{ $row->jenis_kelamin === 'L' ? 'Laki - laki' : 'Perempuan' }}
                                        </td>
                                        <td class="px-4 py-3">
                                            <a href="{{ route('user.layanan.anak', ['id' => $row->id]) }}"
                                                class="font-semibold text-primary hover:underline">Detail</a>
                                        </td>
                                        <td class="px-4 py-3">
                                            <a href="{{ route('user.imun.anak', ['id' => $row->id]) }}"
                                                class="font-semibold text-primary hover:underline">Detail</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="p-6 italic text-center">Data Tidak Tersedia</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>

</x-app-layout>
