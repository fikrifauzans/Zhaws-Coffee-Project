{{-- Sidebar --}}
<div class="w-72 bg-gray-800 h-screen  fixed top-0 left-0 font-Slab z-10 overflow-hidden drop-shadow-2xl	">
    <div id="menu" class=" brand w-full flex-col  pb-4 mt-10 absolute ">
        <h1 class="text-white ml-8 text-2xl tracking-widest font-semibold ">ZHAWS <span
                class="text-red-600 ">COFFEE</span>
        </h1>
        <small class="tracking-widest font-normal ml-16 text-white">Crafted With Quality</small>
        <ul class="mt-8 border-t-2 border-white pt-2">
            <a href="#">
                <li
                    class="trans text-lg text-white  py-2 hover:text-red-500 hover:bg-white mx-2 rounded-lg ease-out duration-300">
                    <span class="ml-4"><i class=" fas fa-chart-line text-l "></i>&nbsp;
                        Dashboard</span>
                </li>
            </a>
            <a href="{{ route('admin.HomeProduct') }}">
                <li
                    class="trans text-lg text-white  py-2 hover:text-red-500 hover:bg-white mx-2 rounded-lg ease-out duration-300">
                    <span class="ml-4"><i class="fab fa-buffer"></i>&nbsp;
                        Product</span>
                </li>
            </a>
        </ul>
        <div class="logout absolute z-10  mt-96 ml-24 ">
            <a class="text-white text-xl " href="#">
                Logout <i class="fas fa-sign-out-alt "></i></a>
        </div>
    </div>
</div>
