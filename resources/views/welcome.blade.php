@extends('layouts.frontend.app')
@section('title','Home')

@push('css')
<link href="{{ asset('asset/frontend/front_page/styles.css') }}" rel="stylesheet">
<link href="{{ asset('asset/frontend/front_page/responsive.css') }}" rel="stylesheet">
<style>
    .favorite_posts {
        color: cornflowerblue;
    }

</style>
@endpush

@section('content')
{{--  <div class="main-slider">
    <div class="swiper-container position-static" data-slide-effect="slide" data-autoheight="false" data-swiper-speed="500" data-swiper-autoplay="10000" data-swiper-margin="0" data-swiper-slides-per-view="4" data-swiper-breakpoints="true" data-swiper-loop="true">
        <div class="swiper-wrapper">
            @foreach($categories as $row)
            <div class="swiper-slide">
                <a class="slider-category" href="{{route('category.posts',$row->id)}}">
                    <div class="blog-image"><img src="{{Storage::disk('public')->url('category/slider/'.$row->photo)}}" alt="Blog Image"></div>
                    <div class="category">
                        <div class="display-table center-text">
                            <div class="display-table-cell">
                                <h3><b>{{ $row->name }}</b></h3>
                            </div>
                        </div>
                    </div>
                </a>
            </div><!-- swiper-slide -->
            @endforeach

        </div><!-- swiper-wrapper -->

    </div><!-- swiper-container -->

</div><!-- slider -->  --}}

<section class="blog-area section">
    <div class="container">

        <div class="row">
            @foreach($post as $row)
            <div class="col-lg-4 col-md-6">
                <div class="card h-100">
                    <div class="single-post post-style-1">

                        <div class="blog-image"><img src="{{Storage::disk('public')->url('post/'.$row->image)}}" alt="Blog Image"></div>
                        <a class="avatar" href="{{-- {{route('author.profile',$row->user->user_name)}} --}}"><img src="{{Storage::disk('public')->url('profile/'.$row->user->photo)}}" alt="Profile
                                Image"></a>

                        <div class="blog-info">

                            <h4 class="title"><a href="{{ route('post.details',$row->id) }}"><b>{{ $row->title }}</b></a></h4>

                            <ul class="post-footer">
                                <li>
                                    @guest
                                    <a href="{{route('login')}}" id="guest"><i class="ion-heart"></i>{{$row->favorite_to_users->count()}}</a>
                                    @else
                                    <a class="{{ !Auth::user()->favorite_posts->where('pivot.post_id',$row->id)->count()  == 0 ? 'favorite_posts' : ''}}" href="{{route('post.favorite',$row->id)}}"><i class="ion-heart"></i>{{$row->favorite_to_users->count()
                                        }}</a>
                                    @endguest
                                </li>
                                <li><a href="#"><i class="ion-chatbubble"></i>{{$row->comments->count()}}</a></li>
                                <li><a href="#"><i class="ion-eye"></i>{{$row ->view_count}}</a></li>
                            </ul>
                        </div><!-- blog-info -->
                    </div><!-- single-post -->

                </div><!-- card -->
            </div><!-- col-lg-4 col-md-6 -->
            @endforeach
        </div><!-- row -->
    <br>
        {{$post->links()}}

    </div><!-- container -->
</section><!-- section -->
@endsection

@push('js')

@endpush
