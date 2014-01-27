@extends('layouts.scaffold')
@section('main')
<br><br><br>
{{ link_to('/admin/rankPitches', 'Rank All Pitches', $attributes = array(), $secure = null) }}<br>
{{ link_to('/admin/createWinners', 'Create Winners From Latest Round', $attributes = array(), $secure = null) }}<br>
{{ link_to('/admin/investorInteractions', 'Check out investor interactions', $attributes = array(), $secure = null) }}


@stop
