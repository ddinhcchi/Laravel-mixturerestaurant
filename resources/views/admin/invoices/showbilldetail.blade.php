<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 md:pl-256">
        <div class="flex justify-start m-2 p-2">
            <a href="{{ route('admin.showbills', [$year, $month, $day]) }}"
                class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Quay lại</a>
        </div>
        <div class="flex items-center justify-center min-h-screen bg-gray-100">
            <div class="w-3/5 bg-white shadow-lg">
                <div class="flex justify-between p-4">
                    <div>
                        <h1 class="text-3xl italic font-extrabold tracking-widest text-indigo-500">Mixture</h1>
                        <p class="text-base">Mã đánh giá: {{ $bill->CommentCode }}. Sử dụng mã này để đánh giá dịch vụ của chúng tôi</p>
                    </div>
                    <div class="p-2">
                        <ul class="flex">
                            <li class="flex flex-col items-center p-2 border-l-2 border-indigo-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                                </svg>
                                <span class="text-sm">
                                    www.mixturerestaurant.com
                                </span>
                            </li>
                            <li class="flex flex-col p-2 border-l-2 border-indigo-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <span class="text-sm">
                                    1/2/3 Đường deadline Phường đầy ải nhân gian Quận I
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="w-full h-0.5 bg-indigo-500"></div>
                <div class="flex justify-between p-4">
                    <div>
                        <h6 class="font-bold">Ngày: <span class="text-sm font-medium"> {{ $bill->created_at->format('d-m-Y') }}</span></h6>
                    </div>
                    <div class="w-40">
                        <address class="text-sm">
                            <span class="font-bold"> Tên bàn </span>
                            {{ $table[0]->name }}
                        </address>
                    </div>
                    <div></div>
                </div>
                <div class="flex justify-center p-4">
                    <div class="border-b border-gray-200 shadow">
                        <table class="">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-4 py-2 text-xs text-gray-500 ">
                                        Tên món
                                    </th>
                                    <th class="px-4 py-2 text-xs text-gray-500 ">
                                        Giá
                                    </th>
                                    <th class="px-4 py-2 text-xs text-gray-500 ">
                                        Số lượng
                                    </th>
                                    <th class="px-4 py-2 text-xs text-gray-500 ">
                                        Tổng
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                @foreach ($BillInfos as $BillInfo)
                                    <tr class="whitespace-nowrap">
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-900">
                                                {{ $BillInfo->foodName }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-500">{{  number_format($BillInfo->price, 0, '.', ' ')}} vnđ</div>
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-500">
                                            {{ $BillInfo->count }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{  number_format($BillInfo->price * $BillInfo->count, 0, '.', ' ')}} vnđ
                                        </td>
                                    </tr>
                                @endforeach

                                <tr class="text-white bg-gray-800">
                                    <th colspan="2"></th>
                                    <td class="text-sm font-bold"><b>Tổng cộng</b></td>
                                    <td class="text-sm font-bold"><b>{{  number_format($bill->TotalPrice, 0, '.', ' ')}} vnđ</b></td>
                                </tr>
                                <!--end tr-->

                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="p-4">
                    <div class="flex items-center justify-center">
                        Xin trân thành cảm ơn quý khách!
                    </div>
                    <div class="flex items-end justify-end space-x-3">
                        <a href="{{ route('admin.bill.invoice.pdf', [$table[0]->id, $bill->id]) }}" class="px-4 py-2 text-sm text-yellow-600 bg-yellow-100">In bill</a>
                        <a href="{{ route('admin.showbills', [$year, $month, $day]) }}" class="px-4 py-2 text-sm text-red-600 bg-red-100">Hủy</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-admin-layout>