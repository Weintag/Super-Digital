@foreach ($rubrics as $rubric)

          <tr>

            <div class="main-containerad">
              <th class="titlead" width="200px">{{$rubric->id}}</th>
              <th class="categad" width="300px">{{$rubric->email}}</th>
              <div class="descriptionad">
                <th class="namead" width="800px">{{$rubric->message}}</th>
               
                <th>
                  <div class="orline"> 
                    <form action="{{route('deleterub', $rubric->id)}}" method="post">
                      @csrf
                      <button type="submit" class="act"><img loading="lazy" src="{{asset('storage/img//admin//game-icons_trash-can.svg')}}" class="image-3ad" /></button>
                    </form>
                  </div>
                </th>

              </div>
            </div>

          </tr>

        @endforeach