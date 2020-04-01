<!DOCTYPE html>
<html lang="en">
<head>
<title>{!! config('config.application_title') ? : config('constants.ITEM_NAME') !!}</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="{{asset('public/maruti/css/bootstrap.min.css')}}" />
<link rel="stylesheet" href="{{asset('public/maruti/css/bootstrap-responsive.min.css')}}" />
<link rel="stylesheet" href="{{asset('public/maruti/css/fullcalendar.css')}}" />
<link rel="stylesheet" href="{{asset('public/maruti/css/maruti-style.css')}}" />
<link rel="stylesheet" href="{{asset('public/maruti/css/maruti-media.css')}}" class="skin-color" />
<link rel="stylesheet" href="{{asset('public/maruti/css/jquery.gritter.css')}}" />

<link rel="shortcut icon" href="{{ asset('assets/img/Rent_Home-512.png') }}">

<link rel="stylesheet" href="{{asset('public/maruti/css/uniform.css')}}" />


<style type="text/css">
  #sidebar {
    width: 100%;
    background: #49cced;
    position: absolute;
    clear: both;
    top: 0px;
}
#sidebar > ul > li {
    list-style-type: none;
    float: left;
    display: block;
    margin: 0px;
    border-right: 1px solid #41bedd;
    position: relative;
    padding: 10px 7px;
    cursor: pointer;
}
body {
    margin: 0;
    font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
    font-size: 14px;
    line-height: 0px;
    color: #333;
    background-color: #fff;
}
.widget-box{
    padding-top: 0px;
    margin: 0px;
}
</style>
<style type="text/css">
  .fade .inner .item {
  opacity: 0;
  -webkit-transition-property: opacity;
  -moz-transition-property: opacity;
  -o-transition-property: opacity;
  transition-property: opacity;
}
.fade .inner .active {
  opacity: 1;
}
.fade .inner .active.left,
.fade .inner .active.right {
  left: 0;
  opacity: 0;
  z-index: 1;
}
.fade .inner .next.left,
.fade .inner .prev.right {
  opacity: 1;
}
.fade .control {
  z-index: 2;
}
.modal {
    display: none; /* Hidden by default */
   
    z-index: 1; /* Sit on top */
   
   
    overflow: auto; /* Enable scroll if needed */
   
}
</style>
</head>