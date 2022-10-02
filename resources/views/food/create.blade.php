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
    <style>
        .tieude{
            font-size: 40px;
          
        }
    </style>
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
        <h1 class="tieude">Thêm Sản Phẩm</h1>
        <br>
        <div class="form-groupp">
            <form action="{{ route('foods.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <label for="">Tên Sản Phẩm:</label>
                <input type="text" name="name" id="" class="form-control">
                <br/>   
                 <div class="form-group">
                    <label for="">Loại Sản Phẩm :</label>
                    <select class="custom-select" name="category_id" id="">
                        <option selected>Chọn loại sản phẩm</option>
                        @foreach($categorys as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                       @endforeach
                    </select>
                 </div>
                 <label for="">Giá :</label>
                <input type="text" name="price" id="" class="form-control">
                <br/>   
                <label for="">Giá Khuyến Mãi:</label>
                <input type="text" name="sale_price" id="" class="form-control">
                <br/>   
                <label for="">Xuất Sử :</label>
                <input type="text" name="origin" id="" class="form-control">
                <br/>   
                <label for="">Tiêu Chuẩn :</label>
                <input type="text" name="standard" id="" class="form-control">
                <br/>   
 

                <input type="file" name="image" id="image" accept="image/*">
                <br>
                <label for="">Mô Tả</label>
                {{-- <textarea name="description" id="description" cols="30" rows="50"></textarea> --}}
                <input type="text" name="description" id="" class="form-control">
                <br/>   
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