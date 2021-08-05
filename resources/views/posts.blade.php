@extends('layouts.frontend.app')

@section('title','post')
 

@push('css')
    <link href="{{ asset('asset/frontend/posts/styles.css') }}" rel="stylesheet">
     <link href="{{ asset('asset/frontend/posts/responsive.css') }}" rel="stylesheet">
    <style>
         .slider-bg{
            height: 400px;
            width: 100%;
            background-image: url({{ asset('asset/frontend/images/slider-1.jpg') }});
            background-size: cover;
        }
        .favorite_posts{
            color: blue;
        }
    </style>
@endpush

@section('content')
<div class="slider-bg">
<div class="slider display-table center-text">
        <h1 class="title display-table-cell"><b>All POst</b></h1>
    </div>
</div>
    <section class="blog-area section">
        <div class="container">

            <div class="row">
            @foreach($posts as $row)
            <div class="col-lg-4 col-md-6">
                <div class="card h-100">
                    <div class="single-post post-style-1">

                        <div class="blog-image"><img src="{{Storage::disk('public')->url('post/'.$row->image)}}" alt="Blog Image"></div>

                        <a class="avatar" href="{{route('author.profile',$row->user->user_name)}}"><img src="{{Storage::disk('public')->url('profile/'.$row->user->photo)}}" alt="Profile
                                Image"></a>

                        <div class="blog-info">

                            <h4 class="title"><a href="{{ route('post.details',$row->id) }}"><b>{{ $row->title }}</b></a></h4>

                            <ul class="post-footer">
                                <li>
                                    @guest
                                    <a href="{{route('login')}}" id="guest"><i class="ion-heart"></i>{{$row->favorite_to_users->count()}}</a>
                                    @else
                                    <a class="{{ !Auth::user()->favorite_posts->where('pivot.post_id',$row->id)
                                                                      ->count()  == 0 ? 'favorite_posts' : ''}}" href="{{route('post.favorite',$row->id)}}"><i class="ion-heart"></i>{{$row->favorite_to_users->count()
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
<br><hr>
            {{ $posts->links() }}

        </div><!-- container -->
    </section><!-- section -->

@endsection

@push('js')

@endpush