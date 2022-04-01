<table id="filter" style="width: 100%;" class="table table-hover-pointer table-head-fixed text-nowrap">
    <thead>
        <tr>
            <th>Requester</th>
            <th>Department</th>
            <th>Category</th>
            <th>Subcategory</th>
            <th>Subject</th>
            <th>Description</th>
            <th>Resolution</th>
            <th>Request Type</th>
            <th>Technician</th>
            <th>Created By</th>
            <th>Completed Time</th>
            <th>Time Elapsed</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($viewModel->data as $item)
            <tr onclick="window.location.assign('{{ route('support.show', ['support' => $item->id]) }}');">
                <td>Requester</td>
                <td>Department</td>
                <td>Category</td>
                <td>Subcategory</td>
                <td>Subject</td>
                <td>Description</td>
                <td>Resolution</td>
                <td>Request Type</td>
                <td>Technician</td>
                <td>Created By</td>
                <td>Completed Time</td>
                <td>Time Elapsed</td>
            </tr>
        @endforeach

    </tbody>
</table>
