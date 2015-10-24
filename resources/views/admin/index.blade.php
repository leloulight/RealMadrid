@extends('admin')

@section('admin_content')
<div class="col-md-12">
	<h1 class="text-center">Vartotojų statistika</h1>
        <div id="chartdiv" style="width: 100%; height: 400px;"></div>
        <h3 class="text-center">Iš viso registruotų vartotojų - 1250</h3>
</div>
<div class="col-md-12">
	<h1 class="text-center">Naujienų statistika</h1>
        <div id="chartdiv2" style="width: 100%; height: 400px;"></div>
        <div id="chartdiv3" style="width: 100%; height: 400px;"></div>
        <h3 class="text-center">Iš viso sukurta įrašų - 1250</h3>
</div>
@endsection