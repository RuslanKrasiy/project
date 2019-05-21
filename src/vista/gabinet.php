<?php
class gabinet{
  private $id;

  private $email_user;
  private $id_cat;
  private $titulo;
  private $subtitulo;
  private $descripcion;
  private $fotos;
  private $contacto;

  private $comentarios;

  private $gabinet;

  public function __construct($id){
    $this->id=$id;
  }
  public function __get($attr){
      if(property_exists(__CLASS__, $attr)){
          return $this->$attr;
      }else{
          return NULL;
      }
  }
  public function __set($attr,$value){
      if(property_exists(__CLASS__, $attr)){
          return $this->$attr=$value;
      }else{
          return NULL;
      }
  }
  public function mainInfo(){
    $det="<div class='ui container'>";
    $det.="<div class='ui segment'>";
    $det.="<h3 class='ui top attached header'>$this->titulo</h3>";
    $det.="<h4>$this->subtitulo</h4p>";
    $det.="<h5 class='ui header'>Descripcion</h5>";
    $det.="<p>$this->descripcion</p>";


    $det.="<h5 class='ui header'>Contacto</h5>";
    $det.="<p>$this->contacto</p>";   
    $det.="</div>";
    return $det;
  }
  public function fotos($datos){
      $foto="<div class='ui container'>";
      $foto.="<h3 class='ui header'>Fotos</h3>";
      
      $foto.="<div class='slideshow-container'>";
      foreach($datos as $value){
        $foto.="<div class='mySlides fade'>";
        $foto.="<div class='numbertext'>1 / ".count($datos)."</div>";
        
        $foto.="<img src='$value'>";
        $foto.="<div class='texto'>$this->titulo</div>";
        $foto.="</div>";
      }
  
      $foto.="<a class='prev' onclick='plusSlides(-1)'>&#10094;</a>";
      $foto.="<a class='next' onclick='plusSlides(1)'>&#10095;</a>";
      $foto.="</div><br>";

      $foto.="<div style='text-align:center;width:100%;'>";

      for($i=0;$i<count($datos);$i++){
        $foto.="<span class='dot' onclick='currentSlide($i)'></span>"; 
      }
    
      $foto.="</div>";    
      $foto.="</div><br><br>";
      $foto.="<script src='public/scripts/slidegalery.js'></script>";
      return $this->fotos=$foto;
  }
  public function comentsAll($coment){
    $com="<h3 class='ui header'>Comentarios</h3>";
    $com.="<p></p>";
    $com.="<div class='ui divider'></div>";

    $com.="<div class='ui comments'>";
    foreach($coment as $value){
      $com.="<div class='comment'>";
      $com.="<a class='avatar'>";
      if($value['foto']=='user icon')
      $com.="<i class='user icon'></i>";
      else
      $com.="<img src='".$value['foto']."'>";
      $com.="</a>";
      $com.="<div class='content'>";
      $com.="<a class='author'>".$value['nombre']." ".$value['apellido']."</a>";
      $com.="<div class='metadata'>";
      $com.="<div class='date'>".$value['fecha']."</div>";
      $com.="</div>";
      $com.="<div class='text'><p>".$value['texto']."</p></div>";
      $com.="<div class='actions'>";
      $com.="<a class='reply'>Reply</a>";
      $com.="</div>";
      $com.="</div>";
      $com.="</div>";
    }
    
    $com.="<div class='ui reply form'>";
    $com.="<div class='field'>";
    $com.="<input type='hidden' name='id_anuncio' id='codAnuncio' value='$this->id'>";
    $com.="<textarea name='comentario' id='texto'></textarea>";
    $com.="</div>";
    $com.="<button class='ui primary submit labeled icon button' id='coment'>
    <i class='icon edit'></i> Escribir Comentario
  </button>";
    
    
    $com.="</div>";
    $com.="</div>";
  
  
    $com.="</div>";
    $com.="<script src='public/scripts/coment.js'></script>";
    return $this->comentarios=$com;
  }
  public function pintGabinet(){
    $this->gabinet=$this->fotos;
    $this->gabinet.=$this->mainInfo();
    $this->gabinet.=$this->comentarios;
    
    return $this->gabinet;
  }
}
  


  
?>