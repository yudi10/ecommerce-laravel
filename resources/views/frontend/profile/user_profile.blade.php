@extends('frontend.main_master')
@section('content')


<div class="body-content">
    <div class="container">
        <div class="row">

            <div class="col-md-2"><br>
                <img src="{{ (!empty($user->profile_photo_path))? url('upload/user_images/'.$user->profile_photo_path): url('upload/no_image.jpg') }}" alt="" class="card-img-top" style="border-radius: 50%" height="100%" width="100%"><br><br>
                <ul class="list-group list-group-flush">
                    <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm btn-block">Home</a>
                    <a href="{{ route('user.profile') }}" class="btn btn-warning btn-sm btn-block">Profile Update</a>
                    <a href="{{ route('change.password') }}" class="btn btn-warning btn-sm btn-block">Change Password</a>
                    <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a>
                </ul>
            </div> <!-- end col-md-2 -->

            <div class="col-md-2">
            
            
            </div> <!-- end col-md-2 -->

            <div class="col-md-6">
                <div class="card">
                    <h3 class="text-center"><span class="text-danger">Hallo...</span><strong>{{ Auth::user()->name }}</strong> Update Your Profile</h3>
                    <div class="card-body">
                        <form action="{{ route('user.profile.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Name <span></span></label>
                                <input type="text" name="name" class="form-control" value="{{ $user->name }}" >
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Email <span></span></label>
                                <input type="email" name="email" class="form-control" value="{{ $user->email }}" >
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Phone <span></span></label>
                                <input type="text" name="phone" class="form-control" value="{{ $user->phone }}" >
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">User Image <span></span></label>
                                <input type="file" name="profile_photo_path" class="form-control" >
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>                         

                        </form>
                    </div>
                </div>
            </div> <!-- end col-md-6 -->

        </div> <!-- end row -->
    </div> <!-- end container -->
</div> <!-- end body-containt -->




@endsection
