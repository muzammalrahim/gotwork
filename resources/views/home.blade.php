@extends('layouts.main')

@section('content')
    <!-- Slider Start -->
    <div class="carousel relative shadow-2xl bg-white">
        <div class="carousel-inner relative overflow-hidden w-full">
            <!--Slide 1-->
            <input class="carousel-open" type="radio" id="carousel-1" name="carousel" aria-hidden="true" hidden="" checked="checked">
            <div class="carousel-item absolute opacity-0" style="height:65vh;">
                <img src="{{ asset('images/image1.jpg') }}">
                {{-- <div class="block h-full w-full bg-indigo-500 text-white text-5xl text-center">Slide 1</div> --}}
            </div>
            <label for="carousel-3" class="prev control-1 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-red-500 leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
            <label for="carousel-2" class="next control-1 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-red-500 leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>

            <!--Slide 2-->
            <input class="carousel-open" type="radio" id="carousel-2" name="carousel" aria-hidden="true" hidden="">
            <div class="carousel-item absolute opacity-0" style="height:65vh;">
                {{-- <div class="block h-full w-full bg-orange-500 text-white text-5xl text-center">Slide 2</div> --}}
                <img src="{{ asset('images/image2.jpg') }}">
            </div>
            <label for="carousel-1" class="prev control-2 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-red-500 leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
            <label for="carousel-3" class="next control-2 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-red-500 leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>

            <!--Slide 3-->
            <input class="carousel-open" type="radio" id="carousel-3" name="carousel" aria-hidden="true" hidden="">
            <div class="carousel-item absolute opacity-0" style="height:65vh;">
                {{-- <div class="block h-full w-full bg-green-500 text-white text-5xl text-center">Slide 3</div> --}}
                <img src="{{ asset('images/image3.jpg') }}">

            </div>
            <label for="carousel-2" class="prev control-3 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-red-500 leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
            <label for="carousel-1" class="next control-3 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-red-500 leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>

            <!-- Add additional indicators for each slide-->
            <ol class="carousel-indicators">
                <li class="inline-block mr-3">
                    <label for="carousel-1" class="carousel-bullet cursor-pointer block text-4xl text-white hover:text-red-500">•</label>
                </li>
                <li class="inline-block mr-3">
                    <label for="carousel-2" class="carousel-bullet cursor-pointer block text-4xl text-white hover:text-red-500">•</label>
                </li>
                <li class="inline-block mr-3">
                    <label for="carousel-3" class="carousel-bullet cursor-pointer block text-4xl text-white hover:text-red-500">•</label>
                </li>
            </ol>
        </div>
    </div>
    <!-- Slider End -->
    <!-- Services Start -->
    <div class="services max-w-full bg-gray-100">
        <div class="px-32 pt-20">
            <h2 class="text-4xl font-bold flex"> Our Services <span class="servicesLine"></span></h2>
        </div>
        <div class="shape2 absolute left-20 animate-bounce transition">
            <img src="{{ asset('images/shapes/shape2.png') }}">
        </div>
        <div class="container mx-auto px-24 pt-20">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-3">

                <div class="sm:mb-6 registerbox">
                    <div class="mainDiv h-96 shadow-2xl bg-gray-200 mr-4 box1 transition" >
                        <div class="registerIcon">
                            <i class="fa fa-cubes textColor text-6xl ml-6 mt-12"></i>
                        </div>
                        <h3 class="text-xl textColor ml-6 mt-5 font-bold"> Register as freelance  </h3>
                        <p class="servicesLine float-none my-5 ml-6"></p>
                        <p class="ml-6 textColor"> There are many variations of dummy that passages of Lorem Ipsum  </p>
                        <div class="button absolute">
                            <button class="registerButton bg-red-500 py-2 px-6 text-white ml-6 rounded-full mt-6 hover:bg-red-600 transition">Register</button>
                        </div>
                    </div>
                </div>
                <div class="sm:mb-6 registerbox">
                    <div class="mainDiv h-96 shadow-2xl bg-gray-200 mr-4 box2 transition" >
                        <div class="registerIcon">
                            <i class="fa fa-american-sign-language-interpreting textColor text-6xl ml-6 mt-12"></i>
                        </div>
                        <h3 class="text-xl textColor ml-6 mt-5 font-bold"> Post your project </h3>
                        <p class="servicesLine float-none my-5 ml-6"></p>
                        <p class="ml-6 textColor"> Post about the work to be completed and the right freelancers will come your way.  </p>
                        <div class="button absolute">
                            <button class="registerButton bg-red-500 py-2 px-6 text-white ml-6 rounded-full mt-6 hover:bg-red-600 transition">Register</button>
                        </div>
                    </div>
                </div>
                <div class="sm:mb-6 registerbox">
                    <div class="mainDiv h-96 shadow-2xl bg-gray-200 mr-4 box3 transition">
                        <div class="registerIcon">
                            <i class="fa fa-cc-visa textColor text-6xl ml-6 mt-12"></i>
                        </div>
                        <h3 class="text-xl textColor ml-6 mt-5 font-bold"> Safe Payments  </h3>
                        <p class="servicesLine float-none my-5 ml-6"></p>
                        <p class="ml-6 textColor"> Secured payment methods are done with utmost privacy.</p>
                        <div class="button absolute">
                            <button class="registerButton bg-red-500 py-2 px-6 text-white ml-6 rounded-full mt-6 hover:bg-red-600 transition">Register</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Services End -->
    <!-- Features Start -->
    <section id="ourfeatures" class="relative pb-16 bg-gray-100">
        <div class="services max-w-full">
            <div class="px-32 pt-20">
                <h2 class="text-4xl font-bold flex mb-5"> What we do <span class="servicesLine"></span></h2>
                <p>We are here to help create a group of experts to connect together and make money by joining our platform and offer their services to different companies and project owners.</p>
            </div>
            <div class="shape2 absolute left-20 animate-bounce transition">
                <img src="{{ asset('images/shapes/shape2.png') }}">
            </div>
            <div class="container mx-auto px-4 md:px-24 lg:px-24 pt-20">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3">
                    <div class="featurBorder hover:border-none">
                        <div class="h-40 bg-gray-200 transition flex hover:shadow-2xl hover:bg-white pt-4" >
                            <div class="registerIcon col-3">
                                <i class="fa fa-wrench textColor text-5xl mx-6"></i>
                            </div>
                            <div class="col-9 features-box">
                                <div class="featuresIcon homeNav h-5 float-left w-2 mt-2 ml-2"></div>
                                <h3 class="text-2xl textColor ml-6 font-bold"> Engineering</h3>
                                <p class="ml-6 textColor"> Mechanical, Civil and Electrical consultancy. Interior design. CAD drawing, CAM, CAE....  </p>
                            </div>
                        </div>
                    </div>
                    <div class="featurBorder hover:border-none">
                        <div class="h-40 bg-gray-200 transition flex hover:shadow-2xl hover:bg-white pt-4" >
                            <div class="registerIcon col-3">
                                <i class="fa fa-commenting textColor text-5xl mx-6"></i>
                            </div>
                            <div class="col-9 features-box">
                                <div class="featuresIcon homeNav h-5 float-left w-2 mt-2 ml-2"></div>
                                <h3 class="text-2xl textColor ml-6 font-bold"> Business Management</h3>
                                <p class="ml-6 textColor"> Business Planning, Feasibility study, SAP, Customer Service....  </p>
                            </div>
                        </div>
                    </div>
                    <div class="featurBorder hover:border-none">
                        <div class="h-40 bg-gray-200 transition flex hover:shadow-2xl hover:bg-white pt-4" >
                            <div class="registerIcon col-3">
                                <i class="fa fa-code textColor text-5xl mx-6"></i>
                            </div>
                            <div class="col-9 features-box">
                                <div class="featuresIcon homeNav h-5 float-left w-2 mt-2 ml-2"></div>
                                <h3 class="text-2xl textColor ml-6 font-bold"> IT & Telecommunication</h3>
                                <p class="ml-6 textColor"> Graphic design, Web development, Software development, Quality assurance.  </p>
                            </div>
                        </div>
                    </div>
                    <div class="featurBorder hover:border-none">
                        <div class="h-40 bg-gray-200 transition flex hover:shadow-2xl hover:bg-white pt-4" >
                            <div class="registerIcon col-3">
                                <i class="fa fa-area-chart textColor text-5xl mx-6"></i>
                            </div>
                            <div class="col-9 features-box">
                                <div class="featuresIcon homeNav h-5 float-left w-2 mt-2 ml-2"></div>
                                <h3 class="text-2xl textColor ml-6 font-bold"> Training Education </h3>
                                <p class="ml-6 textColor">Presentation, Tutors, Lecturers, Trainers.. </p>
                            </div>
                        </div>
                    </div>
                    <div class="featurBorder hover:border-none">
                        <div class="h-40 bg-gray-200 transition flex hover:shadow-2xl hover:bg-white pt-4" >
                            <div class="registerIcon col-3">
                                <i class="fa fa-bookmark textColor text-5xl mx-6"></i>
                            </div>
                            <div class="col-9 features-box">
                                <div class="featuresIcon homeNav h-5 float-left w-2 mt-2 ml-2"></div>
                                <h3 class="text-2xl textColor ml-6 font-bold">Marketing & social media</h3>
                                <p class="ml-6 textColor">social media marketing, Public relation, Marketing planning, SAM, SEO...</p>
                            </div>
                        </div>
                    </div>
                    <div class="featurBorder hover:border-none">
                        <div class="h-40 bg-gray-200 transition flex hover:shadow-2xl hover:bg-white pt-4" >
                            <div class="registerIcon col-3">
                                <i class="fa fa-child textColor text-5xl mx-6"></i>
                            </div>
                            <div class="col-9 features-box">
                                <div class="featuresIcon homeNav h-5 float-left w-2 mt-2 ml-2"></div>
                                <h3 class="text-2xl textColor ml-6 font-bold">Administrative</h3>
                                <p class="ml-6 textColor">Content Writing and editing, Personal assistant, virtual personal assistant, Data entry...</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Features End -->
@endsection
