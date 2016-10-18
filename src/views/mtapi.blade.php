@extends('MapTechnicaAPI::mtapiLayout')

@section('title', 'MapTechnica API Laravel Package Documentation')

@section('content')

        
<h1>MapTechnica API</h1>

@if(!isset($_tested) || $_tested!==true)

    <p>Thank you for installing the MapTechnica API Laravel package. Here are some resources you may find useful:</p>
    
    
    <div class="row">
        
        <div class="col-xs-12 col-sm-4">
            <h2>Check Installation</h2>
            <p>Check your installation settings to ensure you are ready to use the API:</p>
            <div>
                <a class="btn btn-default" href="{{ route('__mtapi-check-installation') }}" role="button">Check Installation &raquo;</a>
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-4">
            <h2>API Documentation</h2>
            <p>Play with the API and learn how to access it directly (e.g. via AJAX):</p>
            <div>
                <a class="btn btn-default" href="https://dev.maptechnica.com/apidocs/" role="button" target="_blank">API Documentation &raquo;</a>
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-4">
            <h2>MapTechnica Dev Home</h2>
            <p>Your home for all things dev:<br>&nbsp;</p>
            <div>
                <a class="btn btn-default" href="https://dev.maptechnica.com/" role="button" target="_blank">MapTechnica Developers &raquo;</a>
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-4">
            <h2>MapTechnica Forum</h2>
            <p>Ask questions and commune with your fellow pixel miners:</p>
            <div>
                <a class="btn btn-default" href="http://forum.maptechnica.com" role="button" target="_blank">MapTechnica Forum &raquo;</a>
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-4">
            <h2>API GitHub Home</h2>
            <p>Visit the GitHub repository for this package:<br>&nbsp;</p>
            <div>
                <a class="btn btn-default" href="https://github.com/maptechnica/mtapi" role="button" target="_blank">GitHub Repository Home &raquo;</a>
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-4">
            <h2>Manage API Keys</h2>
            <p>Manage your MapTechnica API Keys:<br>&nbsp;</p>
            <div>
                <a class="btn btn-default" href="https://my.maptechnica.com/my-api-keys" role="button" target="_blank">Manage API Keys &raquo;</a>
            </div>
        </div>
        
    </div><!--/row-->

    

@endif

@if(isset($_tested) && $_tested===true)
    <h2>Checking package installation...</h2>
    
    @if($_errors)
        <h3>There were errors. Your package has not been installed correctly. Please fix the following problem<?php if(count($errors)<>1) { echo 's'; } ?>:</h3>    
        @foreach($errors as $error)
        <div class="alert alert-danger">{!! $error !!}</div>
        @endforeach
    @else
        <div class="alert alert-success">Success! The MT API package is set up and ready to use!</div>
    @endif    

<div>
    <a class="btn btn-default" href="{{ route('__mtapi') }}">&laquo; Back</a>
</div>

    
@endif


@endsection