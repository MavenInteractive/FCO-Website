@extends('layouts.master')
@section('content')

<div class="container content">
    <div class="row">
      <div class="large-8 medium-centered columns">
            <div class="logo-container">
                <div id="kv-avatar-errors-1" class="center-block" style="width:800px;display:none"></div>
            </div>
            <div class="about">
                <div class="row">
                    <div class="large-6 medium-centered columns">
                        @if(Session::has('error'))
                            <p style="color: #fff;">{!! Session::get('error') !!}</p>
                        @endif
                        <form action="/edit-profile/{{$profile->id}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <?php if(isset($profile->photo)){
                                $image = 'http://api.fightcallout.com/api/v1.0/uploads/'.$profile->photo;
                            } else {
                                $image = '/img/profile-placeholder.jpg';
                            } ?>
                            <div class="kv-avatar center-block" style="width:200px" id="img-placeholder" data-img="{{$image}}">
                                <input id="avatar-1" name="photo" type="file" class="file-loading">
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" value="{{$profile->first_name}}">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" value="{{$profile->last_name}}">
                            </div>
                            <div class="form-group">
                                <select name="gender" class="form-control">
                                    <option value="">Gender</option>
                                    <option value="male" <?php echo $profile->gender == 'male' ? 'selected' : '' ?>>Male</option>
                                    <option value="female" <?php echo $profile->gender == 'female' ? 'selected' : '' ?>>Female</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="role_id" class="form-control">
                                    <option value="">Role</option>
                                    @foreach($roles as $role)
                                        <option value="{{$role->id}}" <?php echo $profile->role_id == $role->id ? 'selected' : '' ?>>{{$role->description}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="category_id" class="form-control">
                                    <option value="">Fight Style</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" <?php echo $profile->category_id == $category->id ? 'selected' : '' ?>>{{$category->description}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="country_id" class="form-control">
                                    <option value="">Country</option>
                                    @foreach($countries as $country)
                                        <option value="{{$country->id}}" <?php echo $profile->country_id == $country->id ? 'selected' : '' ?>>{{$country->description}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" name="birth_date" id="datepicker" placeholder="Birth Date" value="{{$profile->birth_date}}">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{$profile->email}}">
                            </div>

                            <div class="row">
                                <div class="small-6 columns">
                                    <button type="reset" class="button btn-default send-btn">Cancel</button>
                                </div>
                                <div class="small-6 columns">
                                    <button type="submit" class="button btn-default send-btn">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
      </div>
    </div>
</div>


@endsection
