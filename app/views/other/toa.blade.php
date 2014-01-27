@extends('layouts.scaffold')

@section('main')

<?php
$xml = '<List>
    <TOA>
        <Recipient>Pitch.XXX</Recipient>
        <Content>
            <Paragraph>
            By accessing and using this website , you accept and agree to be bound by the terms and provision of this agreement. In addition, when using this websites particular services, you shall be subject to any posted guidelines or rules applicable to such services, which may be posted and modified from time to time. All such guidelines or rules are hereby incorporated by reference into the TOS.
            </Paragraph>
            <Paragraph>
            ANY PARTICIPATION IN THIS SITE WILL CONSTITUTE ACCEPTANCE OF THIS AGREEMENT. IF YOU DO NOT AGREE TO ABIDE BY THE ABOVE, PLEASE DO NOT USE THIS SITE.
            </Paragraph>
            <Paragraph>
            Pitch.XXX might or might not be paid for the content that is being showed on this website. 
            </Paragraph>
            <Paragraph>
            Pitch.XXX tracks user information on the site for the purpose of improving our services. This could for example be, but is not limited to, how you navigate around on the page.
            </Paragraph>
            <Paragraph>
            Pitch.XXX holds no responsibilities for the videos shown or the liability they may infer to those who watch it.
            </Paragraph>
            <Paragraph>
            Pitch.XXX and its components are offered for the sole reason of connecting good entrepreneurs and their ideas to investors who are willing to invest. Pitch.XXX are not responsible or liable for the accuracy, usefulness or availability of the information transmitted or made available on the site. Even though we hope such is never the case, false information might be uploaded by the users. Act accordingly.
            </Paragraph>
            <Paragraph>
            Any information uploaded on this site might be subject to distribution within selected networks. It is within users right to forward a video to outside parties with the intent of finding a suitable investor for the presented entrepreneur.
            </Paragraph>
        </Content>
    </TOA>
    <TOA>
        <Recipient>Investors</Recipient>
        <Paragraph>
            In addition to the above mentioned terms, investors are not allowed to distribute the content on the site for other purposes than to help the company pitching attain investment or contacts.
        </Paragraph>
        <Content></Content>
    </TOA>
</List>';


$xml = simplexml_load_string($xml);
$arr = array();
?>
<div class='container'>
<h1>Terms of Agreement</h1>
@foreach($xml->TOA as $toa)

    <div class="row">
    <h3>{{ $toa->Recipient }}</h3>
    @foreach($toa->Content->Paragraph as $paragraph)
    {{ $paragraph }}
    <br><br>

    @endforeach
    </div>

@endforeach

</div> <!-- main container -->


@stop


