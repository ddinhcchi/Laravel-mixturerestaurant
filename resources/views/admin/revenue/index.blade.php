<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 md:pl-256">
        <div @click.away="open = false" class="relative inline-block" x-data="{ open: false }">
            <button @click="open = !open"
                class="border flex flex-row items-center w-24 px-4 py-2 mt-2 text-sm font-semibold text-left bg-green rounded-lg dark:bg-green dark:focus:text-white dark:hover:text-white dark:focus:bg-green-600 dark:hover:bg-green-600 md:block hover:text-green-900 focus:text-green-900 hover:bg-green-200 focus:bg-green-200 focus:outline-none focus:shadow-outline">
                <span>{{ $year }}</span>
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
                        <a href="{{ route('admin.revenue.index', [$y->YEAR, 0]) }}" class="block px-4 py-2 mt-2 text-sm font-semibold bg-green rounded-lg dark:bg-green dark:hover:bg-green-600 dark:focus:bg-green-600 dark:focus:text-white dark:hover:text-white dark:text-green-200 md:mt-0 hover:text-green-900 focus:text-green-900 hover:bg-green-200 focus:bg-green-200 focus:outline-none focus:shadow-outline">{{ $y->YEAR }}</a>
                    @endforeach
                </div>
            </div>
        </div>
        <div @click.away="open = false" class="relative inline-block" x-data="{ open: false }">
            <button @click="open = !open"
                class="border flex flex-row items-center w-32 px-4 py-2 mt-2 text-sm font-semibold text-left bg-green rounded-lg dark:bg-green dark:focus:text-white dark:hover:text-white dark:focus:bg-green-600 dark:hover:bg-green-600 md:block hover:text-green-900 focus:text-green-900 hover:bg-green-200 focus:bg-green-200 focus:outline-none focus:shadow-outline">
                @if ($month == 0)
                    <span>T???t c???</span>
                @else
                    <span>Th??ng {{ $month }}</span>
                @endif
                
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
                class="absolute left-0 w-32 mt-2 origin-top-right rounded-md shadow-lg">
                <div class="px-2 py-2 bg-white rounded-md shadow dark:bg-green-700">
                    <a href="{{ route('admin.revenue.index', [$y->YEAR, 0]) }}" class="block px-4 py-2 mt-2 text-sm font-semibold bg-green rounded-lg dark:bg-green dark:hover:bg-green-600 dark:focus:bg-green-600 dark:focus:text-white dark:hover:text-white dark:text-green-200 md:mt-0 hover:text-green-900 focus:text-green-900 hover:bg-green-200 focus:bg-green-200 focus:outline-none focus:shadow-outline">T???t c???</a>
                    <a href="{{ route('admin.revenue.index', [$y->YEAR, 1]) }}" class="block px-4 py-2 mt-2 text-sm font-semibold bg-green rounded-lg dark:bg-green dark:hover:bg-green-600 dark:focus:bg-green-600 dark:focus:text-white dark:hover:text-white dark:text-green-200 md:mt-0 hover:text-green-900 focus:text-green-900 hover:bg-green-200 focus:bg-green-200 focus:outline-none focus:shadow-outline">Th??ng 1</a>
                    <a href="{{ route('admin.revenue.index', [$y->YEAR, 2]) }}" class="block px-4 py-2 mt-2 text-sm font-semibold bg-green rounded-lg dark:bg-green dark:hover:bg-green-600 dark:focus:bg-green-600 dark:focus:text-white dark:hover:text-white dark:text-green-200 md:mt-0 hover:text-green-900 focus:text-green-900 hover:bg-green-200 focus:bg-green-200 focus:outline-none focus:shadow-outline">Th??ng 2</a>
                    <a href="{{ route('admin.revenue.index', [$y->YEAR, 3]) }}" class="block px-4 py-2 mt-2 text-sm font-semibold bg-green rounded-lg dark:bg-green dark:hover:bg-green-600 dark:focus:bg-green-600 dark:focus:text-white dark:hover:text-white dark:text-green-200 md:mt-0 hover:text-green-900 focus:text-green-900 hover:bg-green-200 focus:bg-green-200 focus:outline-none focus:shadow-outline">Th??ng 3</a>
                    <a href="{{ route('admin.revenue.index', [$y->YEAR, 4]) }}" class="block px-4 py-2 mt-2 text-sm font-semibold bg-green rounded-lg dark:bg-green dark:hover:bg-green-600 dark:focus:bg-green-600 dark:focus:text-white dark:hover:text-white dark:text-green-200 md:mt-0 hover:text-green-900 focus:text-green-900 hover:bg-green-200 focus:bg-green-200 focus:outline-none focus:shadow-outline">Th??ng 4</a>
                    <a href="{{ route('admin.revenue.index', [$y->YEAR, 5]) }}" class="block px-4 py-2 mt-2 text-sm font-semibold bg-green rounded-lg dark:bg-green dark:hover:bg-green-600 dark:focus:bg-green-600 dark:focus:text-white dark:hover:text-white dark:text-green-200 md:mt-0 hover:text-green-900 focus:text-green-900 hover:bg-green-200 focus:bg-green-200 focus:outline-none focus:shadow-outline">Th??ng 5</a>
                    <a href="{{ route('admin.revenue.index', [$y->YEAR, 6]) }}" class="block px-4 py-2 mt-2 text-sm font-semibold bg-green rounded-lg dark:bg-green dark:hover:bg-green-600 dark:focus:bg-green-600 dark:focus:text-white dark:hover:text-white dark:text-green-200 md:mt-0 hover:text-green-900 focus:text-green-900 hover:bg-green-200 focus:bg-green-200 focus:outline-none focus:shadow-outline">Th??ng 6</a>
                    <a href="{{ route('admin.revenue.index', [$y->YEAR, 7]) }}" class="block px-4 py-2 mt-2 text-sm font-semibold bg-green rounded-lg dark:bg-green dark:hover:bg-green-600 dark:focus:bg-green-600 dark:focus:text-white dark:hover:text-white dark:text-green-200 md:mt-0 hover:text-green-900 focus:text-green-900 hover:bg-green-200 focus:bg-green-200 focus:outline-none focus:shadow-outline">Th??ng 7</a>
                    <a href="{{ route('admin.revenue.index', [$y->YEAR, 8]) }}" class="block px-4 py-2 mt-2 text-sm font-semibold bg-green rounded-lg dark:bg-green dark:hover:bg-green-600 dark:focus:bg-green-600 dark:focus:text-white dark:hover:text-white dark:text-green-200 md:mt-0 hover:text-green-900 focus:text-green-900 hover:bg-green-200 focus:bg-green-200 focus:outline-none focus:shadow-outline">Th??ng 8</a>
                    <a href="{{ route('admin.revenue.index', [$y->YEAR, 9]) }}" class="block px-4 py-2 mt-2 text-sm font-semibold bg-green rounded-lg dark:bg-green dark:hover:bg-green-600 dark:focus:bg-green-600 dark:focus:text-white dark:hover:text-white dark:text-green-200 md:mt-0 hover:text-green-900 focus:text-green-900 hover:bg-green-200 focus:bg-green-200 focus:outline-none focus:shadow-outline">Th??ng 9</a>
                    <a href="{{ route('admin.revenue.index', [$y->YEAR, 10]) }}" class="block px-4 py-2 mt-2 text-sm font-semibold bg-green rounded-lg dark:bg-green dark:hover:bg-green-600 dark:focus:bg-green-600 dark:focus:text-white dark:hover:text-white dark:text-green-200 md:mt-0 hover:text-green-900 focus:text-green-900 hover:bg-green-200 focus:bg-green-200 focus:outline-none focus:shadow-outline">Th??ng 10</a>
                    <a href="{{ route('admin.revenue.index', [$y->YEAR, 11]) }}" class="block px-4 py-2 mt-2 text-sm font-semibold bg-green rounded-lg dark:bg-green dark:hover:bg-green-600 dark:focus:bg-green-600 dark:focus:text-white dark:hover:text-white dark:text-green-200 md:mt-0 hover:text-green-900 focus:text-green-900 hover:bg-green-200 focus:bg-green-200 focus:outline-none focus:shadow-outline">Th??ng 11</a>
                    <a href="{{ route('admin.revenue.index', [$y->YEAR, 12]) }}" class="block px-4 py-2 mt-2 text-sm font-semibold bg-green rounded-lg dark:bg-green dark:hover:bg-green-600 dark:focus:bg-green-600 dark:focus:text-white dark:hover:text-white dark:text-green-200 md:mt-0 hover:text-green-900 focus:text-green-900 hover:bg-green-200 focus:bg-green-200 focus:outline-none focus:shadow-outline">Th??ng 12</a>
                </div>
            </div>
        </div>
        <div class="shadow-lg rounded-lg overflow-hidden">
            @if ($month == 0)
                <div class="py-3 px-5 bg-gray-50"><p>Doanh thu n??m {{ $year }}</p></div>
            @else
                <div class="py-3 px-5 bg-gray-50"><p>Doanh thu th??ng {{ $month }} n??m {{ $year }}</p></div>
            @endif
            <canvas class="p-10" id="chartLine"></canvas>
        </div>
    </div>
      
    <!-- Required chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <!-- Chart line -->
    <script>
        var labels = ["Th??ng 1", "Th??ng 2", "Th??ng 3", "Th??ng 4", "Th??ng 5", "Th??ng 6", "Th??ng 7", "Th??ng 8", "Th??ng 9", "Th??ng 10", "Th??ng 11", "Th??ng 12"];
        var data = {
            labels: labels,
            datasets: [
            {
                label: "Doanh thu",
                backgroundColor: "hsl(252, 82.9%, 67.8%)",
                borderColor: "hsl(252, 82.9%, 67.8%)",
                data: [<?= json_encode($m[1]) ?>,  <?= json_encode($m[2]) ?>,  <?= json_encode($m[3]) ?>,  <?= json_encode($m[4]) ?>, <?= json_encode($m[5]) ?>,  <?= json_encode($m[6]) ?>, <?= json_encode($m[7]) ?>,  <?= json_encode($m[8]) ?>,  <?= json_encode($m[9]) ?>,  <?= json_encode($m[10]) ?>,  <?= json_encode($m[11]) ?>, <?= json_encode($m[12]) ?>],
            },
            ],
        };

        if (<?= json_encode($month) ?> != 0){
            if(<?= json_encode($month) ?> == 1 || <?= json_encode($month) ?> == 3 || <?= json_encode($month) ?> == 5 || <?= json_encode($month) ?> == 7 || <?= json_encode($month) ?> == 8 || <?= json_encode($month) ?> == 10 || <?= json_encode($month) ?> == 12){
                labels = ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31"];
                data = {
                    labels: labels,
                    datasets: [
                    {
                        label: "Doanh thu",
                        backgroundColor: "hsl(252, 82.9%, 67.8%)",
                        borderColor: "hsl(252, 82.9%, 67.8%)",
                        data: [<?= json_encode($d[1]) ?>, <?= json_encode($d[2]) ?>, <?= json_encode($d[3]) ?>, <?= json_encode($d[4]) ?>, <?= json_encode($d[5]) ?>, <?= json_encode($d[6]) ?>, <?= json_encode($d[7]) ?>, <?= json_encode($d[8]) ?>, <?= json_encode($d[9]) ?>, <?= json_encode($d[10]) ?>, <?= json_encode($d[11]) ?>, <?= json_encode($d[12]) ?>, <?= json_encode($d[13]) ?>, <?= json_encode($d[14]) ?>, <?= json_encode($d[15]) ?>, <?= json_encode($d[16]) ?>, <?= json_encode($d[17]) ?>, <?= json_encode($d[18]) ?>, <?= json_encode($d[19]) ?>, <?= json_encode($d[20]) ?>, <?= json_encode($d[21]) ?>, <?= json_encode($d[22]) ?>, <?= json_encode($d[23]) ?>, <?= json_encode($d[24]) ?>, <?= json_encode($d[25]) ?>, <?= json_encode($d[26]) ?>, <?= json_encode($d[27]) ?>, <?= json_encode($d[28]) ?>, <?= json_encode($d[29]) ?>, <?= json_encode($d[30]) ?>, <?= json_encode($d[31]) ?>],
                    },
                    ],
                };
            }
            else if (<?= json_encode($month) ?> != 2){
                labels = ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30"];
                data = {
                    labels: labels,
                    datasets: [
                    {
                        label: "Doanh thu",
                        backgroundColor: "hsl(252, 82.9%, 67.8%)",
                        borderColor: "hsl(252, 82.9%, 67.8%)",
                        data: [<?= json_encode($d[1]) ?>, <?= json_encode($d[2]) ?>, <?= json_encode($d[3]) ?>, <?= json_encode($d[4]) ?>, <?= json_encode($d[5]) ?>, <?= json_encode($d[6]) ?>, <?= json_encode($d[7]) ?>, <?= json_encode($d[8]) ?>, <?= json_encode($d[9]) ?>, <?= json_encode($d[10]) ?>, <?= json_encode($d[11]) ?>, <?= json_encode($d[12]) ?>, <?= json_encode($d[13]) ?>, <?= json_encode($d[14]) ?>, <?= json_encode($d[15]) ?>, <?= json_encode($d[16]) ?>, <?= json_encode($d[17]) ?>, <?= json_encode($d[18]) ?>, <?= json_encode($d[19]) ?>, <?= json_encode($d[20]) ?>, <?= json_encode($d[21]) ?>, <?= json_encode($d[22]) ?>, <?= json_encode($d[23]) ?>, <?= json_encode($d[24]) ?>, <?= json_encode($d[25]) ?>, <?= json_encode($d[26]) ?>, <?= json_encode($d[27]) ?>, <?= json_encode($d[28]) ?>, <?= json_encode($d[29]) ?>, <?= json_encode($d[30]) ?>],
                    },
                    ],
                };
            }
            else {
                if (((<?= json_encode($year) ?> % 4 == 0) && (<?= json_encode($year) ?> % 100 != 0)) || (<?= json_encode($year) ?> % 400 == 0)){
                    labels = ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29"];
                    data = {
                        labels: labels,
                        datasets: [
                        {
                            label: "Doanh thu",
                            backgroundColor: "hsl(252, 82.9%, 67.8%)",
                            borderColor: "hsl(252, 82.9%, 67.8%)",
                            data: [<?= json_encode($d[1]) ?>, <?= json_encode($d[2]) ?>, <?= json_encode($d[3]) ?>, <?= json_encode($d[4]) ?>, <?= json_encode($d[5]) ?>, <?= json_encode($d[6]) ?>, <?= json_encode($d[7]) ?>, <?= json_encode($d[8]) ?>, <?= json_encode($d[9]) ?>, <?= json_encode($d[10]) ?>, <?= json_encode($d[11]) ?>, <?= json_encode($d[12]) ?>, <?= json_encode($d[13]) ?>, <?= json_encode($d[14]) ?>, <?= json_encode($d[15]) ?>, <?= json_encode($d[16]) ?>, <?= json_encode($d[17]) ?>, <?= json_encode($d[18]) ?>, <?= json_encode($d[19]) ?>, <?= json_encode($d[20]) ?>, <?= json_encode($d[21]) ?>, <?= json_encode($d[22]) ?>, <?= json_encode($d[23]) ?>, <?= json_encode($d[24]) ?>, <?= json_encode($d[25]) ?>, <?= json_encode($d[26]) ?>, <?= json_encode($d[27]) ?>, <?= json_encode($d[28]) ?>, <?= json_encode($d[29]) ?>],
                        },
                        ],
                    };
                }
                else{
                    labels = ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28"];
                data = {
                    labels: labels,
                    datasets: [
                    {
                        label: "Doanh thu",
                        backgroundColor: "hsl(252, 82.9%, 67.8%)",
                        borderColor: "hsl(252, 82.9%, 67.8%)",
                        data: [<?= json_encode($d[1]) ?>, <?= json_encode($d[2]) ?>, <?= json_encode($d[3]) ?>, <?= json_encode($d[4]) ?>, <?= json_encode($d[5]) ?>, <?= json_encode($d[6]) ?>, <?= json_encode($d[7]) ?>, <?= json_encode($d[8]) ?>, <?= json_encode($d[9]) ?>, <?= json_encode($d[10]) ?>, <?= json_encode($d[11]) ?>, <?= json_encode($d[12]) ?>, <?= json_encode($d[13]) ?>, <?= json_encode($d[14]) ?>, <?= json_encode($d[15]) ?>, <?= json_encode($d[16]) ?>, <?= json_encode($d[17]) ?>, <?= json_encode($d[18]) ?>, <?= json_encode($d[19]) ?>, <?= json_encode($d[20]) ?>, <?= json_encode($d[21]) ?>, <?= json_encode($d[22]) ?>, <?= json_encode($d[23]) ?>, <?= json_encode($d[24]) ?>, <?= json_encode($d[25]) ?>, <?= json_encode($d[26]) ?>, <?= json_encode($d[27]) ?>, <?= json_encode($d[28]) ?>],
                    },
                    ],
                };
                }
            }
        }
        
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