<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 md:pl-256">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-center m-2 p-2 text-5xl font-bold tracking-wider text-red-700 uppercase">
                <h1>Bàn {{ $table->name }}</h1>
            </div>
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block py-2 min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden shadow-md sm:rounded-lg">
                            <table class="min-w-full">
                                <thead class="bg-gray-50 dark:bg-gray-700">
                                    <tr>
                                        <th scope="col"
                                            class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                            Tên món
                                        </th>
                                        <th scope="col"
                                            class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                            Giá
                                        </th>
                                        <th scope="col"
                                            class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                            Số lượng
                                        </th>
                                        <th scope="col"
                                            class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                            Tổng
                                        </th>
                                        <th scope="col" class="relative py-3 px-6">
                                            <span class="sr-only">Edit</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($BillInfos != NULL)
                                        @foreach ($BillInfos as $BillInfo)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <td
                                                class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $BillInfo->foodName }}
                                            </td>
                                            <td
                                                class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{  number_format($BillInfo->price, 0, '.', ' ')}} vnđ
                                            </td>
                                            <td
                                                class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $BillInfo->count }}
                                            </td>
                                            <td
                                                class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{  number_format($BillInfo->price * $BillInfo->count, 0, '.', ' ')}} vnđ
                                            </td>
                                            <td
                                                class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <div class="flex space-x-2">
                                                    <form
                                                        method="POST"
                                                        class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-lg text-white"
                                                        action="{{ route('admin.billinfo.add', [$table->id, $BillInfo->id]) }}">
                                                        @csrf
                                                        @method('PUT')
                                                        <button>Thêm</button>
                                                    </form>
                                                    <form
                                                        method="POST"
                                                        class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-lg text-white"
                                                        action="{{ route('admin.billinfo.sub', [$table->id, $BillInfo->id]) }}">
                                                        @csrf
                                                        @method('PUT')
                                                        <button>Bớt</button>
                                                    </form>
                                                    <form
                                                        class="px-4 py-2 bg-red-500 hover:bg-red-700 rounded-lg text-white"
                                                        method="POST"
                                                        action="{{ route('admin.billinfo.delete', [$table->id, $BillInfo->id]) }}"
                                                        onsubmit="return confirm('Bạn chắc chứ?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit">Xóa</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    @endif
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td></td>
                                    <td></td>
                                    <td
                                        class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        Tổng cộng:
                                    </td>
                                    <td
                                        class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{  number_format($total, 0, '.', ' ')}} vnđ
                                    </td>
                                    <td
                                        class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <a href="{{ route('admin.bill.invoice', [$table->id, $BillExist[0]->id]) }}"
                                            class="px-4 py-2 bg-orange-500 hover:bg-orange-700 rounded-lg  text-white">Thanh toán</a>
                                    </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full">
                <div class="bg-white">
                    <div class="max-w-2xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
                    <h2 class="sr-only">Products</h2>
                
                    <div class="grid grid-cols-1 gap-y-10 sm:grid-cols-2 gap-x-6 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
                        @foreach ($menus as $menu)
                        <a href="{{ route('admin.billinfo', [$table->id, $BillExist[0]->id, $menu->id]) }}" class="group">
                            <div class="w-full aspect-w-1 aspect-h-1 bg-gray-200 rounded-lg overflow-hidden xl:aspect-w-7 xl:aspect-h-8">
                                <img src="{{ Storage::url($menu->image) }}" class="w-full h-full object-center object-cover group-hover:opacity-75">
                            </div>
                            <h3 class="mt-4 text-sm text-gray-700">{{ $menu->name }}</h3>
                            <p class="mt-1 text-lg font-medium text-gray-900">{{ number_format($menu->price, 0, '.', ' ') }} vnđ</p>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
