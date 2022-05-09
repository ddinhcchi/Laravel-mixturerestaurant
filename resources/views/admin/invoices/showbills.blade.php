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
                        <a href="{{ route('admin.showbills', [$y->YEAR, 0, 0]) }}" class="block px-4 py-2 mt-2 text-sm font-semibold bg-green rounded-lg dark:bg-green dark:hover:bg-green-600 dark:focus:bg-green-600 dark:focus:text-white dark:hover:text-white dark:text-green-200 md:mt-0 hover:text-green-900 focus:text-green-900 hover:bg-green-200 focus:bg-green-200 focus:outline-none focus:shadow-outline">{{ $y->YEAR }}</a>
                    @endforeach
                </div>
            </div>
        </div>
        <div @click.away="open = false" class="relative inline-block" x-data="{ open: false }">
            <button @click="open = !open"
                class="border flex flex-row items-center w-32 px-4 py-2 mt-2 text-sm font-semibold text-left bg-green rounded-lg dark:bg-green dark:focus:text-white dark:hover:text-white dark:focus:bg-green-600 dark:hover:bg-green-600 md:block hover:text-green-900 focus:text-green-900 hover:bg-green-200 focus:bg-green-200 focus:outline-none focus:shadow-outline">
                @if ($month == 0)
                    <span>Tất cả</span>
                @else
                    <span>Tháng {{ $month }}</span>
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
                    <a href="{{ route('admin.showbills', [$y->YEAR, 0, 0]) }}" class="block px-4 py-2 mt-2 text-sm font-semibold bg-green rounded-lg dark:bg-green dark:hover:bg-green-600 dark:focus:bg-green-600 dark:focus:text-white dark:hover:text-white dark:text-green-200 md:mt-0 hover:text-green-900 focus:text-green-900 hover:bg-green-200 focus:bg-green-200 focus:outline-none focus:shadow-outline">Tất cả</a>
                    @foreach ($months as $m)
                        <a href="{{ route('admin.showbills', [$year, $m->MONTH, 0]) }}" class="block px-4 py-2 mt-2 text-sm font-semibold bg-green rounded-lg dark:bg-green dark:hover:bg-green-600 dark:focus:bg-green-600 dark:focus:text-white dark:hover:text-white dark:text-green-200 md:mt-0 hover:text-green-900 focus:text-green-900 hover:bg-green-200 focus:bg-green-200 focus:outline-none focus:shadow-outline">Tháng {{ $m->MONTH }}</a>
                    @endforeach
                </div>
            </div>
        </div>
        @if ($month != 0)
            <div @click.away="open = false" class="relative inline-block" x-data="{ open: false }">
                <button @click="open = !open"
                    class="border flex flex-row items-center w-32 px-4 py-2 mt-2 text-sm font-semibold text-left bg-green rounded-lg dark:bg-green dark:focus:text-white dark:hover:text-white dark:focus:bg-green-600 dark:hover:bg-green-600 md:block hover:text-green-900 focus:text-green-900 hover:bg-green-200 focus:bg-green-200 focus:outline-none focus:shadow-outline">
                    @if ($day == 0)
                        <span>Tất cả</span>
                    @else
                        <span>Ngày {{ $day }}</span>
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
                        <a href="{{ route('admin.showbills', [$y->YEAR, $month, 0]) }}" class="block px-4 py-2 mt-2 text-sm font-semibold bg-green rounded-lg dark:bg-green dark:hover:bg-green-600 dark:focus:bg-green-600 dark:focus:text-white dark:hover:text-white dark:text-green-200 md:mt-0 hover:text-green-900 focus:text-green-900 hover:bg-green-200 focus:bg-green-200 focus:outline-none focus:shadow-outline">Tất cả</a>
                        @foreach ($days as $d)
                            <a href="{{ route('admin.showbills', [$y->YEAR, $month, $d->DAY]) }}" class="block px-4 py-2 mt-2 text-sm font-semibold bg-green rounded-lg dark:bg-green dark:hover:bg-green-600 dark:focus:bg-green-600 dark:focus:text-white dark:hover:text-white dark:text-green-200 md:mt-0 hover:text-green-900 focus:text-green-900 hover:bg-green-200 focus:bg-green-200 focus:outline-none focus:shadow-outline">{{ $d->DAY }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
        
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block py-2 min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden shadow-md sm:rounded-lg">
                        <table class="min-w-full">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th scope="col"
                                        class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                        Mã đơn
                                    </th>
                                    <th scope="col"
                                        class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                        Mã bàn
                                    </th>
                                    <th scope="col"
                                        class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                        Ngày
                                    </th>
                                    <th scope="col"
                                        class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                        Tổng Tiền
                                    </th>
                                    <th scope="col" class="relative py-3 px-6">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bills as $bill)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <td
                                            class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $bill->id }}
                                        </td>
                                        <td
                                            class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $bill->IdTable }}
                                        </td>
                                        <td
                                            class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $bill->created_at }} 
                                        </td>
                                        <td
                                            class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ number_format($bill->TotalPrice, 0, '.', ' ') }} vnđ
                                        </td>
                                        <td
                                            class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            <div class="flex space-x-2">
                                                <a href="{{ route('admin.showbilldetail', [$bill->id, $year, $month, $day]) }}"
                                                    class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-lg  text-white">Chi tiết</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>