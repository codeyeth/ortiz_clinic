@extends('layouts.public_app')

@section('content')

<!-- Home -->

<div class="home d-flex flex-column align-items-start justify-content-end">
    <div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="{{ asset ('drpro/images/blog_6.jpg') }}" data-speed="0.8"></div>
    <div class="home_overlay"><img src="{{ asset ('drpro/images/home_overlay.png') }}" alt=""></div>
    <div class="home_container">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="home_content">
                        <div class="home_title">Blog</div>
                        <div class="home_text">Know the latest news and upates in Ortiz.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Blog -->

<div class="blog">
    <div class="container">
        <div class="row">
            <div class="col">
                
                <!-- Blog Post -->
                <div class="blog_post">
                    <div class="blog_post_image"><img src="{{ asset ('drpro/images/blog_1.jpg') }}" alt=""></div>
                    <div class="blog_post_date d-flex flex-column align-items-center justify-content-center">
                        <div class="date_day">19</div>
                        <div class="date_month">June</div>
                        <div class="date_year">2018</div>
                    </div>
                    <div class="blog_post_title"><a href="#">5 Reasons why you should choose a plastic surgeon</a></div>
                    <div class="blog_post_info">
                        <ul class="d-flex flex-row align-items-center justify-content-center">
                            <li>by <a href="#">Dr. James Smith</a></li>
                            <li>in <a href="#">Surgery</a></li>
                            <li><a href="#">2 Comments</a></li>
                        </ul>
                    </div>
                    <div class="blog_post_text text-center">
                        <p>Odio ultrices ut. Etiam ac erat ut enim maximus accumsan vel ac nisl. Duis feugiat bibendum orci, non elementum urna. Cras sit amet sapien aliquam, fermentum dolor non, blandit purus. Donec blandit purus vitae eros fringilla accumsan. Nunc feugiat purus et posuere ornare. Vivamus molestie sem pretium ligula efficitur, vitae auctor tortor vestibulum. Ut interdum ante neque, sed vestibulum lorem dictum quis.</p>
                    </div>
                    <div class="blog_post_button text-center"><div class="button button_1 ml-auto mr-auto"><a href="#">read more</a></div></div>
                </div>
                
            </div>
        </div>
        <div class="row page_nav_row">
            <div class="col">
                <div class="page_nav">
                    <ul class="d-flex flex-row align-items-center justify-content-center">
                        <li class="active"><a href="#">01.</a></li>
                        <li><a href="#">02.</a></li>
                        <li><a href="#">03.</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection