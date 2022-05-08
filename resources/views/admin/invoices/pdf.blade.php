<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-3/5 bg-white shadow-lg">
        <div class="flex justify-between p-4">
            <div>
                <h1 class="text-3xl italic font-extrabold tracking-widest text-indigo-500">Mixture</h1>
                <p class="text-base">Ma danh gia: {{ $bill->CommentCode }}. Su dung ma nay de danh gia dich vu cua chung toi</p>
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
                            1/2/3 Duong DeadLine Phuong Day Ai Nhan Gian Quan I
                        </span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="w-full h-0.5 bg-indigo-500"></div>
        <div class="flex justify-between p-4">
            <div>
                <h6 class="font-bold">Ngay: <span class="text-sm font-medium"> {{ $bill->created_at->format('d-m-Y') }}</span></h6>
            </div>
            <div class="w-40">
                <address class="text-sm">
                    <span class="font-bold"> Ten ban </span>
                    {{ $table->name }}
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
                                Ten mon
                            </th>
                            <th class="px-4 py-2 text-xs text-gray-500 ">
                                Gia
                            </th>
                            <th class="px-4 py-2 text-xs text-gray-500 ">
                                So luong
                            </th>
                            <th class="px-4 py-2 text-xs text-gray-500 ">
                                Tong
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
                                    <div class="text-sm text-gray-500">{{  number_format($BillInfo->price, 0, '.', ' ')}} vnd</div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    {{ $BillInfo->count }}
                                </td>
                                <td class="px-6 py-4">
                                    {{  number_format($BillInfo->price * $BillInfo->count, 0, '.', ' ')}} vnd
                                </td>
                            </tr>
                        @endforeach

                        <tr class="text-white bg-gray-800">
                            <th colspan="2"></th>
                            <td class="text-sm font-bold"><b>Tong cong</b></td>
                            <td class="text-sm font-bold"><b>{{  number_format($total, 0, '.', ' ')}} vnd</b></td>
                        </tr>
                        <!--end tr-->

                    </tbody>
                </table>
            </div>
        </div>

        <div class="p-4">
            <div class="flex items-center justify-center">
                Xin tran thanh cam on quy khach
            </div>
        </div>

    </div>
</div>