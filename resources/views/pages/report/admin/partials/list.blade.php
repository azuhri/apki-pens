@foreach ($datas as $item)
    @php
        $maxChar = 50;

        $colorStatus = 'cadetblue';
        switch ($item['status']) {
            case 'DIPROSES':
                $colorStatus = 'deepskyblue';
                break;
            case 'SELESAI':
                $colorStatus = 'green';
                break;
            default:
                $colorStatus = 'cadetblue';
                break;
        }
    @endphp
    <div onclick="selectedData(this, {{ $item['id'] }});"
        class="p-3 border mb-2 border-1 rounded-3 shadow cursor-pointer position-relative">
        <div class="d-flex mb-2">
            <div class="d-flex align-items-center">
                <img style="width: 50px" class="rounded-circle"
                    src="https://ui-avatars.com/api/?background={{ $item['user']['color_hex'] ?? 'random' }}&color=ffffff&name={{ $item['user']['name'] }}"
                    alt="">
                <div class="mx-2 d-flex flex-column">
                    <small class="font-weight-bold m-0">{{ $item['user']['name'] }}</small>
                    <small style="font-size: 12px" class="m-0">{{ $item['created_at'] }}</small>
                    <span class="text-xxs font-weight-bold text-white p-1 px-2 rounded-2 text-center position-absolute"
                    style="font-size: 12px; background-color:orange; top: 5px; right:5px">{{$item["user"]["type_user"]}}</span>
                </div>
            </div>
        </div>
        <small class="font-weight-bold">{{ strlen($item['title']) >= $maxChar ? substr($item['title'], 0, $maxChar)."..." : $item["title"]  }}</small>
        <div class="mt-3 d-flex">
            <div class="d-flex justify-content-center">
                <span class="text-xs font-weight-bold text-white p-1 px-2 rounded-2"
                    style="font-size: 12px; background-color:{{ $colorStatus }}">{{ $item['status'] }}</span>
                <span class="text-xs font-weight-bold text-white p-1 px-2 rounded-2"
                    style="font-size: 12px; background-color:cornflowerblue; margin-left: 4px">{{ $item['location']['location_name'] }}</span>
            </div>
        </div>
    </div>
@endforeach
@if (!count($datas))
    <div class="card">
        <div class="d-flex justify-content-center">
            <small class="text-muted">-- no data --</small>
        </div>

    </div>
@endif
