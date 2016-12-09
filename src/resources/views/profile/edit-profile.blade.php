@extends('home')

@section('content')

    @include('pages.partials.profilenavigation')

    <div class="container">

        <div class="col-md-12">

            <div class="col-md-2"></div>

            <div class="col-md-8">

                <h2 class="ui center aligned icon header" id="Edit-Profile-Header">
                    <i class="settings icon"></i>
                    Мэдээллээ засах
                </h2>

                <form class="form-vertical" role="form" method="post" action="{{ route('profile.edit-profile', $user->username)  }}">

                    {{ csrf_field() }}

                    <div class="row">

                        <div class="col-lg-12 padding">
                            <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                <label for="first_name" class="control-label">Нэр</label>
                                <input type="text" name="first_name" class="form-control" id="first_name"
                                       value="{{  Request::old('first_name') ? : $user->first_name }}" placeholder="Таны нэр...">
                                @if($errors->has('first_name'))
                                    <span class="help-block">{{ $errors->first('first_name') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-12 padding">
                            <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                <label for="last_name" class="control-label">Овог</label>
                                <input type="text" name="last_name" class="form-control" id="last_name"
                                       value="{{  Request::old('last_name') ? : $user->last_name }}" placeholder="Таны овог...">
                                @if($errors->has('last_name'))
                                    <span class="help-block">{{ $errors->first('last_name') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-12 padding">
                            <div class="form-group">
                                <label for="country">Улс:</label>
                                <select id="country" name="country" class="form-control">
                                    @foreach(App\Http\Utilities\Country::all() as $country)
                                        <option value="{{ $country }}" {{ $user->country == $country ? "selected" : "" }} >{{ $country }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-12 padding">
                            <div class="form-group">
                                <label for="gender">Хүйс:</label>
                                <select id="gender" name="gender" class="form-control">
                                    @foreach(App\Http\Utilities\Gender::all() as $gender)
                                        <option value="{{ $gender }}" {{ $user->gender == $gender ? "selected" : "" }} >{{ $gender }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-12 padding">
                            <div class="form-group{{ $errors->has('age') ? ' has-error' : '' }}">
                                <label for="age" class="control-label">Нас</label>
                                <input type="text" name="age" class="form-control" id="age"
                                       value="{{  Request::old('age') ? : $user->age }}" placeholder="Таны нас...">
                                @if($errors->has('age'))
                                    <span class="help-block">{{ $errors->first('age') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-12 padding">
                            <div class="form-group{{ $errors->has('summary') ? ' has-error' : '' }}">
                                <label for="summary">Өөрийнхөө тухай:</label>
                                <textarea class="form-control" name="summary" id="summary" rows="10" placeholder="Таны тухай...">{{ Request::old('summary') ? : $user->summary }}</textarea>
                                @if($errors->has('summary'))
                                    <span class="help-block">{{ $errors->first('summary') }}</span>
                                @endif
                            </div>
                        </div>


                    </div>

                    <hr>

                        <div class="form-group">
                            <button class="ui inverted green button">Шинэчлэх</button>
                        </div>

                </form>

            </div>  <!-- Close col-md-10 -->

            <div class="col-md-2"></div>

        </div>  <!-- Close col-md-12 -->

    </div>  <!-- Close Container -->

@endsection