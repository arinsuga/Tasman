<table id="filter" style="width: 100%;" class="table table-hover-pointer table-head-fixed text-nowrap">
    <thead>
        <tr>
            <th style="width: 5%;"></th>
            <th style="width: 10%;">Mulai</th>
            <th style="width: 10%;">Selesai</th>
            <th style="width: 75%;">Deskripsi</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($viewModel->data as $item)
            <tr onclick="window.location.assign('{{ route('maintenance.show', ['maintenance' => $item->id]) }}');">
                <td>
                    <div class="image-table-cell">
                        <img src="{{ Arins\Facades\Filex::image($item->image) }}" alt="{{ $item->name }}">
                    </div>
                </td>
                <td>
                    <div class="text-center">{{ \Arins\Facades\Formater::datetime($item->startdt) }}</div>
                </td>
                <td>
                    <div class="text-center">{{ \Arins\Facades\Formater::datetime($item->enddt) }}</div>
                </td>
                <td>
                    <div class="truncate-multiline">{!! nl2br(e($item->description)) !!}</div>
                </td>
            </tr>
        @endforeach

    </tbody>
</table>
