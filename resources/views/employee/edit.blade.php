@extends('dashboard')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Add Employee</div>
                    <div class="panel-body">
                        <?php $id=$result[0]->id ?>
                        <form class="form-horizontal" role="form" method="POST" action="{{ action('EmployeeController@update',$id) }}" enctype="multipart/form-data">
                            {{ csrf_field() }}


                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{$result[0]->name}}">

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                                <label for="gender" class="col-md-4 control-label">Gender</label>

                                <div class="col-md-6">
                                    <select id="gender" type="text" class="form-control" name="gender" value="">
                                        <option value="Male" @if($result[0]->gender=='Male') selected @endif>Male</option>
                                        <option value="Female" @if($result[0]->gender=='Female') selected @endif>Female</option>
                                    </select>

                                    @if ($errors->has('gender'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{$result[0]->email}}">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('employee_id') ? ' has-error' : '' }}">
                                <label for="employee_id" class="col-md-4 control-label">Employee_id</label>

                                <div class="col-md-6">
                                    <input id="employee_id" type="text" class="form-control" name="employee_id" value="{{$result[0]->employee_id}}">

                                    @if ($errors->has('employee_id'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('employee_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('mob') ? ' has-error' : '' }}">
                                <label for="mob" class="col-md-4 control-label">Mobile</label>

                                <div class="col-md-6">
                                    <input id="mob" type="number" class="form-control" name="mob" value="{{$result[0]->mob}}">

                                    @if ($errors->has('mob'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('mob') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('position') ? ' has-error' : '' }}">
                                <label for="position" class="col-md-4 control-label">Position</label>

                                <div class="col-md-6">
                                    <input id="position" type="text" class="form-control" name="position" value="{{$result[0]->position}}">

                                    @if ($errors->has('position'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('position') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('salary') ? ' has-error' : '' }}">
                                <label for="salary" class="col-md-4 control-label">Salary</label>

                                <div class="col-md-6">
                                    <input id="salary" type="number" class="form-control" name="salary" value="{{$result[0]->salary}}">

                                    @if ($errors->has('salary'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('salary') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                                <label for="image" class="col-md-4 control-label">Photo</label>

                                <div class="col-md-6">
                                    <input id="image" type="file" class="form-control" name="image">

                                    @if ($errors->has('image'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-user"></i> Update
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection