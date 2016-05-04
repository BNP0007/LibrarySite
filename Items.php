<?php
    
    class Item {
        private $title;
		private $author;
        private $isbnNum;
		private $idNum;
          
        public function __construct($title, $author, $isbnNum, $idNum){
            $this->title = $title;
            $this->author = $author;
            $this->isbnNum = $isbnNum;
            $this->idNum = $idNum;
        }
        
        public function setTitle($title){
            $this->title = $title;            
        }
        
        public function getTitle(){
            return $this->title;
        }
		
		public function setAuthor($author){
            $this->author = $author;            
        }
        
        public function getAuthor(){
            return $this->author;
        }
        
        public function setISBNNum($isbnNum){
            $this->isbnNum = $isbnNum;            
        }
        
        public function getISBNNum(){
            return $this->isbnNum;
        }
		
		public function setIDNum($idNum){
            $this->idNum = $idNum;            
        }
        
        public function getIDNum(){
            return $this->idNum;
        }
	}
?>