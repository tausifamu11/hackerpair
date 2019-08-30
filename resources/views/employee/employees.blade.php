
@extends('dashboard')
@section('content')
    <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has('alert-' . $msg))

                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
            @endif
        @endforeach
    </div> <!-- end .flash-message -->
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Employee List</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="form-group col-md-3">
            <input type="text" name="search" id="search" class="form-control" placeholder="Search Customer Data" />
        </div>
        <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>Name</th>
                <th>Gender</th>
                <th>Email(s)</th>
                <th>Mobile</th>
                <th>Employee Id</th>
                <th>Position</th>
                <th>Salary</th>
                <th>Photo</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            {{--
               @foreach($result as $results)
            <tr>
                <td>{{$results->name}}</td>
                <td>{{$results->gender}}
                </td>
                <td>{{$results->email}}</td>
                <td> {{$results->mob}}</td>
                <td>{{$results->employee_id}}</td>
                <td>{{$results->position}}</td>
                <td>{{$results->salary}}</td>
                <td><img src="{{ URL::to('images/' . $results->image)  }}" width="60px" height="60px"></td>
                <td>
                    <button type="button" class="btn btn-info"><a href="{{action('EmployeeController@edit',$results->id)}}">Edit</a></button>
                    <form method="post" action="{{action('EmployeeController@delete',$results->id)}}">
                        {{csrf_field()}}
                        <input type="hidden" name="_method" value="delete">
                        <button type="submit" class="btn btn-danger">Delete</button>

                    </form>

                </td>
            </tr>
            @endforeach
               --}}

            </tbody>
        </table>
    </div>
    <!-- /.box-body -->
</div>

    @endsection
<script>
    $(document).ready(function () {
        fetch_user_data();
        function fetch_user_data() {
            $.ajax({
                url : "{{ route('live_search.action') }}",
                method:'GET',
                data:{query:query},
                type:'JSON',
                success:function (data) {
                    $('tbody').html(data.table_data);
                }
            })
        }
        $(document).on('keyup', '#search', function(){
            var query = $(this).val();
            fetch_user_data(query);
        });

    });
</script>
<script type="text/javascript">
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>