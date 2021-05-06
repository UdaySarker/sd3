<?php

class BookController{
    private $bookTable;
    private $authorTable;
    private $categoryTable;
    public function __construct()
    {
        include __DIR__."//..//config/DatabaseConnection.php";
        include __DIR__."//..//config/DatabaseTable.php";
        $this->bookTable=new DatabaseTable($pdo,'books','id');
        $this->authorTable=new DatabaseTable($pdo,'author','id');
        $this->categoryTable=new DatabaseTable($pdo,'bookCategory','id');


    }
    public function home()
    {
        return ['template'=>'home.html.php', 'title'=>'Book Store'];
    }

    public function showList()
    {
        $result=$this->bookTable->findAll();
        $totalBooks=$this->bookTable->total();
        $books=[];
        foreach($result as $book){
            $author=$this->authorTable->findById($book['authorID']);
            $category=$this->categoryTable->findById($book['categoryID']);
            $books[]=[
                'id'            =>$book['id'],
                'bookTitle'     =>$book['bookTitle'],
                'authorName'    =>$author['authorName'],
                'categoryName'  =>$category['categoryName'],
                'bookDesc'      =>$book['bookDesc'],
                'bookPrice'     =>$book['bookPrice'],
                'bookThumb'     =>$book['bookThumb'],
            ];
        }
        return ['template'=>'list.html.php',
                'title'=>'List of Books',
                'variables'=>[
                    'books'=>$books,
                    'totalBooks'=>$totalBooks,
                ]
            ];
    }
    public function show(){
       $book=$this->bookTable->findById($_GET['bookid']);
       $author=$this->authorTable->findById($book['authorID']);
       $category=$this->categoryTable->findById($book['categoryID']);
       $book['authorName']=$author['authorName'];
       $book['categoryName']=$category['categoryName'];
        return [
            'template'  =>'show.html.php',
            'title'     =>'Books',
            'variables' =>[
                'book' =>$book,
                ]
            ];  
    }
    public function delete(){
        $this->bookTable->delete($_GET['bookid']);
        header('location: /sd3/list');
    }
    public function saveEdit(){
            $title="Add Book";
            $authors=$this->authorTable->findAll();
            $categories=$this->categoryTable->findAll();
            if(isset($_POST['book'])){
                $book=$_POST['book'];
                if(in_array(pathinfo($_FILES['bookThumb']['name'],PATHINFO_EXTENSION),['jpeg','jpg','png'])){
                    $uploadDir="assets/images/";
                    $uploadFile=$uploadDir.basename($_FILES['bookThumb']['name']);
                    move_uploaded_file($_FILES['bookThumb']['tmp_name'],$uploadFile);
                    }
                $book['bookThumb']=$uploadFile;
               // print_r($book);
                $this->bookTable->save($book);
                header('location: /sd3/list');
            }else{
                if(isset($_GET['bookid'])){
                    $book=$this->bookTable->findById($_GET['bookid']);
                    $author=$this->authorTable->findById($book['authorID']);
                    $book['authorName']=$author['authorName'];
                    $title="Update book";
                }
            }
        return ['template'  =>'editForm.html.php',
                'title'     =>$title,
                'variables'  =>[
                    'book'  =>$book ?? '',
                    'authors'=>$authors ?? '',
                    'categories'=>$categories ?? '',
                ]
            ];
    }

    public function getAuthorList()
    {
        $authors=$this->authorTable->findAll();
        return['template'   =>'authorList.html.php',
                'title'     => 'Authors',
                'variables' =>[
                    'authors'=>$authors,
                ]        
    ];
    }
    public function getCategoryList()
    {
        $categories=$this->categoryTable->findAll();
        return['template'   =>'categoryList.html.php',
                'title'     => 'Category',
                'variables' =>[
                    'categories'=>$categories,
                ]        
    ];
    }
    public function orderBook()
    {
        $book=$this->bookTable->findById($_GET['bookid']);
        $author=$this->authorTable->findById($book['authorID']);
        $book['authorName']=$author['authorName'];
        return ['template'  =>'orders.html.php',
                'title'     =>'Book Order',
                'variables' =>[
                    'book' =>$book,
                ]
            ];
    }
}