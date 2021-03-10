<x-app-layout>
    <x-slot name="title">
        Got Work | Dashboard
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>


    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div>

    <div class="flex max-w-7xl mx-auto sm:px-6 lg:px-8 text-base">
        <div class="flex-shrink w-1/5 overflow-hidden shadow-sm sm:rounded-lg bg-white mr-4">

            <div class="project bg-gray-200 px-4 py-2">
               <p><i class="fa fa-file mr-4"></i> <span> Project </span> </p> 
            </div>


            <div class="contests px-4 py-2 mr-4">
               <p><i class="fa fa-trophy"></i> <span> Contests </span> </p> 
            </div>

        


            {{-- <div class="h-40 bg-gray-200 transition flex hover:shadow-2xl hover:bg-white pt-4" >
                <div class="registerIcon col-3">
                    <i class="fa fa-commenting textColor text-5xl mx-6"></i>
                </div>
                <h1> jksanjdfdnjfsdfndjfsdfjdsfjdfndsfdfdfjksdjfdsjfjdsfjnsdfndsnfndsfnj</h1>
                <div class="col-9 features-box">
                    <div class="featuresIcon homeNav h-5 float-left w-2 mt-2 ml-2"></div>
                    <h3 class="text-2xl textColor ml-6 font-bold"> Business Management</h3>
                    <p class="ml-6 textColor"> Business Planning, Feasibility study, SAP, Customer Service....  </p>
                </div>
            </div> --}}

                {{-- <h1>abcdef</h1> --}}

                {{-- <h1> jksanjdfdnjfsdfndjfsdfjdsfjdfndsfdfdfjksdjfdsjfjdsfjnsdfndsnfndsfnj</h1> --}}

        </div>

        <div class="flex-shrink w-4/5 overflow-hidden shadow-sm sm:rounded-lg bg-white mr-4 p-4">
            {{-- <div class="h-40 bg-gray-200 transition flex hover:shadow-2xl hover:bg-white pt-4" >
                <div class="registerIcon col-3">
                    <i class="fa fa-commenting textColor text-5xl mx-6"></i>
                </div>
                <h1> jksanjdfdnjfsdfndjfsdfjdsfjdfndsfdfdfjksdjfdsjfjdsfjnsdfndsnfndsfnj</h1>
                <div class="col-9 features-box">
                    <div class="featuresIcon homeNav h-5 float-left w-2 mt-2 ml-2"></div>
                    <h3 class="text-2xl textColor ml-6 font-bold"> Business Management</h3>
                    <p class="ml-6 textColor"> Business Planning, Feasibility study, SAP, Customer Service....  </p>
                </div>
            </div> --}}

                {{-- <h1> jksanjdfdnjfsdfndjfsdfjdsfjdfndsfdfdfjksdjfdsjfjdsfjnsdfndsnfndsfnj</h1> --}}

                <h1> 123456789</h1>

        </div>
    </div>

</x-app-layout>
