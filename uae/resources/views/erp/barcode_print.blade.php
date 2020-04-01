<html>
<head>
<style>
div.gallery {
    margin: 0px;
    border: 1px solid #ccc;
    float: left;
    width: 205px;
    padding: 5px;
}

div.desc {
    padding: 0px;
    text-align: center;
}
</style>
</head>
<body>
@foreach($product as $product)
<div class="gallery">
  
    <img src="data:image/png;base64,{{DNS1D::getBarcodePNG($product->PdtProductCode, 'C39E')}}" 
     style="width:200px;height:55px;">
  
  <div class="desc">{{$product->PdtProductCode}}</div>
</div>
@endforeach 


</body>
</html>
