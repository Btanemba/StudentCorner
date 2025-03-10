@extends('layouts.layout')

@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-primary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
            <h3 class="display-3 font-weight-bold text-white">Contact Us</h3>
            <div class="d-inline-flex text-white">
                <p class="m-0"><a class="text-white" href="{{ url('/') }}">Home</a></p>
                <p class="m-0 px-2">/</p>
                <p class="m-0">Contact Us</p>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- Contact Start -->
    <div class="container-fluid pt-5">
        <div class="container">
         <!-- Success Message -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Error Message -->
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
            <div class="text-center pb-2">
                <p class="section-title px-5">
                    <span class="px-2">Get In Touch</span>
                </p>
                <h1 class="mb-4">Contact Us For Any Query</h1>
            </div>
            <div class="row">
                <div class="col-lg-7 mb-5">
                    <div class="contact-form">
                        <div id="success"></div>
                       <form action="{{ route('contact.send') }}" method="post" name="sentMessage" id="contactForm" novalidate="novalidate">
    @csrf
    <div class="control-group">
        <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required="required" data-validation-required-message="Please enter your name" />
        <p class="help-block text-danger"></p>
    </div>
    <div class="control-group">
        <input type="email" class="form-control" id="email" name="email" placeholder="Your Email" required="required" data-validation-required-message="Please enter your email" />
        <p class="help-block text-danger"></p>
    </div>
    <div class="control-group">
        <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required="required" data-validation-required-message="Please enter the subject" />
        <p class="help-block text-danger"></p>
    </div>
    <div class="control-group">
        <textarea class="form-control" rows="6" id="message" placeholder="Message" name="message" required="required" data-validation-required-message="Please enter your message"></textarea>
        <p class="help-block text-danger"></p>
    </div>
    <div>
        <button class="btn btn-primary py-2 px-4" type="submit" id="sendMessageButton">Send</button>
    </div>
</form>

                    </div>

                </div>
                <div class="col-lg-5 mb-5">
                    <p>
                        We'd love to hear from you! Whether you have a question about our services, need assistance, or just
                        want to provide feedback, our team is here to help.
                    </p>

                    <div class="d-flex">
                        <i class="fa fa-envelope d-inline-flex align-items-center justify-content-center bg-primary text-secondary rounded-circle"
                            style="width: 45px; height: 45px"></i>
                        <div class="pl-3">
                            <h5>Email</h5>
                            <p>anembaben@gmail.com</p>
                        </div>
                    </div>
                    <div class="d-flex">
                  <i
                    class="fa fa-phone-alt d-inline-flex align-items-center justify-content-center bg-primary text-secondary rounded-circle"
                    style="width: 45px; height: 45px"
                  ></i>
                  <div class="pl-3">
                    <h5>Phone</h5>
                    <p>+2349023250180</p>
                  </div>
                </div>
                    <div class="d-flex">
                        <i class="far fa-clock d-inline-flex align-items-center justify-content-center bg-primary text-secondary rounded-circle"
                            style="width: 45px; height: 45px"></i>
                        <div class="pl-3">
                            <h5>Opening Hours</h5>
                            <strong>Monday - Friday</strong>
                            <p class="m-0">08:00 AM - 4:00 PM</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
@endsection
