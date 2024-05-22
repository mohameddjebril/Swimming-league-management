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

								<h6 class="card-title">Update Admin Profile</h6>

								<form method="POST" action="{{ route('admin.profile.store') }}" class="forms-sample" enctype="multipart/form-data">
                                         @csrf

									<div class="mb-3">
										<label for="exampleInputUsername1" class="form-label">Username</label>
										<input type="text" name="username" class="form-control" id="exampleInputUsername1" autocomplete="off" value="{{ $profileData -> username }}">
									</div>
                                    <div class="mb-3">
										<label for="exampleInputUsername1" class="form-label">name</label>
										<input type="text" name="name" class="form-control" id="exampleInputUsername1" autocomplete="off" value="{{ $profileData -> name }}">
									</div>
                                    <div class="mb-3">
										<label for="exampleInputUsername1" class="form-label">email</label>
										<input type="text" name="email" class="form-control" id="exampleInputUsername1" autocomplete="off" value="{{ $profileData -> email }}">
									</div>
                                    <div class="mb-3">
										<label for="exampleInputUsername1" class="form-label">phone</label>
										<input type="text" name="phone" class="form-control" id="exampleInputUsername1" autocomplete="off" value="{{ $profileData -> phone }}">
									</div>
                                    <div class="mb-3">
										<label for="exampleInputUsername1" class="form-label">address</label>
										<input type="text" name="address" class="form-control" id="exampleInputUsername1" autocomplete="off" value="{{ $profileData -> address }}">
									</div>
                                    <div class="mb-3">
										<label class="form-label" for="formFile">photo</label>
										<input class="form-control" name="photo" type="file" id="image">                                       
									</div>

                                    <div class="mb-3">
                                        <img id="showImage" class="wd-80 rounded-circle" src="{{ (!empty($profileData->photo)) ? url('upload/admin_img/'.$profileData->photo) : url('upload/no_image.jpg') }}" alt="profile">
									</div>
									

									<div class="form-check mb-3">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
										<label class="form-check-label" for="exampleCheck1">
											Remember me
										</label>
									</div>
									<button type="submit" class="btn btn-primary me-2">Save changes</button>
								</form>

              </div>
              </div>
            </div>
          </div>
        <!-- middle wrapper end -->
        <!-- low wrapper start -->
        <!-- <div class="row">
					<div class="col-md-14 grid-margin stretch-card">
						<div class="card">
							<div class="card-body">
								<h6 class="card-title">Inputs</h6>
								<form>

									<div class="mb-3">
										<label for="exampleInputText1" class="form-label">Text Input</label>
										<input type="text" class="form-control" id="exampleInputText1" value="Amiah Burton" placeholder="Enter Name">
									</div>

									<div class="mb-3">
										<label for="exampleInputEmail3" class="form-label">Email Input</label>
										<input type="email" class="form-control" id="exampleInputEmail3" value="amiahburton@gmail.com" placeholder="Enter Email">
									</div>

									<div class="mb-3">
										<label for="exampleInputNumber1" class="form-label">Number Input</label>
										<input type="number" class="form-control" id="exampleInputNumber1" value="6473786">
									</div>

									<div class="mb-3">
										<label for="exampleInputPassword3" class="form-label">Password Input</label>
										<input type="password" class="form-control" id="exampleInputPassword3" value="amiahburton" placeholder="Enter Password">
									</div>

									<div class="mb-3">
										<label for="exampleInputDisabled1" class="form-label">Disabled Input</label>
										<input type="text" class="form-control" id="exampleInputDisabled1" disabled="" value="Amiah Burton">
									</div>

									<div class="mb-3">
										<label for="exampleInputPlaceholder" class="form-label">Placeholder</label>
										<input type="text" class="form-control" id="exampleInputPlaceholder" placeholder="Enter Your Name">
									</div>

									<div class="mb-3">
										<label for="exampleInputReadonly" class="form-label">Readonly</label>
										<input type="text" class="form-control" id="exampleInputReadonly" readonly="" value="Amiah Burton">
									</div>

									<div class="mb-3">
										<label for="exampleFormControlSelect1" class="form-label">Select Input</label>
										<select class="form-select" id="exampleFormControlSelect1">
											<option selected="" disabled="">Select your age</option>
											<option>12-18</option>
											<option>18-22</option>
											<option>22-30</option>
											<option>30-60</option>
											<option>Above 60</option>
										</select>
									</div>

									<div class="mb-3">
										<label for="exampleFormControlSelect2" class="form-label">Example multiple select</label>
										<select multiple="" class="form-select" id="exampleFormControlSelect2">
											<option>1</option>
											<option>2</option>
											<option>3</option>
											<option>4</option>
											<option>5</option>
											<option>6</option>
											<option>7</option>
											<option>8</option>
										</select>
									</div>

									<div class="mb-3">
										<label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
										<textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
									</div>

									<div class="mb-3">
										<label for="customRange1" class="form-label">Range Input</label>
										<input type="range" class="form-range" id="formRange1">
									</div>

                    <div class="mb-4">
										<div class="form-check mb-2">
                      <input type="checkbox" class="form-check-input" id="checkDefault">
											<label class="form-check-label" for="checkDefault">
												Default checkbox
											</label>
										</div>
										<div class="form-check mb-2">
                      <input type="checkbox" class="form-check-input" id="checkChecked" checked="">
											<label class="form-check-label" for="checkChecked">
												Checked
											</label>
										</div>
										<div class="form-check mb-2">
                      <input type="checkbox" class="form-check-input" id="checkDisabled" disabled="">
											<label class="form-check-label" for="checkDisabled">
												Disabled checkbox
											</label>
										</div>
										<div class="form-check">
                      <input type="checkbox" class="form-check-input" id="checkCheckedDisabled" disabled="" checked="">
											<label class="form-check-label" for="checkCheckedDisabled">
												Disabled checked
											</label>
										</div>
									</div>

                  <div class="mb-3">
										<div class="form-check form-check-inline">
                      <input type="checkbox" class="form-check-input" id="checkInline">
											<label class="form-check-label" for="checkInline">
												Inline checkbox
											</label>
										</div>
										<div class="form-check form-check-inline">
                      <input type="checkbox" class="form-check-input" id="checkInlineChecked" checked="">
											<label class="form-check-label" for="checkInlineChecked">
												Checked
											</label>
										</div>
										<div class="form-check form-check-inline">
                      <input type="checkbox" class="form-check-input" id="checkInlineDisabled" disabled="">
											<label class="form-check-label" for="checkInlineDisabled">
												Inline disabled checkbox
											</label>
										</div>
										<div class="form-check form-check-inline">
                      <input type="checkbox" class="form-check-input" id="checkInlineCheckedDisabled" disabled="" checked="">
											<label class="form-check-label" for="checkInlineCheckedDisabled">
												Disabled checked
											</label>
										</div>
									</div>
                  <div class="mb-4">
										<div class="form-check mb-2">
                      <input type="radio" class="form-check-input" name="radioDefault" id="radioDefault">
											<label class="form-check-label" for="radioDefault">
												Default
											</label>
										</div>
										<div class="form-check mb-2">
                      <input type="radio" class="form-check-input" name="radioDefault" id="radioDefault1">
											<label class="form-check-label" for="radioDefault1">
												Default
											</label>
										</div>
										<div class="form-check mb-2">
                      <input type="radio" class="form-check-input" name="radioSelected" id="radioSelected" checked="">
											<label class="form-check-label" for="radioSelected">
												Selected
											</label>
										</div>
										<div class="form-check mb-2">
                      <input type="radio" class="form-check-input" name="radioDisabled" id="radioDisabled" disabled="">
											<label class="form-check-label" for="radioDisabled">
												Disabled
											</label>
										</div>
										<div class="form-check">
                      <input type="radio" class="form-check-input" name="radioSelectedDisabled" id="radioSelectedDisabled" disabled="" checked="">
											<label class="form-check-label" for="radioSelectedDisabled">
												Selected and disabled
											</label>
										</div>
									</div>

                  <div class="mb-4">
										<div class="form-check form-check-inline">
                      <input type="radio" class="form-check-input" name="radioInline" id="radioInline">
											<label class="form-check-label" for="radioInline">
												Default
											</label>
										</div>
										<div class="form-check form-check-inline">
                      <input type="radio" class="form-check-input" name="radioInline" id="radioInline1">
											<label class="form-check-label" for="radioInline1">
												Default
											</label>
										</div>
										<div class="form-check form-check-inline">
                      <input type="radio" class="form-check-input" name="radioInlineSelected" id="radioInlineSelected" checked="">
											<label class="form-check-label" for="radioInlineSelected">
												Selected
											</label>
										</div>
										<div class="form-check form-check-inline">
                      <input type="radio" class="form-check-input" name="radioInlineDisabled" id="radioInlineDisabled" disabled="">
											<label class="form-check-label" for="radioInlineDisabled">
												Disabled
											</label>
										</div>
										<div class="form-check form-check-inline">
                      <input type="radio" class="form-check-input" name="radioInlineSelectedDisabled" id="radioInlineSelectedDisabled" disabled="" checked="">
											<label class="form-check-label" for="radioInlineSelectedDisabled">
												Selected and disabled
											</label>
										</div>
									</div>

									<div class="mb-3">
										<div class="form-check form-switch mb-2">
											<input type="checkbox" class="form-check-input" id="formSwitch1">
											<label class="form-check-label" for="formSwitch1">Toggle this switch element</label>
										</div>
										<div class="form-check form-switch">
											<input type="checkbox" class="form-check-input" disabled="" id="formSwitch2">
											<label class="form-check-label" for="formSwitch2">Disabled switch element</label>
										</div>
									</div>

									<div class="mb-3">
										<label class="form-label" for="formFile">File upload</label>
										<input class="form-control" type="file" id="formFile">
									</div>

									<button class="btn btn-primary" type="submit">Submit form</button>
								</form>
							</div>
						</div>
					</div>
		</div> -->
        <!-- low wrapper end -->
    </div>




<script type="text/javascript" >
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result)
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>





@endsection