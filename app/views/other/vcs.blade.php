@extends('layouts.scaffold')
@section('main')
<?php
$xml = '<List>
    <Investor>
        <Name>Tim Draper</Name>
        <Company>DFJ</Company>
        <PitchContent>I want to see why your company exists, what it does, and how you will make money. It is also interesting to hear market size information and team bios.</PitchContent>
        <ImagePath>/img/tim_draper.jpg</ImagePath>
        <ImageWidth>275</ImageWidth>
        <ImageHeight>275</ImageHeight>
        <Link>http://www.dfj.com/team/teamdetail.php?TimDraper-10149</Link>
    </Investor>
    <Investor>
        <Name>Santi Subotovsky</Name>
        <Company>Emergence Capital Partners</Company>
        <PitchContent>I want to see the problem you are solving, why you are doing it now and what your X-factor is.</PitchContent>
        <ImagePath>/img/santi.jpg</ImagePath>
        <ImageWidth>275</ImageWidth>
        <ImageHeight>214</ImageHeight>
        <Link>http://www.emcap.com/people/santiago-subotovsky</Link>
    </Investor>
</List>';


$xml = simplexml_load_string($xml);
$arr = array();
?>
<?php foreach($xml->Investor as $investor): ?>
<div class="narrowContainer">
    <!-- one VC -->
    <img src="{{ $investor->ImagePath }}" height="{{ $investor->ImageHeight }}" width="{{ $investor->ImageWidth }}" class="vcPic pictureBorder">
    <div class="vcInfo row">
        <a href="{{ $investor->Link }}"><h1>{{ $investor->Name }}</h1></a>
        <h3>{{ $investor->Company }}</h3>
        <br />
        <strong>In a one minute pitch </strong> {{ $investor->PitchContent }}
    </div>
</div>
<?php endforeach; ?>
@stop