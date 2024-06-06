<div class="table-responsive p-0">
    <table class="table align-items-center mb-0">
        <thead>
            <tr>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama
                </th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Email</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    No HP</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Action</th>
            </tr>
        </thead>
        <tbody>
            @if (!count($datas))
                <tr>
                    <td class="text-center" colspan="4"><small class="text-muted">-- data kosong --</small></td>
                </tr>
            @endif
            @foreach ($datas as $data)
                <tr>
                    <td class="text-center">{{ $data->name }}</td>
                    <td class="text-center">{{ $data->email }}</td>
                    <td class="text-center">{{ $data->phonenumber }}</td>
                    <td class="">
                        <div class="d-flex justify-content-center">
                            <a href="javascript:void(0);" onclick="deleteLocation({{ $data->id }})"
                                class="btn m-0 btn-xs btn-danger d-flex align-items-center justify-content-evenly">
                                <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor"
                                    stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                    class="css-i6dzq1">
                                    <polyline points="3 6 5 6 21 6"></polyline>
                                    <path
                                        d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                    </path>
                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                </svg>
                            </a>
                            <a href="javascript:void(0);" onclick="openModalUpdate(this, '{{ json_encode($data) }}')"
                                class="btn m-0 btn-xs mx-1 btn-info d-flex align-items-center justify-content-evenly">
                                <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor"
                                    stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                    class="css-i6dzq1">
                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                </svg>
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
