@foreach ($activities as $al)
<div class="py-2">
	<p class="text-muted">{{ $al->description }}</p>
	<div class="">
		<p class="text-muted">{{ $al->created_at }}</p>
	</div>
	<hr style="margin-top:5px;">
</div>


@endforeach