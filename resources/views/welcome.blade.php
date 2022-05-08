<x-guest-layout>
    <!-- Main Hero Content -->
    <div class="container max-w-lg px-4 py-32 mx-auto text-left bg-center bg-no-repeat bg-cover md:max-w-none md:text-center"
        style="background-image: url({{ Storage::url('public/welcome/view.jpg') }})">
        <h1
            class="font-mono text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 md:text-center sm:leading-none lg:text-5xl">
            <span class="inline md:block">Chào mừng đến với nhà hàng Mixture</span>
        </h1>
        <div class="mx-auto mt-2 text-green-50 md:text-center lg:text-lg">
            Nơi đem đến những hương vị mang dấu ấn sâu đậm, phục vụ tận tình, không gian thoáng mát, hiện đại.
        </div>
        <div class="flex flex-col items-center mt-12 text-center">
            <span class="relative inline-flex w-full md:w-auto">
                <a href="{{ route('reservations.step.one') }}" type="button"
                    class="inline-flex items-center justify-center px-6 py-2 text-base font-bold leading-6 text-white bg-green-600 rounded-full lg:w-full md:w-auto hover:bg-green-500 focus:outline-none">
                    Đặt bàn ngay
                </a>
        </div>
    </div>
    <!-- End Main Hero Content -->
    <section id="about" class="px-2 py-32 bg-white md:px-0">
        <div class="container items-center max-w-6xl px-8 mx-auto xl:px-5">
            <div class="flex flex-wrap items-center sm:-mx-3">
                <div class="w-full md:w-1/2 md:px-3">
                    <div class="w-full pb-6 space-y-4 sm:max-w-md lg:max-w-lg lg:space-y-4 lg:pr-0 md:pb-0">
                        <h3 class="text-xl">Giới thiệu
                        </h3>
                        <h2 class="text-4xl text-green-600">Welcome</h2>
                        <!-- </h1> -->
                        <p class="mx-auto text-base text-gray-500 sm:max-w-md lg:text-xl md:max-w-3xl">
                            Nhà hàng Mixture, đẹp và trang trọng nhằm tạo ra không gian thưởng thức ẩm thực đỉnh cao, cũng chính là mục tiêu mà Mixture thật sự cố gắng theo đuổi. Dẫu còn nhiều trăn trở và khó khăn, đội ngũ sáng lập của nhà hàng Mixture luôn lắng nghe và xem nguyện vọng của khách hàng lên hàng đầu. Bên cạnh đó, Mixture coi việc kết hợp tinh hoa ẩm thực từ các nguyên liệu của quê hương nhằm phục vụ cho du khách các món ngon tuyệt vời nhất!
                        </p>
                        <div class="relative flex">
                            <a href="{{ route('categories.index') }}"
                                class="flex items-center w-full px-6 py-3 mb-3 text-lg text-white bg-green-600 rounded-md sm:mb-0 hover:bg-green-700 sm:w-auto">
                                Các loại món
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-1" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline points="12 5 19 12 12 19"></polyline>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2">
                    <div class="w-full h-auto overflow-hidden rounded-md shadow-xl sm:rounded-xl">
                        <img src="https://cdn.pixabay.com/photo/2017/08/03/13/30/people-2576336_960_720.jpg" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-20 bg-gray-50">
        <div class="container items-center max-w-6xl px-4 px-10 mx-auto sm:px-20 md:px-32 lg:px-16">
            <div class="flex flex-wrap items-center -mx-3">
                <div class="order-1 w-full px-3 lg:w-1/2 lg:order-0">
                    <div class="w-full lg:max-w-md">
                        <h2 class="mb-4 text-2xl font-bold">Về chúng tôi</h2>
                        <h2
                            class="mb-4 text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500">
                            WHY CHOOSE US?</h2>

                        <p class="mb-4 font-medium tracking-tight text-gray-400 xl:mb-6">
                            Bên cạnh những món ăn ngon đến mê ly, chúng tôi còn đem đến cho bạn sự hài lòng đến từ đội ngũ nhân viên giàu kinh nghiệm. Không gian thoáng đãng, lãng mạn phù hợp cho mọi cặp đôi đến đây hẹn hò. Đặc biệt là với giá cả hợp lý, hấp dẫn. 
                        </p>
                        <ul>
                            <li class="flex items-center py-2 space-x-4 xl:py-3">
                                <svg class="w-8 h-8 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z">
                                    </path>
                                </svg>
                                <span class="font-medium text-gray-500">Không gian thoáng mát, lãng mạn</span>
                            </li>
                            <li class="flex items-center py-2 space-x-4 xl:py-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-gray-500" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="font-medium text-gray-500">Giá cả phải chăng</span>
                            </li>
                            <li class="flex items-center py-2 space-x-4 xl:py-3">
                                <svg class="w-8 h-8 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                                    </path>
                                </svg>
                                <span class="font-medium text-gray-500">Phục vụ tận tình, chu đáo</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="w-full px-3 mb-12 lg:w-1/2 order-0 lg:order-1 lg:mb-0"><img
                        class="mx-auto sm:max-w-sm lg:max-w-full"
                        src="https://cdn.pixabay.com/photo/2020/12/31/12/28/cook-5876388_960_720.png"
                        alt="feature image"></div>
            </div>
        </div>
    </section>
    <section class="mt-8 bg-white">
        <div class="mt-4 text-center">
            <h3 class="text-2xl font-bold">Our Menu</h3>
            <h2 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500">
                MÓN ĐẶC SẢN CỦA CHÚNG TÔI</h2>
        </div>
        <div class="container w-full px-5 py-6 mx-auto">
            <div class="grid lg:grid-cols-4 gap-y-6">
                @if ($specials)
                    @foreach ($specials->menus as $menu)
                        <div class="max-w-xs mx-4 mb-2 rounded-lg shadow-lg">
                            <a href="#">
                                <img class="w-full h-48" src="{{ Storage::url($menu->image) }}" alt="Image" />
                                <div class="px-6 py-4">
                                    <h4 class="mb-3 text-xl font-semibold tracking-tight text-green-600 uppercase">
                                        {{ $menu->name }}</h4>
                                    <p class="leading-normal text-gray-700">{{ $menu->description }}.</p>
                                </div>
                                <div class="flex items-center justify-between p-4">
                                    <span class="text-xl text-green-600">{{ number_format($menu->price, 0, '.', ' ') }} vnđ</span>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>

    <section class="pt-4 pb-12 bg-gray-800">
        <div class="my-16 text-center">
            <h2 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500">
                Đánh giá </h2>
            <p class="text-xl text-white">Chúng tôi xin trân thành cảm ơn sự ủng hộ của quý khách!</p>
        </div>

        <div class="swiper mySwiper">
            <div class="flex pl-10">
                <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                <p class="ml-2 text-sm font-bold text-gray-900 dark:text-white">{{ number_format($avg, 2, '.') }}</p>
                <span class="w-1 h-1 mx-1.5 bg-gray-500 rounded-full dark:bg-gray-400"></span>
                <a href="#" class="text-sm font-medium text-gray-900 underline hover:no-underline dark:text-white">{{ $count }} reviews</a>
            </div>
            <div class="swiper-wrapper">
                @if ($cmts!=NULL)
                    @foreach ($cmts as $cmt)
                        <div class="max-w-md p-4 bg-white rounded-lg shadow-lg swiper-slide">
                            <div class="flex items-center w-full">
                                @for ($i = 0; $i <  $cmt->rating_star ; $i++)
                                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                @endfor
                            </div>
                            <div>
                                <p class="mt-2 text-gray-600">{{ $cmt->comment }}</p>
                            </div>
                            <div class="flex justify-end mt-4">
                                <a href="#" class="text-xl font-medium text-green-500">{{ $cmt->customer_name }}</a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>

        <div class="flex justify-center m-2 p-2 pt-12">
            <a href="{{ route('comments.index') }}"
                class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-lg text-white">Thêm đánh giá của bạn</a>
        </div>
    </section>

    <section class="my-8 bg-gray" id="Contact">
        <div class="my-8 text-center">
            <h3 class="text-2xl font-bold">Liên hệ</h3>
        </div>

        <div class="container items-center max-w-6xl px-8 mx-auto xl:px-5">
            <div class="flex flex-wrap items-center sm:-mx-3">
                <div class="w-full md:w-1/2">
                    <h2 class="text-xl text-green-600 text-center">
                        Địa chỉ: 1/2/3 Đường Lên Đỉnh OLYMPIA</h2>
                    <div class="w-full h-auto overflow-hidden rounded-md shadow-xl sm:rounded-xl hover:scale-200">
                        <img src="{{ Storage::url('public/imgs/map.png') }}" />
                    </div>
                </div>
                <div class="w-full md:w-1/2 md:px-3">
                    <div class="w-full pb-6 space-y-4 sm:max-w-md lg:max-w-lg lg:space-y-4 lg:pr-0 md:pb-0">
                        <h2 class="text-xl text-green-600 text-center">Thông tin</h2>
                        <ul class="text-center">
                            <li class="items-center py-2 space-x-4 xl:py-3">                               
                                <span class="font-medium text-gray-500">Trường Đại Học Sư Phạm TPHCM - Khoa CNTT</span>
                            </li>
                            <li class="items-center py-2 space-x-4 xl:py-3">                                
                                <span class="font-medium text-gray-500">Đồ Án Cuối Kỳ</span>
                            </li>
                            <li class="items-center py-2 space-x-4 xl:py-3">
                                <span class="font-medium text-gray-500">Giảng Viên: Lê Hoàng Việt Tuấn - Nhóm Thực Hiện: Mixture</span>
                            </li>
                            <li class="items-center py-2 space-x-4 xl:py-3">
                                <span class="font-medium text-gray-500">Đồ án tham khảo từ: <a class="text-blue-500" rel="stylesheet" href="https://github.com/laraveller/laravel-restaurant-reservation"> https://github.com/laraveller/laravel-restaurant-reservation</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
