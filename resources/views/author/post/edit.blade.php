 @extends('layouts.backend.app')
@section('title','Update-Post')

@push('css')
  <link rel="stylesheet" href="{{ asset('asset/backend/plugins/html5-editor/bootstrap-wysihtml5.css') }}" />
    <link href="{{asset('asset/backend/plugins/select2/dist/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('asset/backend/plugins/switchery/dist/switchery.min.css')}}" rel="stylesheet" />
    <link href="{{asset('asset/backend/plugins/bootstrap-select/bootstrap-select.min.css')}}" rel="stylesheet" />
    <link href="{{asset('asset/backend/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')}}" rel="stylesheet" />
    <link href="{{asset('asset/backend/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css')}}" rel="stylesheet" />
    <link href="{{asset('asset/backend/plugins/multiselect/css/multi-select.css')}}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
<div class="container-fluid">
  
</div>
 <div class="card">
<div class="card-body">
    <div class="container-fluid">
        <h4 class="card-title"><strong>Update Post</strong><span style="margin-left: 10px;" class="badge badge-danger">{{-- {{ $tag->count() }} --}}</span> <a href="{{ route('author.post.index') }}" class="btn btn-warning btn-sm" style="float: right;"><i class="fa fa-check"></i> Back</a></h4>
      </div>
    <form action="{{ route('author.post.update',$post->id) }}" method="post" enctype="multipart/form-data">
      @csrf
        <div class="form-row">
            <div class="col-md-6 mb-3">
              <label><strong>Post Title</strong></label>
              <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $post->title }}" placeholder="title" required>
              @error('title')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
             <div class="col-md-6 mb-3">
                 <label><strong>Select Category</strong></label>
                <select class="select2 m-b-10 select2-multiple" style="width: 100%" multiple="multiple" name="categories[]" data-placeholder="Choose" required>
                    <optgroup label="Select Your Proper Category">
                      @foreach($categories as $cat)
                        <option 
                        @foreach($post->categories as $row)
                        {{ $row->id == $cat->id ? 'selected':'' }}
                        @endforeach
                         value="{{ $cat->id }}">{{ $cat->name }}</option> 
                        @endforeach
                    </optgroup> 
                </select> 
              </div>
             
        </div>
        <div class="form-row">
            <div class="col-md-6 mb-3">
               <label><strong>Post Image</strong> <i class="fas fa-arrow-alt-circle-right"></i></label>
               <input type="file" name="photo" >
            </div> 
             <div class="col-md-6 mb-3">
                 <label><strong>Select Tags</strong></label>
                <select class="select2 m-b-10 select2-multiple" style="width: 100%" multiple="multiple" name="tags[]" data-placeholder="Choose" required>
                    <optgroup label="Select Your Proper Tag">
                      @foreach($tags as $row)
                        <option 
                        @foreach($post->tags as $wow)
                        {{ $wow->id == $row->id ? 'selected':'' }}
                        @endforeach
                        value="{{ $row->id }}">{{ $row->name }}</option>
                     @endforeach    
                    </optgroup> 
                </select> 
              </div>
             </div>
              <div class="form-row">
            <div class="col-md-12 mb-3 ">
               <label><strong>Body</strong></label>
               <div class="form-group">
                    <textarea class="textarea_editor form-control @error('body') is-invalid @enderror" rows="10" placeholder="Enter text ..." name="body">{!! $post->body !!}</textarea>

                    @error('body')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror

                </div>
            </div>
          </div>
        
        <div class="form-group">
            <div>
              <input class="form-check-input" type="checkbox" value="1" id="invalidCheck2" name="p_status" {{ $post->p_status == 1 ? 'checked': '' }} >
              <label class="form-check-label" for="invalidCheck2">
                Avaiable Status
              </label>
            </div>
        </div>
        <button class="btn btn-primary" type="submit">Update</button>
       
    </form>
</div>
</div>
@endsection

@push('js')
 <script src="{{asset('asset/backend/plugins/switchery/dist/switchery.min.js')}}"></script>
    <script src="{{asset('asset/backend/plugins/select2/dist/js/select2.full.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('asset/backend/plugins/bootstrap-select/bootstrap-select.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('asset/backend/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>
    <script src="{{asset('asset/backend/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js')}}" type="text/javascript"></script>
    <script src="{{asset('asset/backend/plugins/dff/dff.js')}}" type="text/javascript"></script>
    <script type="text/javascript" src="{{asset('asset/backend/plugins/multiselect/js/jquery.multi-select.js')}}"></script>
    <script>
    $(function() {
        // Switchery
        var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        $('.js-switch').each(function() {
            new Switchery($(this)[0], $(this).data());
        });
        // For select 2
        $(".select2").select2();
        $('.selectpicker').selectpicker();
        //Bootstrap-TouchSpin
        $(".vertical-spin").TouchSpin({
            verticalbuttons: true
        });
        var vspinTrue = $(".vertical-spin").TouchSpin({
            verticalbuttons: true
        });
        if (vspinTrue) {
            $('.vertical-spin').prev('.bootstrap-touchspin-prefix').remove();
        }
        $("input[name='tch1']").TouchSpin({
            min: 0,
            max: 100,
            step: 0.1,
            decimals: 2,
            boostat: 5,
            maxboostedstep: 10,
            postfix: '%'
        });
        $("input[name='tch2']").TouchSpin({
            min: -1000000000,
            max: 1000000000,
            stepinterval: 50,
            maxboostedstep: 10000000,
            prefix: '$'
        });
        $("input[name='tch3']").TouchSpin();
        $("input[name='tch3_22']").TouchSpin({
            initval: 40
        });
        $("input[name='tch5']").TouchSpin({
            prefix: "pre",
            postfix: "post"
        });
        // For multiselect
        $('#pre-selected-options').multiSelect();
        $('#optgroup').multiSelect({
            selectableOptgroup: true
        });
        $('#public-methods').multiSelect();
        $('#select-all').click(function() {
            $('#public-methods').multiSelect('select_all');
            return false;
        });
        $('#deselect-all').click(function() {
            $('#public-methods').multiSelect('deselect_all');
            return false;
        });
        $('#refresh').on('click', function() {
            $('#public-methods').multiSelect('refresh');
            return false;
        });
        $('#add-option').on('click', function() {
            $('#public-methods').multiSelect('addOption', {
                value: 42,
                text: 'test 42',
                index: 0
            });
            return false;
        });
        $(".ajax").select2({
            ajax: {
                url: "https://api.github.com/search/repositories",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        q: params.term, // search term
                        page: params.page
                    };
                },
                processResults: function(data, params) {
                    // parse the results into the format expected by Select2
                    // since we are using custom formatting functions we do not need to
                    // alter the remote JSON data, except to indicate that infinite
                    // scrolling can be used
                    params.page = params.page || 1;
                    return {
                        results: data.items,
                        pagination: {
                            more: (params.page * 30) < data.total_count
                        }
                    };
                },
                cache: true
            },
            escapeMarkup: function(markup) {
                return markup;
            }, // let our custom formatter work
            minimumInputLength: 1,
            //templateResult: formatRepo, // omitted for brevity, see the source of this page
            //templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
        });
    });
    </script>
    <script src="{{ asset('asset/backend/plugins/html5-editor/wysihtml5-0.3.0.js') }}"></script>
    <script src="{{ asset('asset/backend/plugins/html5-editor/bootstrap-wysihtml5.js') }}"></script>
    <script>
    $(document).ready(function() {

        $('.textarea_editor').wysihtml5();


    });
    </script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="{{asset('asset/backend/plugins/styleswitcher/jQuery.style.switcher.js')}}"></script>
@endpush