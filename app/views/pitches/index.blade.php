@extends('layouts.scaffold')
@section('main')

@if (isset($message))
    <div class="flash alert">
        <strong>{{ $message }}</strong>
    </div>
@endif


<p>{{link_to_route('pitches.create', 'Add new pitch') }}</p>

@if (!empty($pitches))
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Company name</th>
            <th>YouTube video ID</th>
            <th>Investment Size</th>
            <th>Public</th>
            <th>Pay now</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($pitches as $pitch)
        <?php 
        //redefining it so we can use the pitch functions
        $pitch = Pitch::find($pitch->id); 
        ?>
        <tr>
            <td>{{ $pitch->company_name }}</td>
            <td>{{ link_to($pitch->completeVideoString(),$pitch->video_url,array('target' => '_blank')) }}</td>
            <td>{{ $pitch->investment_size }} USD</td>
            <td><?php if($pitch->allow_public) 
                        { echo 'Yes'; }
                    else
                        { echo 'No'; } ?></td>
            
            <?php if ($pitch->isPayedThisRound()): ?>
                <td colspan="3">
                <b>Paid and will reviewed</b>
                </td>
            <?php elseif ($pitch->hasBeenPreviouslySuccessfullyPaid()): ?>
                <td colspan="3">
                <b>Pitch has been entered before, enter it again!</b>
                </td>
            <?php elseif (!(Settings::all()->last()->acceptPayments())): ?>
                <td colspan="3">
                    <?php if ($pitch->paymentFailedThisRound()) { ?>
                    The payment process did not complete successfully. <br>Please try again. <br>
                    <?php } ?>
                <b>Competition is full, check back next week!</b>
                </td>
            <?php else: ?>
<!--                 <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                <input type="hidden" name="cmd" value="_s-xclick">
                <input type="hidden" name="hosted_button_id" value="HHN6CP7V5CEBG">
                <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                <input type="hidden" name="custom" value="{{$pitch->id}}">
            </form> --> 
                <td>
                    <?php if ($pitch->paymentFailedThisRound()): ?>
                    The payment process did not complete successfully. <br>Please try again. <br>
                    <?php endif ?>
                    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                        <input type="hidden" name="cmd" value="_s-xclick">
                        <input type="hidden" name="hosted_button_id" value="GXGJX8NV63FVN">
                        <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_paynow_SM.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                        <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                        <input type="hidden" name="custom" value="{{$pitch->id}}">                    </form>


<!--  sandbox       <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
                        <input type="hidden" name="cmd" value="_s-xclick">
                        <input type="hidden" name="hosted_button_id" value="2QZ3PG5H64HMQ">
                        <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynow_SM.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                        <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
                        <input type="hidden" name="custom" value="{{$pitch->id}}">
                    </form> -->
                </td>
                <td>{{ link_to_route('pitches.edit', 'Edit', array($pitch->id), array('class' => 'btn btn-info')) }}</td>                
                <td>
                    {{ Form::open(array('method' => 'DELETE', 'route' => array('pitches.destroy', $pitch->id))) }}
                    {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                    {{ Form::close() }}
                </td>

            <?php endif ?>
        </tr>
        @endforeach
    </tbody>
</table>
@else
There are no pitches
@endif

@stop