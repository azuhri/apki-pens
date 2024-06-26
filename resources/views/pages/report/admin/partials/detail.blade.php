<div class="card-header border-bottom border-bottom-4">
    <div class="d-flex flex-column">
        <h5>{{ $data->title }}</h5>
        <div class="d-flex flex-column">
            <div class="d-flex justify-content-start">
                <span class="font-weight-bold text-white p-1 px-2 rounded-2"
                    style="font-size: 12px; background-color:cadetblue">{{ $data->status }}</span>
                <span class="font-weight-bold text-white p-1 px-2 rounded-2"
                    style="font-size: 12px; background-color:orange; margin-left: 4px">{{ $data->user->type_user }}</span>
                <span class="font-weight-bold text-white p-1 px-2 rounded-2"
                    style="font-size: 12px; background-color: cornflowerblue; margin-left: 4px">{{ $data->location->location_name }}</span>
                @php
                    $color = 'green';
                    if ($data->category == 'BERAT') {
                        $color = 'red';
                    }
                @endphp
                <span class="font-weight-bold text-white p-1 px-2 rounded-2"
                    style="font-size: 12px; background-color: {{ $color }}; margin-left: 4px">KERUSAKAN
                    {{ $data->category }}</span>
            </div>
            @if ($data->approved_by)
                <div class="mt-2">
                    <p class="m-0">{{ $data->status == 'DIPROSES' ? 'Diproses' : 'Diselesaikan' }} oleh <span
                            class="text-primary font-weight-bold">{{ $data->approvedBy->name }} -
                            ({{ $data->approvedBy->email }})</span></p>
                </div>
            @endif
            @if ($data->estimation_date && $data->status == "DIPROSES")
                @php
                    $dateNow = new DateTime();
                    $estimationDate = new DateTime(($data->estimation_date));
                    $diffDate = date_diff($estimationDate, $dateNow);
                    if($dateNow > $estimationDate) {
                        $diffDate = "Terlambat ".($diffDate->days)." Hari";
                    } else {
                        $diffDate = ($diffDate->days+1)." Hari Lagi";
                    }
                @endphp
                <div class="mt-1">
                    <p class="m-0">Estimasi Penyelesaian: <span class="font-weight-bold">{{ date('d F Y', strtotime($data->estimation_date)) }}</span><span
                            class="text-primary font-weight-bold"> ({{$diffDate}})</span></p>
                </div>
            @endif
        </div>
    </div>
</div>
<div class="card-body">
    <div class="row position-relative">
        <div class="col-1 d-flex justify-content-end">
        </div>
        <div class="col-11">
            <img style="width: 50px; left: 25px" class="rounded-circle position-absolute"
                src="https://ui-avatars.com/api/?background={{ $data->user->color_hex ?? 'random' }}&color=ffffff&name={{ $data->user->name }}"
                alt="">
            <div class="mx-2 mt-1 d-flex flex-column">
                <small class="font-weight-bold m-0">{{ $data->user->name }}</small>
                <small style="font-size: 12px"
                    class="m-0">{{ date('d F Y H:i', strtotime($data->created_at)) }}</small>
            </div>
            <div class="my-3">
                {{ $data->description }}
            </div>
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button font-weight-bold" style="padding-left: 0" type="button"
                            data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true"
                            aria-controls="collapseOne">
                            Foto Kerusakan
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body" style="padding-left: 0">
                            <div class="d-flex">
                                @foreach ($data->docs as $doc)
                                    <a target="_blank" class="w-30" href="{{ url('/') . "/{$doc->path}" }}">
                                        <img class="w-100" src="{{ asset($doc->path) }}" alt="">
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-center my-2">
                @if ($data->status == 'BARU')
                    <div class="d-flex align-items-center w-55">
                        <label class="m-0 w-100" style="font-weight: bold">Estimasi Tanggal Penyelesaian: </label>
                        <input type="date" class="form-control" id="estimation_date">
                    </div>
                    <button onclick="updateStatus({{ $data->id }}, 'DIPROSES')" class="btn btn-primary  m-0">Proses
                        Laporan</button>
                @elseif($data->approved_by == Auth::id())
                    <a class="btn btn-info" style="margin-right: 4px"
                        href="https://wa.me/{{ str_replace('08', '62', $data->user->phonenumber) }}" target="_blank">
                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2"
                            fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                            <path
                                d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z">
                            </path>
                        </svg>
                        Chat WA</a>
                    @if ($data->status == 'DIPROSES')
                        <button onclick="updateStatus({{ $data->id }}, 'SELESAI')"
                            class="btn btn-success">Selesaikan Laporan</button>
                    @endif
                @endif
            </div>
        </div>
    </div>
</div>
