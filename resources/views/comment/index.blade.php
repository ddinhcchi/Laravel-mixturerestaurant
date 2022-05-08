<x-guest-layout>
    <form class="mx-auto w-full max-w-lg mt-5" method="POST" action="{{ route('comments.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="flex flex-wrap -mx-3 mb-6">
          <div class="w-full px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">
              Tên
            </label>
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white @error('cmtcode') border-red-400 @enderror" id="name" name="name" type="text">
            @error('name')
              <div class="text-sm text-red-400">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <div class="flex flex-wrap -mx-3 mb-6">
          <div class="w-full px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="cmtcode">
              Mã đánh giá
            </label>
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white @error('cmtcode') border-red-400 @enderror" id="cmtcode" name="cmtcode" type="text" placeholder="Mã đánh giá trên hóa đơn của bạn">
            @error('cmtcode')
              <div class="text-sm text-red-400">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <div class="flex flex-wrap -mx-3 mb-6">
          <div class="w-full px-3 mb-6 md:mb-0">
              <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="star">
              Số sao
              </label>
              <div class="relative">
                  <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="star" name="star">
                      <option value="5">5</option>
                      <option value="4">4</option>
                      <option value="3">3</option>
                      <option value="2">2</option>
                      <option value="1">1</option>
                  </select>
              </div>
          </div>
        </div>

        <div class="flex flex-wrap -mx-3 mb-6">
          <div class="w-full px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="cmt">
              Lời bình
            </label>
            <textarea id="cmt" rows="3" name="cmt"
              class="shadow-sm focus:ring-indigo-500 appearance-none bg-gray-200 border py-2 px-3 text-base leading-normal transition duration-150 ease-in-out focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Hãy nói những điều tốt đẹp"></textarea>
            @error('cmt')
              <div class="text-sm text-red-400">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <div class="flex justify-center m-2 p-2">
          <button type="submit"
              class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-lg text-white">Gửi đánh giá</button>
        </div>
      </form>
</x-guest-layout>