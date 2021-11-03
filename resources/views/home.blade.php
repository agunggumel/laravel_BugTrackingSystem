@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>
   <!-- Profile Image -->

            <div class="box-body box-profile">
                <center>
                         <img class="profile-user-img img-responsive img-circle" src="images/perlu.png" alt="User profile picture">
                </center>

              <h3 class="profile-username text-center">{{Auth::User()->name}}</h3>

              <p class="text-muted text-center">Software Engineer</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Email       :</b> <a class="pull-right">{{Auth::User()->email}}</a>
                </li>
                <li class="list-group-item">
                  <b>Hak Akses   :</b> <a class="pull-right">{{Auth::User()->role}}</a>
                </li>

              </ul>






            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

            </div>
        </div>
    </div>
</div>
@endsection

