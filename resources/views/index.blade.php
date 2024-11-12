@extends('layouts.layout')

@section('content')
    <div class="container-fluid bg-primary px-0 px-md-5 mb-5">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div class="row align-items-center px-3">
            <div class="col-lg-6 text-center text-lg-left">
                <h4 class="text-white mb-4 mt-5 mt-lg-0">Keep Your Study Abroad Dreams Alive</h4>
                <h1 class="display-3 font-weight-bold text-white">
                    Guide to Studying Abroad
                </h1>
                <p class="text-white mb-4">
                    Studying abroad can be a life-changing experience, offering students the opportunity to gain a global
                    perspective, develop new skills, and immerse themselves in a different culture.<br>It can be a
                    transformative experience, providing both personal and professional benefits. By carefully planning and
                    preparing, you can make the most of your time in a new country and return with invaluable experiences
                    and memories.
                </p>
               
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <img class="img-fluid mt-5" src="img/DanStephenLibrary.jpeg" alt="" />
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- Facilities Start -->
    <div class="container-fluid pt-5">
        <div class="container pb-3">
            <div class="row">
                <div class="col-lg-4 col-md-6 pb-1">
                    <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px">
                        <i class="flaticon-050-fence h1 font-weight-normal text-primary mb-3"></i>
                        <div class="pl-4">
                            <h4>AUTHENTICATION</h4>

                            <p class="m-0">
                                Authentication is a process used to verify your Document and this is done at the Minstry of
                                Education & Foreign Affairs -> [Nigerians]
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 pb-1">
                    <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px">
                        <i class="flaticon-022-drum h1 font-weight-normal text-primary mb-3"></i>
                        <div class="pl-4">
                            <a href="https://appointment.bmeia.gv.at/" target="_blank">
                                <h4>VERIFICATION</h4>
                            </a>
                            <p class="m-0">
                                Verification is one of the Most Important stage. <br>
                                You have to book an appointment with the Embassy. <br> OR <br>
                                Austria embassy in Nigeria has officially partner with VFS Global for appointment for
                                documents legalization.



                                click here for appointment <a href="https://visa.vfsglobal.com/nga/en/aut" target="_blank">VFS Appointment</a>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 pb-1">
                    <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px">
                        <i class="flaticon-030-crayons h1 font-weight-normal text-primary mb-3"></i>
                        <div class="pl-4">
                            <h4>LEGALIZATION</h4>
                            <p class="m-0">
                                This is done after Verification. Legalization is simply making your document usable in
                                Austria.
                                <br>
                                Applicant from other Countries shoul contact the Austrian Embassy closest to them for more information on Legalization.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 pb-1">
                    <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px">
                        <i class="flaticon-017-toy-car h1 font-weight-normal text-primary mb-3"></i>
                        <div class="pl-4">
                            <h4>ADMISSION APPLICATION</h4>
                            <p class="m-0">
                                The admission application process can be competitive and demanding, but with careful
                                planning and preparation, you can present a strong application. Research your options,
                                understand the requirements, and ensure all your documents are in order. Good luck with your
                                application journey!
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 pb-1">
                    <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px">
                        <i class="flaticon-025-sandwich h1 font-weight-normal text-primary mb-3"></i>
                        <div class="pl-4">
                            <h4>RESIDENCE PERMIT</h4>
                            <p class="m-0">
                                Securing a residence permit is essential for studying in Austria or any European country. By
                                understanding the requirements, gathering the necessary documents, and following the correct
                                procedures, you can ensure a smooth application process. Remember to apply well in advance
                                and stay informed about any changes in immigration policies.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 pb-1">
                    <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px">
                        <i class="flaticon-047-backpack h1 font-weight-normal text-primary mb-3"></i>
                        <div class="pl-4">
                            <h4>VISA/FLIGHT</h4>
                            <p class="m-0">
                                This is the last stage of the process.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Facilities Start -->

    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <img class="img-fluid rounded mb-5 mb-lg-0" src="img/DanStephen.jpeg" alt="" />
                </div>
                <div class="col-lg-7">
                    <p class="section-title pr-5">
                        <span class="pr-2">Learn About Us</span>
                    </p>
                    <h1 class="mb-4">Best Guide for your Studies in Austria & Europe</h1>
                    <p>

                        Studying in Austria and Europe can be a highly rewarding experience, offering access to high-quality
                        education, diverse cultural experiences, and a wealth of travel opportunities.
                    </p>

                </div>
                <a href="{{ url('about') }}" target="_blank" class="btn btn-primary mt-2 py-2 px-4">Learn More</a>
            </div>
        </div>
    </div>
    </div>
    <!-- About End -->


    <!-- Registration Start -->
    <div id="appointment" class="container-fluid py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 mb-5 mb-lg-0">
                    <p class="section-title pr-5">
                        <span class="pr-2">Book Appointment</span>
                    </p>
                    <h1 class="mb-4">Book Appointment with any of the Ambassadors</h1>
                    <p>
                        Book an appointment if you want to talk with any of our Ambassador. For Questions!<br>
                        We will respond with an appropriate date and time.
                        <br>

                    </p>

                    <!-- <a href="" class="btn btn-primary mt-4 py-2 px-4">Book Now</a> -->
                </div>
                <div class="col-lg-5">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="card border-0">
                        <div class="card-header bg-secondary text-center p-4">
                            <h1 class="text-white m-0">Book Appointment</h1>
                        </div>
                        <div class="card-body rounded-bottom bg-primary p-5">
                            <form action="{{ url('dataInsert') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control border-0 p-4" name="name"
                                        placeholder="Your Name" required="required" />
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control border-0 p-4" name="email"
                                        placeholder="Your Email" required="required" />
                                </div>
                                <div class="form-group">
                                    <select class="custom-select border-0 px-4" name="ambassador" style="height: 47px">
                                        <option selected>Choose an Ambassador</option>
                                        <option value="Benedict Anemba">Benedict Anemba</option>
                                        <option value="Daniel">Daniel Sesan</option>
                                        <option value="Stephen">Mary Farma</option>
                                        <option value="Malachi">Malachi Gblee</option>
                                        <option value="Thessy">Peter Ohwoka</option>
                                    </select>
                                </div>
                                <div>
                                    <button class="btn btn-secondary btn-block border-0 py-3" type="submit">
                                        Book Now
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Registration End -->

    <!-- Team Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="text-center pb-2">
                <p class="section-title px-5">
                    <span class="px-2">Our Ambassadors</span>
                </p>
                <h1 class="mb-4">Meet Our Ambassadors</h1>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-3 text-center team mb-5">
                    <div class="position-relative overflow-hidden mb-4" style="border-radius: 100%">
                        <img class="img-fluid w-100" src="img/CEO.jpg" alt="" />
                        <div
                            class="team-social d-flex align-items-center justify-content-center w-100 h-100 position-absolute">
                            <a class="btn btn-outline-light text-center mr-2 px-0" style="width: 38px; height: 38px"
                                href="https://x.com/anembaben" target="_blank"><i class="fab fa-twitter"></i></a>
                            <!-- <a class="btn btn-outline-light text-center mr-2 px-0" style="width: 38px; height: 38px"
                                    href="#"><i class="fab fa-facebook-f"></i></a> -->
                            <a class="btn btn-outline-light text-center px-0" style="width: 38px; height: 38px"
                                href="https://www.linkedin.com/in/btanemba/" target="_blank"><i
                                    class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <h4>Benedict Anemba</h4>
                    <i>Founder</i><br>
                    <h>Masters in Communication Engineering - CAUS</h><br>
                    <h>Junior Software Developer</h><br>
                    <h>Instagram Social Media Ambassador for CAUS
                        <h /><br>
                        <h>Entreprenuer</h>
                </div>
                <div class="col-md-6 col-lg-3 text-center team mb-5">
                    <div class="position-relative overflow-hidden mb-4" style="border-radius: 100%">
                        <img class="img-fluid w-100" src="img/danny.jpeg" style="height: 200px;" alt="" />
                        <div
                            class="team-social d-flex align-items-center justify-content-center w-100 h-100 position-absolute">
                            <a class="btn btn-outline-light text-center px-0" style="width: 38px; height: 38px"
                                href="https://www.linkedin.com/in/ilesanmi-sesan-daniel-89518326?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <h4>Daniel Ilesanmi</h4>
                    <i>RF Component and Software Development  Engineer<br>
                        Electronics Embedded systems design <br>
                        Social Media Ambassador for CUAS <br>
                        Entrepreneur</i>
                </div>
                <div class="col-md-6 col-lg-3 text-center team mb-5">
                    <div class="position-relative overflow-hidden mb-4" style="border-radius: 100%">
                        <img class="img-fluid w-100" src="img/Malachi.jpg" style="height: 200px;" alt="" />
                        <div
                            class="team-social d-flex align-items-center justify-content-center w-100 h-100 position-absolute">
                            <a class="btn btn-outline-light text-center px-0" style="width: 38px; height: 38px"
                                href="https://www.linkedin.com/in/malachi-gblee-90127114b?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=ios_app" target="_blank" ><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <h4>Malachi Gblee</h4>
                    <i>Masters of Science in Global Business</i><br>
                    <i>Location: Switzerland</i><br>
                    Work with the Liberian permanent mission as a researcher

                </div>
                <div class="col-md-6 col-lg-3 text-center team mb-5">
                    <div class="position-relative overflow-hidden mb-4" style="border-radius: 100%">
                        <img class="img-fluid w-100" src="img/Mary.jpeg" style="height: 200px;"alt="" />
                        <div
                            class="team-social d-flex align-items-center justify-content-center w-100 h-100 position-absolute">
                            <a class="btn btn-outline-light text-center px-0" style="width: 38px; height: 38px"
                                href="https://www.linkedin.com/in/mary-farma-13448879?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=ios_app"
                                target="_blank"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <h4>Mary Farma</h4>
                    <i>Bachelor in Finance & Accounting</i><br>
                    <i>Location: Netherlands</i>
                </div>
                <div class="col-md-6 col-lg-3 text-center team mb-5">
                    <div class="position-relative overflow-hidden mb-4" style="border-radius: 100%">
                        <img class="img-fluid w-100" src="img/Nneena.jpeg" style="height: 200px;"alt="" />
                        <div
                            class="team-social d-flex align-items-center justify-content-center w-100 h-100 position-absolute">
                            <a class="btn btn-outline-light text-center px-0" style="width: 38px; height: 38px"
                                href="https://www.linkedin.com/in/mary-farma-13448879?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=ios_app"
                                target="_blank"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <h4>Uzoma Nnenna Okey </h4>
                    <i>Free-lance Virtual Assistant</i><br>
                    <i>Admission Process Assistant</i><br>
                    <i>Location: Nigeria</i>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->


@endsection
