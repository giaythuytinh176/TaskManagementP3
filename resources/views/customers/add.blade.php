@include("customers.header")


<form action="{{ route('customers.store') }}" method="post">
    <label for="">Name</label>
    <div class="form-control"><input type="text" name="name"></div>
    <label for="">Position</label>
    <div class="form-control"><input type="text" name="Position"></div>
    <label for="">Office</label>
    <div class="form-control"><input type="text" name="Office"></div>
    <label for="">Age</label>
    <div class="form-control"><input type="text" name="Age"></div>
    <label for="">Start date</label>
    <div class="form-control"><input type="text" name="Startdate"></div>
    <label for="">Salary</label>
    <div class="form-control"><input type="text" name="Salary"></div>
    <input type="submit" value="Submit">
    @csrf
</form>


@include("customers.footer")
