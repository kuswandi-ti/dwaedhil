<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">        
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">

<meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="icon" sizes="16x16" href="{{ asset('assets/edhil/images/favicon.ico') }}">

<link rel="stylesheet" href="{{ asset('assets/css/icons/font-awesome/css/fontawesome-all.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/icons/simple-line-icons/css/simple-line-icons.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/icons/weather-icons/css/weather-icons.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/icons/linea-icons/linea.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/icons/themify-icons/themify-icons.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/icons/flag-icon-css/flag-icon.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/icons/material-design-iconic-font/css/materialdesignicons.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/spinners.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">

<link rel="stylesheet" href="{{ asset('css/mix-styles.css') }}">

<!-- https://php4note.blogspot.com/2018/12/cara-mengatasi-issue-jquery-select2.html -->
<style>
	.select2-container{
    	z-index: 100000;
    }
    
    .clockpicker-popover {
        z-index: 999999;
    }

	/* /* https://jsfiddle.net/ujdbcy3d/36/ */ */
	.disabled-select {
        background-color: #d5d5d5;
        opacity: 0.5;
        border-radius: 3px;
        cursor: not-allowed;
        position: absolute;
        top: 0;
        bottom: 0;
        right: 0;
        left: 0;
    }
    select[readonly].select2-hidden-accessible + .select2-container {
        pointer-events: none;
        touch-action: none;
    }
    select[readonly].select2-hidden-accessible + .select2-container .select2-selection {
        background: #eee;
        box-shadow: none;
    }
    select[readonly].select2-hidden-accessible + .select2-container .select2-selection__arrow,
    select[readonly].select2-hidden-accessible + .select2-container .select2-selection__clear {
        display: none;
    }
</style>