<?php
class DatabaseTable{
    private $pdo;
    private $tableName;
    private $primaryKey;
    public function __construct(PDO $pdo,string $tableName,string $primaryKey)
    {
        include __DIR__."//.//DatabaseConnection.php";
        $this->pdo=$pdo;
        $this->tableName=$tableName;
        $this->primaryKey=$primaryKey;
    }
    private function query($query,$parameters=[])
    {
        $query=$this->pdo->prepare($query);
        $query->execute($parameters);
        return $query;
    }
    private function add($fields)
    {   
        $query="INSERT INTO ".$this->tableName.' (';
        foreach($fields as $key=>$value)
        {
            $query.=' '.$key.',';
        }
        $query=rtrim($query,',');
        $query.=') VALUES (';
        foreach($fields as $key=>$value)
        {
            $query.=":".$key.",";
        }
        $query=rtrim($query,',');
        $query.=')';
       // echo $query;
        $this->query($query,$fields);
    }
    private function update($fields)
    {
        $query="UPDATE ".$this->tableName.' SET';
        foreach($fields as $key=>$value)
        {
            $query.=' '.$key.' =:'.$key.' ,';
        }
        $query=rtrim($query,',');
        $query.=' WHERE '.$this->primaryKey.'=:id';
        $this->query($query,$fields);
    }
    public function save($records)
    {   
        if(empty($records[$this->primaryKey])){
            $this->add($records);
        }else{
            $this->update($records);
        }
    }
    public function total()
    {
        $query="SELECT COUNT(*) FROM ".$this->tableName;
        $result=$this->query($query);
        $row=$result->fetch();
        return $row[0];      
    }
    public function findAll(){
        $query="SELECT * FROM ".$this->tableName;
        $result=$this->query($query);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    public function findById($id)
    {
        $query="SELECT * FROM ".$this->tableName." WHERE ". $this->primaryKey."= :value";
        $parameters=[
            ':value'=>$id,
        ];
        $result=$this->query($query,$parameters);
        $row=$result->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    public function delete($id){
        $query="DELETE FROM ".$this->tableName." WHERE ".$this->primaryKey." =:id";
        $parameters=[':id'=>$id];
        $this->query($query,$parameters);
    }

    public function findUser($username)
    {
        $query="SELECT * FROM ". $this->tableName." WHERE username =:username";
        $parameters=[
            'username'=>$username,
        ];
       return $this->query($query,$parameters)->fetch(PDO::FETCH_ASSOC);
    }

    public function orderBook()
    {
        
    }
}