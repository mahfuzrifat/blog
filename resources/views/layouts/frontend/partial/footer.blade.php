
	<footer>

		<div class="container">
			<div class="row">

				<div class="col-lg-4 col-md-6">
					<div class="footer-section">

						
						<p class="copyright">{{config('app.name')}} @ {{date('Y')}}. All rights reserved.</p>
						<p class="copyright">Designed by <a href="https://colorlib.com"
						                                    target="_blank">{{config('app.name')}}</a></p>
						<ul class="icons">
							<li><a href="#"><i class="ion-social-facebook-outline"></i></a></li>
							<li><a href="#"><i class="ion-social-twitter-outline"></i></a></li>
							<li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
							<li><a href="#"><i class="ion-social-vimeo-outline"></i></a></li>
							<li><a href="#"><i class="ion-social-pinterest-outline"></i></a></li>
						</ul>

					</div><!-- footer-section -->
				</div><!-- col-lg-4 col-md-6 -->

				<div class="col-lg-4 col-md-6">
						<div class="footer-section">
						<h4 class="title"><b>CATAGORIES</b></h4>
						<ul>
							@foreach($categories as $category)
							  <li><a href="{{route('category.posts',$category->id)}}">{{$category->name}}</a></li>
							 @endforeach
						</ul>

					</div><!-- footer-section -->
				</div><!-- col-lg-4 col-md-6 -->

				<div class="col-lg-4 col-md-6">
					<div class="footer-section">
 {{-- 
						<div class="">
						  <form action="{{ route('subscriber.store') }}" method="post">
						  	@csrf 
			                  <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
			                   @error('email')
			                        <span class="invalid-feedback" role="alert">
			                            <strong>{{ $message }}</strong>
			                        </span>
			                    @enderror
							<button class="submit-btn" type="submit"><i class="icon ion-ios-email-outline"></i></button>
						  </form>
						</div> --}}
						<div class="form-group">
                            <label for="exampleInputEmail2"><strong>Subscription Email</strong></label>
                            @if ($errors->any())
							    <div class="alert alert-danger">
							        <ul>
							            @foreach ($errors->all() as $error)
							                <li>{{ $error }}</li>
							            @endforeach
							        </ul>
							    </div>
							@endif
                            <form action="{{ route('subscriber.store') }}" method="post">
						       	@csrf 
                            <div class="input-group">
                           	
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                               
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">
                                        <button class="submit-btn" type="submit"><i class="icon ion-ios-email-outline"></i></button>
                                    </span>
                                </div>
                       
                            </div>
                                 </form>
                        </div> 
					</div><!-- footer-section -->
				</div><!-- col-lg-4 col-md-6 -->

			</div><!-- row -->
		</div><!-- container -->
	</footer>