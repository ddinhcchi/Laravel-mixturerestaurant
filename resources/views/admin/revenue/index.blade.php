<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 md:pl-256">
        <div @click.away="open = false" class="relative" x-data="{ open: false }">
            <button @click="open = !open"
                class="border flex flex-row items-center w-24 px-4 py-2 mt-2 text-sm font-semibold text-left bg-green rounded-lg dark:bg-green dark:focus:text-white dark:hover:text-white dark:focus:bg-green-600 dark:hover:bg-green-600 md:block hover:text-green-900 focus:text-green-900 hover:bg-green-200 focus:bg-green-200 focus:outline-none focus:shadow-outline">
                <span>Năm</span>
                <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}"
                    class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1">
                    <path fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
            <div x-show="open" x-transition:enter="transition ease-out duration-100"
                x-transition:enter-start="transform opacity-0 scale-95"
                x-transition:enter-end="transform opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-75"
                x-transition:leave-start="transform opacity-100 scale-100"
                x-transition:leave-end="transform opacity-0 scale-95"
                class="absolute left-0 w-24 mt-2 origin-top-right rounded-md shadow-lg">
                <div class="px-2 py-2 bg-white rounded-md shadow dark:bg-green-700">
                    @foreach ($years as $y)
                        <a href="{{ route('admin.revenue.index', [$y->YEAR]) }}" class="block px-4 py-2 mt-2 text-sm font-semibold bg-green rounded-lg dark:bg-green dark:hover:bg-green-600 dark:focus:bg-green-600 dark:focus:text-white dark:hover:text-white dark:text-green-200 md:mt-0 hover:text-green-900 focus:text-green-900 hover:bg-green-200 focus:bg-green-200 focus:outline-none focus:shadow-outline">{{ $y->YEAR }}</a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="shadow-lg rounded-lg overflow-hidden">
            <div class="py-3 px-5 bg-gray-50"><p>Doanh thu năm {{ $year }}</p></div>
            <canvas class="p-10" id="chartLine"></canvas>
        </div>
    </div>
      
    <!-- Required chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <!-- Chart line -->
    <script>
    const labels = ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12"];
    const data = {
        labels: labels,
        datasets: [
        {
            label: "Doanh thu",
            backgroundColor: "hsl(252, 82.9%, 67.8%)",
            borderColor: "hsl(252, 82.9%, 67.8%)",
            data: [<?= json_encode($m1) ?>,  <?= json_encode($m2) ?>,  <?= json_encode($m3) ?>,  <?= json_encode($m4) ?>, <?= json_encode($m5) ?>,  <?= json_encode($m6) ?>, <?= json_encode($m7) ?>,  <?= json_encode($m8) ?>,  <?= json_encode($m9) ?>,  <?= json_encode($m10) ?>,  <?= json_encode($m11) ?>, <?= json_encode($m12) ?>],
        },
        ],
    };
    
    const configLineChart = {
        type: "line",
        data,
        options: {},
    };
    
    var chartLine = new Chart(
        document.getElementById("chartLine"),
        configLineChart
    );
    </script>
</x-admin-layout>