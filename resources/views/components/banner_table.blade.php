<table class="table table-md table-hover" id="table-1">
    <thead>
        <tr class="text-center">
            <th>
                Sorting
            </th>
            <th>
                Type
            </th>
            <th>
                Image URL
            </th>
            <th>
                Status
            </th>
            <th>
                Action
            </th>
        </tr>
    </thead>
    <tbody>
        @php
            $index = 1;
        @endphp
        @foreach ($lists as $item)
            <tr class="text-center">
                <td>
                    {{ $item->sort_value }}
                </td>
                <td>
                    {{ $item->type }}
                </td>
                <td>
                    <a href="{{ env('APP_URL').$item->image_path }}" target="_blank">
                        View
                    </a> 
                    {{-- {{ env('APP_URL').$item->image_path }} --}}
                </td>
                <td>
                    @if ($item->active == 1)
                        <span class="badge rounded-pill bg-success">Active</span>
                    @else 
                        <span class="badge rounded-pill bg-danger">Inactive</span>
                    @endif
                </td>
                <td>
                    <a href="{{route('remove_banner', $item->id)}}" class="btn btn-danger">
                        <i class="far fa-times-circle"></i>
                        Remove
                    </a>
                </td>
            </tr>
            @php
                $index++;
            @endphp
        @endforeach
        
    </tbody>
</table>