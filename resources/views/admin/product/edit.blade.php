@extends('admin.layout.master')


@section('content')
<div>
    <a href="{{route('product.index')}}" class="btn btn-lg btn-dark">All</a>
</div>
<form action="{{route('product.update',$product->id)}}" enctype="multipart/form-data" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        
        <div class="col-8">
            <div class="card p-3">
                <div class="form-group">
                    <label for="name">Enter Product Name</label>
                    <input type="text" name="name" class="form-control" value="{{$product->name}}">
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image" class="form-control">
                    <img src="{{asset('/images/'.$product->image)}}" width="50" class="img-thumbnail" alt="">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control">{{$product->description}} </textarea>
                </div>
            <h3 class="text-primary">Pricing</h3>
            {{-- <div class="form-group">
                <label for="total_quantity">Total Quantity</label>
                <input type="number" name="total_quantity" value="{{$product->total_quantity}}" class="form-control">
            </div> --}}
            <div class="form-group">
                <label for="sell_price">Sell Price</label>
                <input type="number" name="sell_price" value="{{$product->sell_price}}" class="form-control">
            </div>
            {{-- <div class="form-group">
                <label for="buy_price">Buy Price</label>
                <input type="number" name="buy_price" class="form-control" value="{{$product->buy_price}}">
            </div> --}}
            
            {{-- <div class="form-group">
                <label for="text_tan">Transaction Description</label>
                <textarea name="tran_description" class="form-control"></textarea>
            </div> --}}
            
            </div>
            
        </div>

        <div class="col-4">
            <div class="card p-3">
                <div class="form-group">
                    <label for=""">Choose Supplier</label>
                    <select name="supplier_id" id="supplier" class="form-control" >
                        @foreach ($supplier as $s)
                        <option value="{{$s->id}}">{{$s->name}}</option>
                        @endforeach 
                    </select>
                </div>

                {{-- Category --}}
                <div class="form-group">
                    <label for=""">Choose Category</label>
                    <select name="category_id" id="category" class="form-control" >
                        @foreach ($category as $c)
                        <option value="{{$c->id}}"
                            @if ($c->id == $product->category_id)
                                selected 
                            @endif
                            >{{$c->name}}</option>
                        @endforeach 
                    </select>
                </div>

                {{-- Brand --}}

                <div class="form-group">
                    <label for=""">Choose Brand</label>
                    <select name="brand_id" id="brand" class="form-control" >
                        @foreach ($brand as $b)
                        <option value="{{$b->id}}"
                            @if ($b->id == $product->brand_id)
                                selected
                            @endif
                            >{{$b->name}}</option>
                        @endforeach 
                    </select>
                </div>

                {{-- Color --}}

                <div class="form-group">
                    <label for=""">Choose Color</label>
                    <select name="color_id[]" id="color" class="form-control" multiple >
                        @foreach ($color as $c)
                        <option value="{{$c->id}}"
                            @foreach ($product->color as $sc)
                                @if ($sc->id == $c->id)
                                    selected
                                @endif
                            @endforeach
                            >{{$c->name}}</option>
                        @endforeach 
                    </select>
                </div>
                <input type="submit" value="Update" class="btn btn-primary"> 
            </div>
        </div>
    </div>
</form>
@endsection


<script>
    // $(function(){
    //     $('#supplier').select2();
    // })

    $(function() {
    $('#supplier').select2();
    $('#brand').select2();
    $('#color').select2();
    $('#category').select2();
    $('#description').summernote();
});

$('#summernote').summernote({
        placeholder: 'Hello Bootstrap 4',
        tabsize: 2,
        height: 100
      });
</script>

