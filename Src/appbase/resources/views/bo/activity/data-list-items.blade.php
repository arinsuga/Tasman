<table id="filter" style="width: 100%;" class="table table-hover-pointer table-head-fixed text-nowrap">
    <thead>
        <tr>
            <th style="width: 5%;"></th>
            <th style="width: 15%;">Jenis Pekerjaan</th>
            <th style="width: 10%;">Waktu</th>
            <th style="width: 50%;">Deskripsi</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($viewModel->data as $item)
            <tr onclick="window.location.assign('{{ route('activity.show', ['activity' => $item->id]) }}');">
                <td>
                    <div class="image-table-cell">
                        <img src="{{ Arins\Facades\Filex::image($item->image) }}" alt="{{ $item->name }}">
                    </div>
                </td>
                <td>{{ $item->activitytype->name }}</td>
                <td>
                    <div class="text-center">{{ \Arins\Facades\Formater::datetime($item->startdt) }}</div>
                    <div class="text-center">{{ \Arins\Facades\Formater::datetime($item->enddt) }}</div>
                </td>
                <td>
                    <div class="truncate-multiline">{!! nl2br(e($item->description)) !!}</div>
                </td>
            </tr>
        @endforeach

    </tbody>
</table>
