<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard - Telescout</title>
    @include('includes.head')
</head>

<body x-data="" class="is-header-blur" x-bind="$store.global.documentBody">
    <!-- App preloader-->
    @include('includes.preloader')

    <!-- Page Wrapper -->
    <div id="root" class="min-h-100vh flex grow bg-slate-50 dark:bg-navy-900" x-cloak="">
        <!-- Sidebar -->
        @include('telkomsel.menus.dashboard.dashboardMenus')

        <!-- App Header Wrapper-->
        @include('includes.navbar')

        <!-- Mobile Searchbar -->
        @include('includes.searchBar')

        <!-- Right Sidebar -->
        @include('includes.rightSidebar')

        <!-- Main Content Wrapper -->
        <main class="main-content w-full px-[var(--margin-x)] pb-8">
            <div class="flex items-center py-5 lg:py-6">
                <form method="GET" action="{{ route('telkomsel.index') }}">
                    <div class="container">
                        <h2 class="font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
                            Dashboard Monitoring Progress Order Fallout End State -
                            <select name="data-change" onchange="this.form.submit()" class="form-selected">
                                <option value="" disabled {{ empty($selectedFeedbackId) ? 'selected' : '' }}>
                                    Mohon Pilih
                                </option>
                                @forelse ($kendalas as $feedback)
                                    <option value="{{ $feedback->id }}"
                                        {{ $selectedFeedbackId == $feedback->id ? 'selected' : '' }}>
                                        {{ $feedback->uic }}
                                    </option>
                                @empty
                                    <option disabled>Tidak ada Data yang Tersedia</option>
                                @endforelse
                            </select>
                            &nbsp;Di bulan -
                            <!-- Dropdown untuk Bulan -->
                            <select name="month" id="month" class="form-selected"
                                onchange="updateYearAndSubmit()">
                                <option value="">Semua Bulan</option>
                                @foreach ($months as $month)
                                    <option value="{{ $month->month }}" data-year="{{ $month->year }}"
                                        {{ request('month') == $month->month && request('year') == $month->year ? 'selected' : '' }}>
                                        {{ \Carbon\Carbon::createFromDate($month->year, $month->month)->translatedFormat('F Y') }}
                                    </option>
                                @endforeach
                            </select>

                            <!-- Hidden Input untuk Tahun -->
                            <input type="hidden" name="year" id="year" value="{{ request('year') }}">
                            <noscript>
                                <button type="submit">Submit</button>
                            </noscript>
                        </h2>
                    </div>
                </form>
            </div>

            <div class="grid grid-cols-1 gap-4 sm:gap-5 lg:gap-6">
                <!-- Collapsible  Table -->
                <div x-data="{ isFilterExpanded: false }">

                    <div class="card mt-4">
                        @if ($data->count())
                            <div class="is-scrollbar-hidden min-w-full overflow-x-auto">
                                <table class="w-full text-center">
                                    <thead>
                                        <!-- Baris Pertama -->
                                        <tr>
                                            <th rowspan="1"
                                                class="whitespace-nowrap rounded-tl-lg bg-primary-focus font-medium text-white focus:bg-primary-focus dark:bg-accent dark:focus:bg-accent-focus text-xs font-semibold uppercase">
                                            </th>
                                            <th rowspan="1"
                                                class="whitespace-nowrap bg-primary-focus font-medium text-white focus:bg-primary-focus dark:bg-accent dark:focus:bg-accent-focus text-xs font-semibold uppercase">
                                            </th>
                                            <th rowspan="1"
                                                class="whitespace-nowrap bg-primary-focus font-medium text-white focus:bg-primary-focus dark:bg-accent dark:focus:bg-accent-focus text-xs font-semibold uppercase">
                                            </th>
                                            <th colspan="{{ count($feedbackPics) }}"
                                                class="whitespace-nowrap bg-primary-focus font-medium text-white focus:bg-primary-focus dark:bg-accent dark:focus:bg-accent-focus text-xs border font-semibold uppercase">
                                                DETAIL PROGRESS</th>
                                            <th rowspan="1"
                                                class="whitespace-nowrap bg-primary-focus font-medium text-white focus:bg-primary-focus dark:bg-accent dark:focus:bg-accent-focus text-xs font-semibold uppercase">
                                            </th>
                                            <th rowspan="1"
                                                class="whitespace-nowrap rounded-tr-lg bg-primary-focus font-medium text-white focus:bg-primary-focus dark:bg-accent dark:focus:bg-accent-focus text-xs font-semibold uppercase">
                                            </th>
                                        </tr>
                                        <!-- Baris Kedua -->
                                        <tr>
                                            <th rowspan="2"
                                                class="whitespace-nowrap bg-primary-focus font-medium text-white focus:bg-primary-focus dark:bg-accent dark:focus:bg-accent-focus text-xs border font-semibold uppercase">
                                                so<br><br>
                                            </th>
                                            <th rowspan="2"
                                                class="whitespace-nowrap bg-primary-focus font-medium text-white focus:bg-primary-focus dark:bg-accent dark:focus:bg-accent-focus text-xs border font-semibold uppercase">
                                                tl<br><br>
                                            </th>
                                            <th rowspan="2"
                                                class="whitespace-nowrap bg-primary-focus font-medium text-white focus:bg-primary-focus dark:bg-accent dark:focus:bg-accent-focus text-xs border font-semibold uppercase">
                                                sto<br><br>
                                            </th>
                                            @foreach ($feedbackPics as $feedbackPic)
                                                @php
                                                    $color = match ($feedbackPic->feedback_pic) {
                                                        'NEED JUMLAH TIANG' => 'gold',
                                                        'BUTUH IZIN' => 'darkturquoise',
                                                        'IZIN OK, SURVEY MITRA' => 'gold',
                                                        'PROGRESS INSTALL TIANG' => 'gold',
                                                        'SOLUSI DONE, NEED FU CUST' => 'darkturquoise',
                                                        'NEED FU CUST + INPUT GD CB' => 'darkturquoise',
                                                        'BUTUH IZIN/ NEED FU DEVELOPER' => 'darkturquoise',
                                                        'RAB NOK, NEED TAMBAH CUST' => 'darkturquoise',
                                                        'OGP PT1' => 'lime',
                                                        'SOLUSI DONE, NEED FU FMC' => 'darkturquoise',
                                                        'CLOSED PS' => 'green',
                                                        'BATAL PASANG/IZIN NOK' => 'red',
                                                        'BATAL PASANG/DROP DESAIN' => 'red',
                                                        'BATAL PASANG/DROP' => 'red',
                                                        'BATAL PASANG' => 'red',
                                                        'DUPLICATED DATA' => 'red',
                                                        'NEED EVIDENCE' => 'orange',
                                                        'NEED TAGGING PELANGGAN + VALINS ID' => 'orange',
                                                        'NEED TAGGING PELANGGAN' => 'orange',
                                                        'CEK MANCORE' => 'orange',
                                                        'ODP READY/ ODP BELUM GO LIVE' => 'orange',
                                                        'REDESIGN' => 'orange',
                                                        'SURVEY MITRA' => 'gold',
                                                        'ORDER REPAIR' => 'gold',
                                                        'WAITING ED APPROVAL' => 'darkturquoise',
                                                        'OGP REPAIR' => 'gold',
                                                        'PROGRESS DEPLOY' => 'gold',
                                                        default => 'gray',
                                                    };
                                                @endphp
                                                <th colspan="1" style="background-color: {{ $color }}"
                                                    class="break-words whitespace-nowrap font-medium text-white px-1 focus:bg-opacity-80 dark:focus:bg-opacity-80 text-xs border font-semibold uppercase">
                                                    {{ $feedbackPic->feedback_pic }} <br><br>
                                                </th>
                                            @endforeach
                                            <th rowspan="2"
                                                class="whitespace-nowrap bg-primary-focus font-medium text-white focus:bg-primary-focus dark:bg-accent dark:focus:bg-accent-focus text-xs border font-semibold uppercase">
                                                Total<br><br>
                                            </th>
                                            <th rowspan="2"
                                                class="whitespace-nowrap bg-primary-focus font-medium text-white focus:bg-primary-focus dark:bg-accent dark:focus:bg-accent-focus text-xs border font-semibold uppercase">
                                                %P S/WO<br><br>
                                            </th>
                                        </tr>
                                    </thead>
                                    @isset($data)
                                        <tbody>
                                            @foreach ($groupedData as $so => $tlGroup)
                                                @php
                                                    $rowSpanSO = $tlGroup
                                                        ->map(function ($group) {
                                                            return count($group);
                                                        })
                                                        ->sum();
                                                @endphp
                                                @foreach ($tlGroup as $tl => $rows)
                                                    @php
                                                        $rowSpanTL = count($rows);
                                                    @endphp
                                                    @foreach ($rows as $index => $row)
                                                        <tr class="border-y border-transparent">
                                                            @if ($loop->parent->first && $index === 0)
                                                                <td class="whitespace-nowrap border text-xs"
                                                                    rowspan="{{ $rowSpanSO }}">
                                                                    <a href="{{ url('MasterData') }}?month={{ request('month') }}&year={{ request('year') }}&so={{ $row->id_so }}&sto=&telda=&segmen=&uic=&pic=&status="
                                                                        class="hover:underline">
                                                                        {{ $so }}
                                                                    </a>
                                                                </td>
                                                            @endif
                                                            @if ($index === 0)
                                                                <td class="whitespace-nowrap border text-xs"
                                                                    rowspan="{{ $rowSpanTL }}">{{ $tl }}</td>
                                                            @endif
                                                            <td class="whitespace-nowrap border text-xs">
                                                                <a href="{{ url('MasterData') }}?month={{ request('month') }}&year={{ request('year') }}&so=&sto={{ $row->id }}&telda=&segmen=&uic=&pic=&status="
                                                                    class="hover:underline">
                                                                    {{ $row->nama_sto }}
                                                                </a>
                                                            </td>
                                                            @php
                                                                $rowTotal = 0;
                                                            @endphp
                                                            @foreach ($feedbackPics as $pic)
                                                                @php
                                                                    $count = $ordersCount[$pic->id][$row->id] ?? 0;
                                                                    $rowTotal += $count;
                                                                @endphp
                                                                <td class="whitespace-nowrap border">
                                                                    <a href="{{ url('MasterData') }}?month={{ request('month') }}&year={{ request('year') }}&so=&sto={{ $row->id }}&telda=&segmen=&uic={{ $pic->id_uic }}&pic={{ $pic->id }}&status="
                                                                        class="hover:underline">
                                                                        @if ($count > 0)
                                                                            <strong>
                                                                                {{ $count }}</strong>
                                                                        @else
                                                                            {{ $count }}
                                                                        @endif
                                                                    </a>
                                                                </td>
                                                            @endforeach
                                                            <td class="whitespace-nowrap border">
                                                                <a href="{{ url('MasterData') }}?month={{ request('month') }}&year={{ request('year') }}&so=&sto={{ $row->id }}&telda=&segmen=@isset($selectedFeedbackId)&uic={{ $feedbackPics->first()->id_uic ?? '' }}@endisset&pic=&status="
                                                                    class="hover:underline">
                                                                    @if ($rowTotal > 0)
                                                                        <strong>{{ $rowTotal }}</strong>
                                                                    @else
                                                                        {{ $rowTotal }}
                                                                    @endif
                                                                </a>
                                                            </td>
                                                            <td class="whitespace-nowrap border">
                                                                @if ($totalOverall > 0)
                                                                    <strong>{{ number_format(($rowTotal / $totalOverall) * 100, 2) }}%</strong>
                                                                @else
                                                                    0%
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endforeach
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="3" class="whitespace-nowrap border text-xs">
                                                    Grand Total
                                                </td>
                                                @foreach ($feedbackPics as $pic)
                                                    <td class="whitespace-nowrap border">
                                                        <a href="{{ url('MasterData') }}?month={{ request('month') }}&year={{ request('year') }}&so=&sto=&telda=&segmen=&uic={{ $pic->id_uic }}&pic={{ $pic->id }}&status="
                                                            class="hover:underline">
                                                            @if ($totalPerFeedback[$pic->id] > 0)
                                                                <strong>{{ $totalPerFeedback[$pic->id] }}</strong>
                                                            @else
                                                                {{ $totalPerFeedback[$pic->id] }}
                                                            @endif
                                                        </a>
                                                    </td>
                                                @endforeach
                                                <td class="whitespace-nowrap border">
                                                    <a href="{{ url('MasterData') }}?month={{ request('month') }}&year={{ request('year') }}&so=&sto=&telda=&segmen=@isset($selectedFeedbackId)&uic={{ $feedbackPics->first()->id_uic ?? '' }}@endisset&pic=&status="
                                                        class="hover:underline">
                                                        @if ($totalOverall > 0)
                                                            <strong>{{ $totalOverall }}</strong>
                                                        @else
                                                            {{ $totalOverall }}
                                                        @endif
                                                    </a>
                                                </td>
                                                <td class="whitespace-nowrap border">
                                                    @if ($totalOverall > 0)
                                                        <strong>{{ number_format(($totalOverall / $totalOverall) * 100, 2) }}%</strong>
                                                    @else
                                                        0%
                                                    @endif
                                                </td>
                                            </tr>
                                        </tfoot>
                                    @endisset
                                </table>
                            </div>
                        @else
                            <br>
                            <p class="text-center">Tidak menemukan data yang cocok</p><br>
                        @endif
                    </div>
                </div>
            </div>


        </main>
    </div>
    <!--
        This is a place for Alpine.js Teleport feature
        @see https://alpinejs.dev/directives/teleport
      -->
    <div id="x-teleport-target"></div>
    <script>
        window.addEventListener("DOMContentLoaded", () => Alpine.start());
    </script>
</body>

</html>
