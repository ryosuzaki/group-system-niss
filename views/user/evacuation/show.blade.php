@php
//$info=$base->info()->info;
$evacuation=GroupSystem\Niss\Models\Evacuation::findByUserId($user->id);
@endphp

<p class="h4">救助状況</p>
<div class="table-responsive">
	<table class="table text-nowrap"> 
		<tr><td style="width: 30%">救助状況</td><td style="width: 70%">{{$evacuation->rescue}}</td></tr>			
		<tr><td>救助者</td><td>{{optional($evacuation->rescuer())}}</td></tr>
	</table>
</div>

<p class="h4">避難状況</p>
<div class="table-responsive">
	<table class="table text-nowrap"> 
        <tr><td style="width: 30%">回答日時</td><td style="width: 70%">{{$evacuation->update_at}}</td></tr>
		<tr><td>避難状況</td><td>{{$evacuation->evacuation}}</td></tr>
        <!--<tr><td>位置情報</td><td>{{$info["location"]["latitude"]}} {{$info["location"]["longitude"]}}</td></tr>-->
		<tr><td>コメント</td><td>{{$evacuation->comment}}</td></tr>
	</table>
</div>




