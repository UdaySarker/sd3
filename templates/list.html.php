
<div class="row bookList">
  <table>
    <thead>
      <tr>
        <th>#</th>
        <th>Book Title</th>
        <th>Book Author</th>
        <th>Book Category</th>
        <th>Book Image</th>
        <th>Price</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($books as $book):?>
      <tr class="books">
        <td><?=$book['id']?></td>
        <td><?=$book['bookTitle'] ?? ''?></td>
        <td><?=$book['authorName'] ?? ''?></td>
        <td><?=$book['categoryName'] ?? ''?></td>
        <td><img src="/sd3/<?=$book['bookThumb']?>" style="height: 80px; width: 70px;" alt=""></td>
        <td>BDT <?=$book['bookPrice'] ?? ''?></td>
        <td class="actions">
          <a href="/sd3/show?bookid=<?=$book['id']?>">Show</a>
          <?php if(isset($_SESSION['username'])):?><a href="/sd3/order?bookid=<?=$book['id']?>" class="bookOrder" onclick="confirm('Are you sure to buy?')" id="bookOrder">Buy</a><?php endif?>
          <?php if(!empty($_SESSION['username']) && $_SESSION['role']==='admin'):?>
          <a href="/sd3/update?bookid=<?=$book['id']?>">Update</a>
          <a href="/sd3/delete?bookid=<?=$book['id']?>">Delete</a>
          <?php endif?>
        </td>
      </tr>
      <?php endforeach?>
    </tbody>
  </table>
</div>