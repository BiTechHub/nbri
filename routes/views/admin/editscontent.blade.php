@extends('admin.layouts.master')
@section('main-section')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.css">
<div class="content-wrapper">
  <div class="container">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="d-flex align-items-center">
        <div class="mr-auto">
          <h3 class="page-title">Edit Site Content</h3>
          <div class="d-inline-block align-items-center">
            <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                <li class="breadcrumb-item" aria-current="page">Home</li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{url('/')}}/admin-panel/managesitecontent" style="color:red">Manage Site Content</a></li>
              </ol>
            </nav>
          </div>
        </div>

      </div>
    </div>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">


          <!-- /.box -->

          <div class="box">

            <!-- /.box-header -->
            @if($scontent->con_type == 'Text')
            <div class="box-body">
              <form action="{{ route('admin-panel.updatesitecontent') }}" method="post" enctype="multipart/form-data">
                @if(session('status'))
                <div class="alert alert-success">
                  {{ session('status') }}
                </div>
                @endif
                @if(session('success'))
                <div class="alert alert-success">
                  {{ session('success') }}
                </div>
                @endif
                @if(session('fail'))
                <div class="alert alert-success">
                  {{ session('fail') }}
                </div>
                @endif
                @csrf
                <div class="form-group">
                  <h5>Content Heading <span class="text-danger">*</span></h5>
                  <div class="controls">
                    <input type="text" name="heading" value="{{$scontent->heading}}" class="form-control">
                    <input type="hidden" name="id" value="{{$scontent->id}}" class="form-control">
                  </div>
                </div>
                <!-- <div class="form-group">
                  <h5>Change Related Image (Single Image Only) <span class="text-danger">*</span></h5>
                  <div class="controls">
                    <input type="file" name="image" class="form-control">
                  </div>
                  
                  <div class="controls">
<img src="{{url('/')}}/uploads/{{$scontent->image}}" style="width:100%;height:300px;">
</div> 
                  
                </div>-->
                <div class="form-group">
                  <h5>Main Menu Name <span class="text-danger">*</span></h5>
                  <div class="controls">
                    <select name="main" id="main_cat" class="form-control">
                      <option selected>-Select Main Category-</option>
                      @foreach($swt as $ddt)
                      <option @if($ddt->id == $scontent->main_cat) selected @endif value="{{$ddt->id}}">{{$ddt->menu_name}}</option>
                      @endforeach
                    </select> </div>
                </div>

                <div class="form-group" id="mee">
                  <h5>Sub Menu Name <span class="text-danger">*</span></h5>
                  <div class="controls">
                    @php $submen = DB::table('submenus')->get(); @endphp
                    <select name="sub" id="sub" class="form-control sub">
                      @foreach($submen as $submene)
                      <option value="{{$submene->id}}" @if($submene->id == $scontent->sub_cat) selected @endif>{{$submene->sub_name}}</option>
                      @endforeach
                    </select> 
                  
                  </div>
                </div>
               <!-- <div class="form-group" id="chdl">
                  <h5>Child Menu Name <span class="text-danger">*</span></h5>
                  <div class="controls">
                    <select name="child" id="child" class="form-control child">
                      <option value="{{$scontent->child_cat}}" selected>{{$scontent->child_cat}}</option>
                    </select> </div>
                </div>-->
                
                
                <!-- <textarea class="textarea" id="editor1" name="content" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$scontent->content}}</textarea> -->
                
                <textarea class="textarea" id="summernote"  name="content" placeholder="Place some text here" style="width: 100%; height: 400px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$scontent->content}}</textarea>
                <br>
                
                <div class="text-xs-right">
                  <button type="submit" class="btn btn-info">Submit</button>
                </div>
              </form>
            </div>
            @else
            <div class="box-body">
              <form action="{{ route('admin-panel.updatesitecontent') }}" method="post" enctype="multipart/form-data">
                @if(session('status'))
                <div class="alert alert-success">
                  {{ session('status') }}
                </div>
                @endif
                @if(session('success'))
                <div class="alert alert-success">
                  {{ session('success') }}
                </div>
                @endif
                @if(session('fail'))
                <div class="alert alert-success">
                  {{ session('fail') }}
                </div>
                @endif
                @csrf
                <div class="form-group">
                  <h5>Content Heading <span class="text-danger">*</span></h5>
                  <div class="controls">
                    <input type="text" name="heading" value="{{$scontent->heading}}" class="form-control">
                    <input type="hidden" name="id" value="{{$scontent->id}}" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <h5>Change Related File (Single File Only) <span class="text-danger">*</span></h5>
                  <div class="controls">
                    <input type="file" name="image" class="form-control">
                  </div>
                  <div class="controls" style="padding:10px;">
                    <a href="{{url('/')}}/uploads/{{$scontent->image}}" target="_blank" download>View/Download Old File</a>
                  </div>
                </div>
                <div class="form-group">
                  <h5>Main Menu Name <span class="text-danger">*</span></h5>
                  <div class="controls">
                    <select name="main" id="main_cat" class="form-control">
                      <option selected>-Select Main Category-</option>
                      @foreach($swt as $ddt)
                      <option @if($ddt->id == $scontent->main_cat) selected @endif value="{{$ddt->id}}">{{$ddt->menu_name}}</option>
                      @endforeach
                    </select> </div>
                </div>

                <div class="form-group" id="mee">
                  <h5>Sub Menu Name <span class="text-danger">*</span></h5>
                  <div class="controls">
                    @php $submen = DB::table('submenus')->get(); @endphp
                    <select name="sub" id="sub" class="form-control sub">
                       @foreach($submen as $submene)
                      <option value="{{$submene->id}}" @if($submene->id == $scontent->sub_cat) selected @endif>{{$submene->sub_name}}</option>
                      @endforeach
                    </select> </div>
                </div>
                <!--<div class="form-group" id="chdl">
                  <h5>Child Menu Name <span class="text-danger">*</span></h5>
                  <div class="controls">
                    <select name="child" id="child" class="form-control child">
                      <option value="{{$scontent->child_cat}}" selected>{{$scontent->child_cat}}</option>
                    </select> </div>
                </div>-->

                <br>
                <div class="text-xs-right">
                  <button type="submit" class="btn btn-info">Submit</button>
                </div>
              </form>
            </div>
            @endif
          </div>

          <!-- /.box -->

        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
</div>
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">

  $('.delete').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
    swal({
      title: 'Are you sure?',
      text: 'This record and it`s details will be permanantly deleted!',
      icon: 'warning',
      buttons: ["Cancel", "Yes!"],
    }).then(function(value) {
      if (value) {
        window.location.href = url;
      }
    });
  });
  
  $(document).ready(function () {
    $('#main_cat').on('change', function () {
        var Cat = this.value;

        $.ajax({
            url: "{{ url('/') }}/subcatfetch/" + Cat, 
            dataType: 'json',
            success: function (result) {
                if ($.isEmptyObject(result)) {
                    $('#mee').hide();
                    $('#chdl').hide();
                } else {
                    $('#mee').show();
                }

                var msg = '<option value="">--Select Sub Category--</option>';
                for (var i = 0; i < result.length; i++) {
                    msg = msg + '<option value="' + result[i].id + '">' + result[i].sub_name + '</option>';
                }
                $("#sub").html(msg);
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText); // Log error messages for debugging
            }
        });
    });
});
  
  
  $(document).ready(function () {
    $('#sub').on('change', function () {
      var Cat = this.value;

      $.ajax({
        url: "{{url('childcatfetch')}}",
        type: "POST",
        data: {
          cat: Cat,
          _token: '{{csrf_token()}}'
        },
        dataType: 'json',
        success: function (result) {
          if($.isEmptyObject(result.states)){
            $('#chdl').hide();
          }else{
            $('#chdl').show();
          }
          $('.child').html('<option value="">Select child Category</option>');
          $.each(result.states, function (key, value) {
            $(".child").append('<option value="' + value + '">' + value + '</option>');
          });
          // $('.ss').selectpicker();
          // $('#city-dd').html('<option value="">Select City</option>');
        }
      });
    });
  });
</script>
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.js"></script>
 <script>
$('#summernote').summernote({
        placeholder: '',
        tabsize: 2,
        height: 400,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });
	  </script>
	 @endsection
