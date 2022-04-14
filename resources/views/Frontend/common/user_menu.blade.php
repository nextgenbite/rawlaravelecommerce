<div class="well center-block text-center">
    <div class="well-header center-block ">
        <img src="{{asset(Auth::user()->profile_photo_path)}}" class="img-circle" alt="">
        <img id="showImage" style="height: 100px;width:100px"  class="img-circle box-shadow " src="{{(!empty($user->profile_photo_path))? url('uploads/user_images/'.$user->profile_photo_path) : url('uploads/no_image.jpg')}} " alt="User Avatar">
    </div>
    <div class="well-body">
        <h4 class="well-title">{{ Auth::user()->name }} </h4>
        <div class="well-text">
            <ul class="list-group list-group-flush">
                <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm btn-block">Home</a>
                
                <a href="{{ route('profile.show') }}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
                
                <a href="{{ route('change.password') }}" class="btn btn-primary btn-sm btn-block">Change Password </a>
                
                {{-- <a href="{{ route('my.orders') }}" class="btn btn-primary btn-sm btn-block">My Orders</a>
                
                <a href="{{ route('return.order.list') }}" class="btn btn-primary btn-sm btn-block">Return Orders</a>
                
                <a href="{{ route('cancel.orders') }}" class="btn btn-primary btn-sm btn-block">Cancel Orders</a> --}}
                
                <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a>
                                    
                                </ul>
    
        </div>
    </div>
</div>