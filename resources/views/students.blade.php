<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">




@if (session('success'))
<div class="alert alert-success">
  {!! session('success') !!}
</div>
@endif
@if($errors->any())
<div class="alert alert-warning alert-dismissible fade show" role="alert">

    {!! implode('', $errors->all('<div>:message</div>')) !!}

  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif


<!-- Button trigger modal -->
<button type="button" class="btn btn-primary mt-4 ml-5" data-toggle="modal" data-target="#exampleModal">
  Add Students
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Student</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/create" method="Post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="exampleInputEmail1">Student Name</label>
            <input type="text" class="form-control" name="name">
          </div>
          @if ($errors->has('name'))
          <span class="text-danger">{{ $errors->first('name') }}</span>
          @endif

          <div class="form-group">
            <label for="exampleInputEmail1">Roll No</label>
            <input type="text" class="form-control" name="roll">
          </div>
          @if ($errors->has('rollno'))
          <span class="text-danger">{{ $errors->first('rollno') }}</span>
          @endif

          <div class="form-group">
            <label for="exampleInputEmail1">Class</label>
           
            <select name="class" class="form-control" id="">
            <option value="">Select Class</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
            </select>
          </div>
          @if ($errors->has('class'))
          <span class="text-danger">{{ $errors->first('class') }}</span>
          @endif

          <div class="row">
            <div class="col">
              <div class="form-group ">
                <label for="exampleInputEmail1">Maths Marks</label>
                <input type="number" class="form-control" max="100" name="math">
              </div>
            </div>


            <div class="col">
              <div class="form-group">
                <label for="exampleInputEmail1">English Marks</label>
                <input type="number" class="form-control" max="100" name="eng">
              </div>
            </div>


          </div>

          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="exampleInputEmail1">Science Marks</label>
                <input type="number" class="form-control" max="100" name="science">
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="exampleInputEmail1">Hindi Marks</label>
                <input type="number" class="form-control" max="100" name="hindi">
              </div>
            </div>
          </div>


          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="exampleInputEmail1">Urdu Marks</label>
                <input type="number" class="form-control" max="100" name="urdu">
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label for="exampleInputEmail1">Student Image</label>
                <input type="file" class="form-control" name="upload_file">
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- //table -->
<div class="container">
  <table id="example" class="display datatable" style="width:100%">
    <thead>
      <tr>
        <th>Name</th>
        <th>Roll No</th>
        <th>Class</th>
        <th>Maths</th>
        <th>English</th>
        <th>Science</th>
        <th>Hindi</th>
        <th>Urdu</th>

      </tr>
    </thead>
    <tbody>
   
    </tbody>
    <tfoot>
      <tr>
        <th>Name</th>
        <th>Roll No</th>
        <th>Class</th>
        <th>Maths</th>
        <th>English</th>
        <th>Science</th>
        <th>Hindi</th>
        <th>Urdu</th>
       
      </tr>
    </tfoot>
  </table>
</div>


<script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>




<script type="text/javascript">
       $(document).ready(function() {
            $('.datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('ajaxstudents') }}",
                columns: [
                    { "data": "name" },
                    { "data": "rollno" },
                    { "data": "class" },
                    { "data": "maths" },
                    { "data": "end" },
                    { "data": "science" },
                    { "data": "hindi" },
                    { "data": "urdu" },
                ],
            });
        });
    </script>