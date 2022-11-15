@extends('admin.admin_master')
@section('admin')
<script
  src="https://code.jquery.com/jquery-3.6.1.min.js"
  integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
  crossorigin="anonymous"></script>


<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Profile</h4>
                        <!-- List一覧 -->
                        <!-- -----------------------------146617270317...のような区切り文字をboundaryと呼び、
                        この区切りを使って複数のパートに分割することからマルチパートと呼ばれている -->
                        <!-- https://mugenup-tech.hatenadiary.com/entry/2014/08/28/100910 -->
                        <!-- enctype指定ありでは、Content-DispositionやContent-Typeなど添付ファイルに関する情報とともに、
                        ファイルの本文の情報が存在する -->
                        <form method="POST" action="{{ route('store.profile') }}" enctype="multipart/form-data">
                        @csrf
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input name="name" class="form-control" type="text" value="{{ $editData->name }}" id="example-text-input">
                                </div>
                            </div><!-- end row -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input name="email" class="form-control" type="text" value="{{ $editData->email }}" id="example-text-input">
                                </div>
                            </div><!-- end row -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">User Name</label>
                                <div class="col-sm-10">
                                    <input name="username" class="form-control" type="text" value="{{ $editData->username }}" id="example-text-input">
                                </div>
                            </div><!-- end row -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Profile Image</label>
                                <div class="col-sm-10">
                                    <input name="profile_image" class="form-control" type="file" id="image">
                                </div>
                            </div><!-- end row -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img id="showImage" class="rounded avatar-lg" src="{{  asset('backend/') }}/assets/images/small/img-5.jpg" alt="Card image cap">
                                </div>
                            </div><!-- end row -->
                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Profile">
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src', e.target.result)
            }
            let test = reader.readAsDataURL(e.target.files['0']);
            console.log(test);//undefined
        })
    })
</script>

@endsection