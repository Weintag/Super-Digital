@foreach ($reviews as $review)
          <tr>

            <div class="main-containerad">
              <th class="titlead" width="170px">{{$review->id}}</th>
              <th class="categad" width="250px">{{$review->user->name}}</th>
              <div class="descriptionad">
                <th class="namead" width="540px">{{$review->review}}</th>
                <th class="pricead" width="200px">{{$review->type}}</th>
                <th class="pricead" width="220px">{{$review->created_at}}</th>
                <th>
                  <div class="orline">
                    <form action="{{route('deleterev', $review->id)}}" method="post">
                      @csrf
                      <button type="submit" class="act"><img loading="lazy" src="{{asset('storage/img//admin//game-icons_trash-can.svg')}}" class="image-3ad" /></button>
                    </form>
                  </div>
                </th>

              </div>
            </div>

          </tr>

        @endforeach