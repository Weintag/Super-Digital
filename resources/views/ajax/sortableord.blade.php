@foreach ($orders as $order)
<tr>

    <div class="main-containerad">
       
        <th class="titlead" width="5%">
            <a href="{{route('render-adminorderproducts', $order->id)}}">
            {{ $order->id }}
            </a>
        </th>
      
        <div class="descriptionad">
            <th class="namead" width="10%">
                {{ $order->user->name }}
            </th>
            <th class="namead" width="5%">
                {{ $order->pay }}
            </th>
            <th class="namead" width="15%">
                {{ $order->email }}
            </th>
            <th class="namead" width="10%">
                {{ $order->status }}
            </th>
            <th class="namead" width="10%">
                {{ $order->created_at }}
            </th>
            <th width="5%">
                <div class="orline">
                    <form action="{{route('deleteord', $order->id)}}" method="post">
                        @csrf
                        <button type="submit" class="act"><img loading="lazy"
                                src="{{ asset('storage/img//admin//game-icons_trash-can.svg') }}"
                                class="image-3ad" /></button>
                    </form>
                </div>
            </th>

        </div>
    </div>
</tr>
@endforeach
