<!doctype html>
<html lang="en">
  <head>
    <title>Thêm San Pham Moi</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <body>
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="form-groupp">
            <form action="{{route('cars.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <h1>Thêm mới xe</h1>
                <label for="">Description</label>
                {{-- <textarea name="description" id="description" cols="30" rows="10"></textarea> --}}
                <input type="text" name="description" id="" class="form-control">
                <br/>   
                <label for="">Model:</label>
                <input type="text" name="model" id="" class="form-control">
                <br/>   

                <label for="">Produced_on:</label>
                <input type="date" name="produced_on" id="" class="form-control">
                <br/>   

                <label for="">Image:</label>
                <img id="image" src="" alt="" name="image" width="200">
                <input type="file" class="form-control-file" id="" placeholder="" name="image-file" onchange="changeImage(event)"s>
                <script type="text/javascript">
                    const changeImage = (e) =>{
                        const img = document.getElementById('image');
                        const file = e.target.files[0]
                        img.src = URL.createObjectURL(file);
                    }
                </script>
                <br/>   

                <label for="">ManuFactory</label>
                @if(isset($mfs))
                <select name="mf_id" id="" class="form-control">
                    @foreach($mfs as $mf)
                    <option value="{{ $mf->id }}">{{ $mf->mf_name }}</option>
                    @endforeach
                </select>
                @endif
                <input type="submit" class="btn btn-primary" value="Thêm mới">
            </form>
        </div>
    </div>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>