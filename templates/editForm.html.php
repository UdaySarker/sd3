<div class="row">        
  <div class="bookForm">
    <form action="" method="POST" enctype="multipart/form-data" id="bookform">
      <input type="hidden" value="<?=$book['id'] ?? ''?>" name="book[id]">
      <label for="bookTitle">First Name</label>
      <input type="text" id="bookTitle" name="book[bookTitle]" placeholder="Book Title.." value="<?=$book['bookTitle']?? ''?>" required>
      <label for="authorName">Author Name</label>
      <select id="authorName" name="book[authorID]" required>
        <option value="">Select An Author</option>
      <?php foreach($authors as $author):?>
        <option value="<?=$author['id']?>"><?=$author['authorName']?></option>
      <?php endforeach ?>  
      </select>
      <label for="category">Category</label>
      <select name="book[categoryID]" id="category" required>
        <option value="">Select Category</option>
      <?php foreach ($categories as $category):?>
        <option value="<?=$category["id"] ?? ''?>"><?=$category['categoryName'] ?? ""?></option> 
      <?php endforeach?>
      </select>
        <label for="bookPrice">Price</label>
        <input type="number" name="book[bookPrice]">
      <div>
        <label for="bookThumb" style="display:block;">Book Image</label>
        <input type="file"  id="bookThumb" style="clear:both" name="bookThumb">
      </div>
      <div id="thumbnail"></div>
      <label for="bookDesc">Short Description</label>
      <textarea name="book[bookDesc]" id="bookDesc" cols="30" rows="10" required><?=$book['bookDesc'] ?? ''?></textarea>
      <input type="submit" value="Submit" id="submitBtn">
    </form>
  </div>
</div>

    <script>
      const bookThumb= document.querySelector('#bookThumb');
      bookThumb.addEventListener('change',function(e){
              const reader= new FileReader();
        reader.onload=function(){
            const img=document.createElement('img');
            img.style.width='150px';
            img.style.height='150px';
            img.src=reader.result;
            document.querySelector('#thumbnail').append(img);
        }
        reader.readAsDataURL(e.target.files[0]);
      });
    </script>