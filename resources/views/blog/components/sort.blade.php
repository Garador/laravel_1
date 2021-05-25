<div class="col-xs-12">
    <form id="mc-form" method="POST" action="{{route('auth_sort_by_handle')}}">
        @csrf
        <select name="sort_order" onchange="this.form.submit()">
            @foreach ($labels as $label)
                @foreach ($sorts as $sort)
                    @if ($sort === $order && $label['field_name'] === $field)
                        <option selected value="{{$label['field_name']}}-{{$sort}}">{{$label['field_name']}} {{$sort}}</option>
                    @else
                        <option value="{{$label['field_name']}}-{{$sort}}">{{$label['field_name']}} {{$sort}}</option>    
                    @endif
                @endforeach
            @endforeach
        </select>
    </form>
</div>