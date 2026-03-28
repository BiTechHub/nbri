@extends('admin.layouts.master')
@section('main-section')
<style>
  .btn-back{
    background: rgba(248,80,50,1);
    background: -webkit-linear-gradient(left, rgba(248,80,50,1) 0%, rgba(248,80,50,1) 54%, rgba(255,238,0,1) 100%);
    background: linear-gradient(to right, rgba(248,80,50,1) 0%, rgba(248,80,50,1) 54%, rgba(255,238,0,1) 100%);
    color: #fff;
  }

  .btn-back:hover{
    background: rgba(235,221,29,1);
    background: -webkit-linear-gradient(left, rgba(235,221,29,1) 0%, rgba(255,238,0,1) 0%, rgba(248,80,50,1) 46%, rgba(248,80,50,1) 100%);
    background: linear-gradient(to right, rgba(235,221,29,1) 0%, rgba(255,238,0,1) 0%, rgba(248,80,50,1) 46%, rgba(248,80,50,1) 100%);
    color: #fff;
  }
</style>

<div class="content-wrapper">
  <div class="container">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="d-flex align-items-center">
        <div class="mr-auto">
          <h3 class="page-title">Add Top Content</h3>
          <div class="d-inline-block align-items-center">
            <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                <li class="breadcrumb-item" aria-current="page">Home</li>
                <li class="breadcrumb-item active" aria-current="page">Top Content</li>
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
            <div class="box-body">
              <form action="{{ route('admin-panel.uploadtopcontent') }}" method="post" enctype="multipart/form-data">
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
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <h5>Content Type <span class="text-danger">*</span></h5>
                      <div class="controls">
                        <select name="con_type" id="con_type" class="form-control">
                          <option selected value="">--Please Select Content Type--</option>
                          <option value="Link">Link Content</option>
                          <option value="Pdf">Pdf Content</option>

                        </select>
                      </div>
                      @error('con_type') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <h5>Position<span class="text-danger">*</span></h5>
                      <div class="controls">
                        <input type="number" name="position" class="form-control" value="1">
                      </div>
                      @error('position') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <h5>Content Heading <span class="text-danger">*</span></h5>
                      <div class="controls">
                        <input type="text" name="heading" class="form-control">
                      </div>
                      @error('heading') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <h5>सामग्री शीर्षक <span class="text-danger">*</span></h5>
                      <div class="controls">
                        <input type="text" name="heading_hi" class="form-control">
                      </div>
                      @error('heading_hi') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror
                    </div>
                  </div>
                  <div class="col-12" id="pdtr">
                    <div class="row">
                      <div class="form-group col-6" >
                        <h5>Upload PDF <span class="text-danger">*</span></h5>
                        <div class="controls">
                          <input type="file" name="file" class="form-control">
                        </div>
                      </div>
                      <div class="form-group col-6" >
                        <h5>PDF अपलोड करें <span class="text-danger">*</span></h5>
                        <div class="controls">
                          <input type="file" name="file_hi" class="form-control">
                        </div>
                      </div>
                    </div>

                  </div>
                  <div class="col-12" id="edtr">
                    <div class="form-group">
                      <h5>Link <span class="text-danger">*</span></h5>
                      <div class="controls" >
                        <input type="text" name="link" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <h5>Background Color <span class="text-danger">*</span></h5>
                      <div class="controls">
                        <input type="color" name="background_color" class="form-control" value="#dc3545">
                      </div>
                      @error('background_color') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror
                    </div>
                  </div>


                  <div class="col-6">
                    <div class="form-group">
                      <h5>Text Color <span class="text-danger">*</span></h5>
                      <div class="controls">
                        <input type="color" name="text_color" class="form-control" value="#fbf9f9">
                      </div>
                      @error('text_color') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror
                    </div>

                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <div class="controls">
                        <input type="checkbox" id="effect" name="effect" value="btn-back">
                        <label for="effect" class="btn-back">Use Background Effect</label>
                      </div>
                      @error('effect') <div class="alert alert-danger mt-1 mb-1"> {{ $message }}</div> @enderror
                    </div>
                  </div>
                  <br>

                </div>
                <div class="text-xs-right">
                  <button type="submit" class="btn btn-info">Submit</button>
                </div>
              </form>
            </div>
          </div>

          <!-- /.box -->
          <div class="box mt-20">
            <div class="box-header">
              <h4 class="box-title">Manage Menu Item</h4>
            </div>
            <div class="box-body">
              <div class="table-responsive">
                <table id="complex_header" class="table table-striped table-bordered display" style="width:100%">
                  <thead>
                    <tr>
                      <th>Serial No.</th>
                      <th>Content Type</th>
                      <th>Content</th>
                      <th>Content(हिन्दी)</th>
                      <th>Action</th>
                    </tr>

                  </thead>
                  <tbody>
                    @php
                    $i=1;
                    @endphp
                    @foreach($content as $item)
                    <tr>
                      <td>{{$i}}</td>
                      <td>{{$item->con_type}}</td>
                      <td>
                        @if ($item->file)
                        <a href="{{url('/')}}/uploads/{{$item->file}}" target="_blank" class="btn @if($item->effect) {{$item->effect}} @endif" style="background-color: {{ $item->background_color }}; color: {{ $item->text_color }};">{{$item->heading}} <span><img src="/img/pdf.png" alt=""></span></a>
                        @else
                        <a href="{{$item->link}}" target="_blank" class="btn @if($item->effect) {{$item->effect}} @endif" style="background-color: {{ $item->background_color }}; color: {{ $item->text_color }};">{{$item->heading}}</a>
                        @endif
                      </td>
                      <td>
                        @if ($item->file_hi)
                        <a href="{{url('/')}}/uploads/{{$item->file_hi}}" target="_blank" class="btn @if($item->effect) {{$item->effect}} @endif" style="background-color: {{ $item->background_color }}; color: {{ $item->text_color }};" >{{$item->heading_hi}} <span><img src="/img/pdf.png" alt=""></span></a>
                        @else
                        <a href="{{ $item->link }}" target="_blank" class="btn @if($item->effect) {{$item->effect}} @endif" style="background-color: {{ $item->background_color }}; color: {{ $item->text_color }};">{{ $item->heading_hi }}</a>

                        @endif
                      </td>
                      <td>
                          <a href="{{url('/')}}/admin-panel/topcontentedit/{{$item->id}}" class=" btn btn-info">Edit</a>
                          
                          <a href="{{url('/')}}/admin-panel/topcondel/{{$item->id}}" class="delete btn btn-danger">Delete</a>
                          </td>

                    </tr>
                    @php
                    $i++;
                    @endphp
                    @endforeach
                  </tbody>

                </table>
              </div>
            </div>
          </div>
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
  $(document).ready(function () {
    $('#edtr').hide();
    $('#pdtr').hide();
    $('#con_type').on('change', function () {
      if(this.value == 'Link'){
        $('#edtr').show();
        $('#pdtr').hide();
      }else{
        $('#edtr').hide();
        $('#pdtr').show();
      }
    });
  });

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
</script>
@endsection
