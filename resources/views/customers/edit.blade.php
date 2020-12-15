@include("customers.header")

<form action="{{ route('customers.update', ['id'=>$id]) }}" method="post">
    <label for="">Name</label>
    <div class="form-control"><input type="text" name="name" value="{{ $data['name'] }}"></div>
    <label for="">Position</label>
    <div class="form-control"><input type="text" name="Position" value="{{ $data['Position'] }}"></div>
    <label for="">Office</label>
    <div class="form-control"><input type="text" name="Office" value="{{ $data['Office'] }}"></div>
    <label for="">Age</label>
    <div class="form-control"><input type="text" name="Age" value="{{ $data['Age'] }}"></div>
    <label for="">Start date</label>
    <div class="form-control"><input type="text" name="Startdate" value="{{ $data['Start date'] }}"></div>
    <label for="">Salary</label>
    <div class="form-control"><input type="text" name="Salary" value="{{ $data['Salary'] }}"></div>
    <input type="submit" value="Submit">
    @csrf
</form>


@include("customers.footer")
