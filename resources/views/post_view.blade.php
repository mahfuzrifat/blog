@extends('layouts.frontend.app')

@section('title')
{{ $post->title }}
@endsection

@push('css')
    <link href="{{ asset('asset/frontend/single/styles.css') }}" rel="stylesheet">
     <link href="{{ asset('asset/frontend/single/responsive.css') }}" rel="stylesheet">
    <style>
        .header-bg{
            height: 400px;
            width: 100%;
            background-image: url({{ Storage::disk('public')->url('post/'.$post->image) }});
            background-size: cover;
        }
        .favorite_posts{
            color: blue;
        }
    </style>
@endpush

@section('content')
  
    <div class="header-bg">
        
    </div><!-- slider -->

    <section class="post-area section">
        <div class="container">

            <div class="row">

                <div class="col-lg-8 col-md-12 no-right-padding">

                    <div class="main-post">

                        <div class="blog-post-inner">

                            <div class="post-info">

                                <div class="left-area">
                                    <a class="avatar" href="{{-- {{route('author.profile',$post->user->user_name)}} --}}"><img
                                            src="{{ Storage::disk('public')->url('profile/'.$post->user->photo) }}"></a>
                                </div>

                                <div class="middle-area">
                                    <a class="name" href="#"><b>{{ $post->user->name }} on </b></a>
                                    <h6 class="date">{{ $post->created_at->format('F d,Y') }}</h6>
                                </div>

                            </div><!-- post-info -->

                            <h3 class="title"><a href="#"><b>{{ $post->title }}</b></a></h3>

                            <div class="para">
                                {!! html_entity_decode($post->body) !!}
                            </div>

                            <ul class="tags">
                                @foreach($post->tags as $tag)
                                   <li><a href="{{route('tag.posts',$tag->id)}}">{{ $tag->name }}</a></li>
                                @endforeach
                            </ul>
                        </div><!-- blog-post-inner -->

                        <div class="post-icons-area">
                            <ul class="post-icons">
                              <li>
                                    @guest
                                    <a href="{{route('login')}}" target="_blank" id="guest"><i class="ion-heart"></i>{{$post->favorite_to_users->count()}}</a>
                                    @else
                                    <a class="{{ !Auth::user()->favorite_posts->where('pivot.post_id',$post->id)
                                                                      ->count()  == 0 ? 'favorite_posts' : ''}}" href="{{route('post.favorite',$post->id)}}"><i class="ion-heart"></i>{{$post->favorite_to_users->count()
                                        }}</a>
                                    @endguest
                                </li>
                                <li><a href="#"><i class="ion-chatbubble"></i>{{$post->comments->count()}}</a></li>
                                <li><a href="#"><i class="ion-eye"></i>{{$post ->view_count}}</a></li>
                            </ul>
                                <ul class="icons">
                                    <li>SHARE : </li>
                                    <li><a href=""><i class="ion-social-facebook"></i></a></li>
                                    <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                    <li><a href="#"><i class="ion-social-pinterest"></i></a></li>
                                </ul>
                        
                            <div class="post-footer post-info">

                             

                        </div><!-- post-info -->


                    </div><!-- main-post -->
                </div><!-- col-lg-8 col-md-12 -->

                <div class="col-lg-4 col-md-12 no-left-padding">

                    <div class="single-post info-area">

                        <div class="sidebar-area about-area">
                            <h4 class="title"><b>ABOUT BONA</b></h4>
                            <p>{{ $post->user->about }}</p>
                        </div>

                        <div class="tag-area">

                            <h4 class="title"><b>CATEGORY</b></h4>
                            <ul>
                                @foreach($post->categories as $row)
                                <li><a href="{{route('category.posts',$row->id)}}">{{ $row->name }}</a></li>
                                @endforeach
                            </ul>
                        </div><!-- subscribe-area -->
                    </div><!-- info-area -->
                </div><!-- col-lg-4 col-md-12 -->
            </div><!-- row -->
        </div><!-- container -->
    </section><!-- post-area -->


    <section class="recomended-area section">
        <div class="container">
            <div class="row">
                @foreach($randomposts as $randompost)
                    <div class="col-lg-4 col-md-6">
                        <div class="card h-100">
                            <div class="single-post post-style-1">

                                <div class="blog-image"><img src="{{ Storage::disk('public')->url('post/'.$randompost->image) }}" alt="{{ $randompost->title }}"></div>

                                <a class="avatar" href="{{-- {{route('author.profile',$randompost->user->user_name)}} --}}"><img src="{{
                                 Storage::disk('public')->url('profile/'.$randompost->user->photo) }}" alt="Profile Image"></a>

                                <div class="blog-info">

                                    <h4 class="title"><a href="{{ route('post.details',$randompost->id) }}"><b>{{$randompost->title }}</b></a></h4>

                                    <ul class="post-footer">
                                        <li>
                                    @guest
                                    <a href="{{route('login')}}" id="guest"><i class="ion-heart"></i>{{$randompost->favorite_to_users->count()}}</a>
                                    @else
                          <a class="{{ !Auth::user()->favorite_posts
                              ->where('pivot.post_id',$randompost->id)
                              ->count()  == 0 ? 'favorite_posts' : ''}}" 
                              href="{{route('post.favorite',$randompost->id)}}">
                              <i class="ion-heart"></i>{{$randompost->favorite_to_users->count()}}</a>
                                    @endguest
                                </li>
                                <li><a href="#"><i class="ion-chatbubble"></i>{{$randompost->comments->count()}}</a></li>
                                <li><a href="#"><i class="ion-eye"></i>{{$randompost ->view_count}}</a></li>
                                    </ul>

                                </div><!-- blog-info -->
                            </div><!-- single-post -->
                        </div><!-- card -->
                    </div><!-- col-lg-4 col-md-6 -->
                @endforeach
            </div><!-- row -->

        </div><!-- container -->
    </section>

    <section class="comment-section">
        <div class="container">
            <h4><b>POST COMMENT</b></h4>
            <div class="row">

                <div class="col-lg-8 col-md-12">
                    <div class="comment-form">
                        @guest
                        <div class="col-sm-12">
                            <a href="{{ route('login') }}" class="btn btn-info" id="comment"><b>POST COMMENT</b></a>
                        </div>
                        @else
                         <form action="{{ route('comment.store',$post->id) }}" method="post">
                            @csrf
                            <div class="row">  
                                <div class="col-sm-12">
                                    <textarea name="comment" rows="2" class="text-area-messge form-control"
                                        placeholder="Enter your comment" aria-required="true" aria-invalid="false" required></textarea >
                                </div><!-- col-sm-12 -->
                                <div class="col-sm-12">
                                    <button class="submit-btn" type="submit"><b>POST COMMENT</b></button>
                                </div><!-- col-sm-12 -->

                            </div><!-- row -->
                        </form>
                        @endguest
                       
                    </div><!-- comment-form -->

                    <h4><b>COMMENTS({{ $post->comments->count() }})</b></h4> 
                    @foreach($post->comments as $comment)
                    <div class="commnets-area ">
                        <div class="comment">
                            <div class="post-info">
                                <div class="left-area">
                                    <a class="avatar" href="#"><img src="{{ Storage::disk('public')->url('profile/'.$comment->user->photo) }}" alt="Profile Image"></a>
                                </div>
                                <div class="middle-area">
                                    <a class="name" href="#"><b>{{ $comment->user->name }},</b></a>
                                    <h6 class="date">   {{ $comment->created_at->diffForHumans() }}</h6>
                                </div>
                                
                            </div><!-- post-info -->

                            <p>{{ $comment->comment }}</p>

                        </div>

                    </div><!-- commnets-area -->
                    @endforeach
                     
                </div><!-- col-lg-8 col-md-12 -->

            </div><!-- row -->

        </div><!-- container -->
    </section>
@endsection

@push('js')

@endpush