@extends('admin.admindashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <div class="row profile-body">

        <!-- left wrapper start -->
          <div class="d-none d-md-block col-md-5 col-xl-5 left-wrapper">
            <div class="card rounded">
              <div class="card-body">
              <div class="d-flex align-items-center justify-content-between mb-2">
                        <div>
                            <img class="wd-100 rounded-circle" src="{{ (!empty($profileData->photo)) ? url('upload/admin_img/'.$profileData->photo) : url('upload/no_image.jpg') }}" alt="profile">
                            <span class="h4 ms-3">{{ $profileData->username }}</span>
                        </div>
                    </div>
                <div class="mt-3">
                  <label class="tx-11 fw-bolder mb-0 text-uppercase">NAME:</label>
                  <p class="text-muted">{{ $profileData-> name }}</p>
                </div>
                <div class="mt-3">
                  <label class="tx-11 fw-bolder mb-0 text-uppercase">EMAIL:</label>
                  <p class="text-muted">{{ $profileData-> email }}</p>
                </div>
                <div class="mt-3">
                  <label class="tx-11 fw-bolder mb-0 text-uppercase">PHONE:</label>
                  <p class="text-muted">{{ $profileData-> phone }}</p>
                </div>
                <div class="mt-3">
                  <label class="tx-11 fw-bolder mb-0 text-uppercase">ADDRESS:</label>
                  <p class="text-muted">{{ $profileData-> address }}</p>
                </div>
                <div class="mt-3">
                  <label class="tx-11 fw-bolder mb-0 text-uppercase">STATUS:</label>
                  <p class="text-muted">{{ $profileData-> status }}</p>
                </div>
                <div class="mt-3">
                  <label class="tx-11 fw-bolder mb-0 text-uppercase">ROLE:</label>
                  <p class="text-muted">{{ $profileData-> role }}</p>
                </div>
              </div>
            </div>
          </div>
        <!-- left wrapper end -->



        <!-- middle wrapper start -->
          <div class="d-none d-md-block col-md-7 col-xl-7 middle-wrapper">
            <div class="row">
              <div class="card">
              <div class="card-body">

								<h6 class="card-title">Change Password</h6>

								<form method="POST" action="{{ route('admin.update.password') }}" class="forms-sample">
                                         @csrf

                                    <div class="mb-3">
										<label for="exampleInputUsername1" class="form-label">Old Password</label>
										<input type="password" name="Old_Password" class="form-control" @error('Old_Password') is-invalid @enderror  id="Old_Password" autocomplete="off" >
                                        @error('Old_Password')
                                        <span class="text-danger" >{{$message}}</span>
                                        @enderror
									</div>

                                    <div class="mb-3">
										<label for="exampleInputUsername1" class="form-label">New Password</label>
										<input type="password" name="New_Password" class="form-control" @error('New_Password') is-invalid @enderror  id="New_Password" autocomplete="off" >
                                        @error('New_Password')
                                        <span class="text-danger" >{{$message}}</span>
                                        @enderror
									</div>

                                    <div class="mb-3">
										<label for="exampleInputUsername1" class="form-label">Confirm New Password</label>
										<input type="password" name="New_Password_confirmation" class="form-control" id="New_Password_confirmation" autocomplete="off" >
									</div>

									<button type="submit" class="btn btn-primary me-2">Save changes</button>
								</form>

              </div>
              </div>
            </div>
          </div>
    </div>

@endsection