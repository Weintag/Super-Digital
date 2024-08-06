@foreach ($catalogs as $catalog)

      <tr>
        <div class="main-containerad">
          <th class="titlead" width="50px">{{ $catalog->id }}</th>
          <th class="categad" width="110px">{{ $catalog->category }}</th>
          <th width="170px"><img loading="lazy" src="{{ asset('storage/catalog/' . $catalog->image) }}" class="imagead" width="150px" height="100px" /></th>
          <div class="descriptionad">
            <th class="namead" width="140px">{{ $catalog->name }}</th>
            <th class="pricead" width="100px">{{ $catalog->price }} ₽</th>
            <th class="quantityad" width="90px">{{ $catalog->quantity }} шт.</th>
            <th class="quantityad" width="30px">{{ $catalog->sale }}</th>
            <th class="quantityad" width="110px">{{ $catalog->pricesale }}</th>
            <th class="quantityad" width="110px">{{ $catalog->type }}</th>
            <th class="quantityad" width="80px">{{ $catalog->date }}</th>
            <th class="quantityad" width="110px">{{ $catalog->publisher }}</th>
            <th class="quantityad" width="110px">{{ $catalog->developer }}</th>
            <th class="quantityad" width="110px">{{ $catalog->platforms }}</th>
            <th class="quantityad" width="130px">{{ $catalog->genre }}</th>
            <th>
              <div class="orline">
                <a href="{{route('render-update', $catalog->id)}}" method="post">
                  <img loading="lazy" src="{{asset ('storage/img//admin//material-symbols_ink-pen.svg')}}" class="image-2ad" />
                </a>
                <a href="{{route('render-sale', $catalog->id)}}" method="post">

                  @if($catalog->sale == '0')

                  <button type="submit" class="act"><img loading="lazy" src="{{asset ('storage/img//admin//foundation_burst-sale.svg')}}" class="image-3ad" /></button>
                  @endif

                  @if($catalog->sale == '1')

                  <button type="submit" class="act"><img loading="lazy" src="{{asset ('storage/img//admin//foundation_burst-sale123.svg')}}" class="image-3ad" /></button>
                  @endif
                </a>
                <form action="{{route('delete', $catalog->id)}}" method="post">
                  @csrf
                  <button type="submit" class="act"><img loading="lazy" src="{{asset('storage/img//admin//game-icons_trash-can.svg')}}" class="image-3ad" /></button>
                </form>
              </div>
            </th>

          </div>

        </div>
      </tr>

      @endforeach