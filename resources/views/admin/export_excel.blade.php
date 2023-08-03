<table>
    <thead>
        <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Slug</th>
            <th>Description</th>
            <th>Details</th>
            <th>Weight</th>
            <th>Quantity</th>
            <th>Status</th>
            <th>Review Able</th>
            <th>Category</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $index => $product)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->slug }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->details }}</td>
                <td>{{ $product->weight }}</td>
                <td>{{ $product->quantity }}</td>
                <td>{{ $product->status }}</td>
                <td>{{ $product->review_able }}</td>
                <td>{{ $product->category->name }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
