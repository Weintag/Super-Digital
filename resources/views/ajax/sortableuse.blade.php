@foreach ($users as $user)
      @if($user->admin == '0')

      <tr>

        <div class="main-containerad">
          <th class="titlead" width="70px">{{$user->id}}</th>
          <th class="categad" width="200px">{{$user->name}}</th>
          <div class="descriptionad">
            <th class="namead" width="100px">{{$user->email}}</th>
            <th class="namead" width="220px">{{$user->email_verified_at}}</th>
            <th class="pricead" width="210px">******</th>
            <th class="pricead" width="230px">{{$user->created_at}}</th>
            <th class="pricead" width="230px">{{$user->updated_at}}</th>
            <th>
              <div class="orline">
                <form action="{{route('deleteuse', $user->id)}}" method="post">
                  @csrf
                  <button type="submit" class="act"><img loading="lazy" src="{{asset('storage/img//admin//game-icons_trash-can.svg')}}" class="image-3ad" /></button>
                </form>
              </div>
            </th>

          </div>
        </div>

      </tr>
      @endif
      @endforeach