
@include("customers.header")

    <table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Position</th>
        <th>Office</th>
        <th>Age</th>
        <th>Start date</th>
        <th>Salary</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @isset($list)
        @foreach($list as $key => $value)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $value['name'] }}</td>
                <td>{{ $value['Position'] }}</td>
                <td>{{ $value['Office'] }}</td>
                <td>{{ $value['Age'] }}</td>
                <td>{{ $value['Start date'] }}</td>
                <td>{{ $value['Salary'] }}</td>
                <td>
                    <a href="{{ route("customers.edit", ['id'=> $key]) }}">Edit</a>
                    <a href="{{ route("customers.delete", ['id'=>$key]) }}">Delete</a>

                </td>
            </tr>
            @endforeach
    @endisset
    </tbody>
    <tfoot>
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Position</th>
        <th>Office</th>
        <th>Age</th>
        <th>Start date</th>
        <th>Salary</th>
        <th></th>
    </tr>
    </tfoot>
</table>

@include("customers.footer")
