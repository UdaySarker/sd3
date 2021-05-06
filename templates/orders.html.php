<div class="row bookList">
    <table>
        <thead>
            <tr>
                <th>Sl.</th>
                <th>Book Name</th>
                <th>Author</th>
                <th>Price</th>
                <th>Quantity</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?=$book['id'] ?? ''?></td>
                <td><?=$book['bookTitle'] ?? ''?></td>
                <td><?=$book['authorName'] ?? ''?></td>
                <td><?=$book['bookPrice'] ?? ''?></td>
                <td><input type="number" value="1"></td>
            </tr>
            <tr>
                <td colspan="2">Total</td>
                <td colspan="2">200</td>
            </tr>
        </tbody>
    </table>
</div>