@extends('Layout.app')
@section('content')
<!-- ======= Hero Section ======= -->
<section id="hero" class="shadow-sm">
    <div class="container ">
        <div class="row justify-content-between">
            <div class="col-lg-5 pt-5 pt-lg-0
             {{-- order-2 order-lg-1  --}}
             d-flex align-items-center pb-5">
                <div data-aos="zoom-out">
                    <h1 class="text-primary">StudyPadi</h1>
                    <p class="text-secondary">Build your knowledge with us, we are dedicated to make learning easy for you</p>
                    <div class="text-center text-lg-start">
                        <a href="#about" class="btn-get-started scrollto">Get Started</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <img class="w-100 h-100 rounded rounded-5" src="{{ asset('assets/img/3.jpg') }}" />
            </div>
        </div>
    </div>
</section><!-- End Hero -->

<main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container-fluid">

            <div class="row align-items-center justify-content-center">
                <div class="col-xl-5 col-lg-6 d-flex justify-content-center align-items-stretch" data-aos="fade-right">
                    <img src="{{ asset('assets/img/1.jpg') }}" class="img w-100 h-50 rounded-5" />
                </div>

                <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5" data-aos="fade-left">
                    <h3>Enim quis est voluptatibus aliquid consequatur fugiat</h3>
                    <p>Esse voluptas cumque vel exercitationem. Reiciendis est hic accusamus. Non ipsam et sed minima temporibus laudantium. Soluta voluptate sed facere corporis dolores excepturi. Libero laboriosam sint et id nulla tenetur. Suscipit aut voluptate.</p>

                    <div class="icon-box" data-aos="zoom-in" data-aos-delay="100">
                        <div class="icon"><i class="bx bx-fingerprint"></i></div>
                        <h4 class="title"><a href="">Lorem Ipsum</a></h4>
                        <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
                    </div>

                    <div class="icon-box" data-aos="zoom-in" data-aos-delay="200">
                        <div class="icon"><i class="bx bx-gift"></i></div>
                        <h4 class="title"><a href="">Nemo Enim</a></h4>
                        <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque</p>
                    </div>

                    <div class="icon-box" data-aos="zoom-in" data-aos-delay="300">
                        <div class="icon"><i class="bx bx-atom"></i></div>
                        <h4 class="title"><a href="">Dine Pad</a></h4>
                        <p class="description">Explicabo est voluptatum asperiores consequatur magnam. Et veritatis odit. Sunt aut deserunt minus aut eligendi omnis</p>
                    </div>

                </div>
            </div>

        </div>
    </section><!-- End About Section -->


    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
        <div class="container">

            <div class="row" data-aos="fade-up">

                <div class="col-lg-3 col-md-6">
                    <div class="count-box">
                        <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
                        <p>Happy Clients</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
                    <div class="count-box">
                        <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>
                        <p>Projects</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                    <div class="count-box">
                        <span data-purecounter-start="0" data-purecounter-end="1463" data-purecounter-duration="1" class="purecounter"></span>
                        <p>Hours Of Support</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                    <div class="count-box">
                        <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>
                        <p>Hard Workers</p>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Counts Section -->

</main><!-- End #main -->

<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-md-6">
                    <div class="footer-info">
                        <h3>StudyPadi</h3>
                    </div>
                </div>

                <div class="col-lg-6  col-md-6 footer-links">
                    <h4>Our Courses</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</footer><!-- End Footer -->

@endsection
