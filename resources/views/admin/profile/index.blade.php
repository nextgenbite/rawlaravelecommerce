@extends('admin.master')
@section('admin')
<div class="container-full">

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-black" style="background: {{asset('backend/images/gallery/full/10.jpg')}} center center;">
              <h3 class="widget-user-username">Name: {{$index->name}}</h3>
              <h6 class="widget-user-desc">Email: {{$index->email}}</h6>
              <a href="{{route('admin.profile.edit')}} " class="btn btn-rounded btn-success md5 pull-right">Edit Profile</a>
            </div>
            <div class="widget-user-image">
              <img class="rounded-circle" src="{{(!empty($index->profile_photo_path))? url('uploads/admin_images/'.$index->profile_photo_path) : url('uploads/no_image.jpg')}} " alt="User Avatar">
              
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-4">
                  <div class="description-block">
                    <h5 class="description-header">12K</h5>
                    <span class="description-text">FOLLOWERS</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 br-1 bl-1">
                  <div class="description-block">
                    <h5 class="description-header">550</h5>
                    <span class="description-text">FOLLOWERS</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                  <div class="description-block">
                    <h5 class="description-header">158</h5>
                    <span class="description-text">TWEETS</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
      
    </div>
</section>
<!-- /.content -->
  </div>
@endsection