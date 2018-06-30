<?php

class ImageLoader{

  public function __construct(){

  }


  public function saveImageFile($path, $fileImage){

    $foto = $fileImage;

      // Se a foto estiver sido selecionada
      if (!empty($foto["name"])) {

            // Largura máxima em pixels
            $largura = 2150;
            // Altura máxima em pixels
            $altura = 2180;
            // Tamanho máximo do arquivo em bytes
            $tamanho = 1000000;

            $error = array();

            // Verifica se o arquivo é uma imagem
            if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto["type"])){
               $error[1] = "Isso não é uma imagem.";
            }

            // Pega as dimensões da imagem
            $dimensoes = getimagesize($foto["tmp_name"]);

            // Verifica se a largura da imagem é maior que a largura permitida
            if($dimensoes[0] > $largura) {
              $error[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
            }

            // Verifica se a altura da imagem é maior que a altura permitida
            if($dimensoes[1] > $altura) {
              $error[3] = "Altura da imagem não deve ultrapassar ".$altura." pixels";
            }

        //$size = filesize($foto["tmp_name"]);
        //echo $size;

            // Verifica se o tamanho da imagem é maior que o tamanho permitido
            if($foto["size"] > $tamanho) {
                $error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
            }

        // Se não houver nenhum erro
              if (count($error) == 0) {

                    // Pega extensão da imagem
                    preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);

                      // Gera um nome único para a imagem
                      $nome_imagem = md5(uniqid(time())) . "." . $ext[1];

                      // Caminho de onde ficará a imagem
                      $caminho_imagem = $path . $nome_imagem;

                      // Faz o upload da imagem para seu respectivo caminho
                      $uploaded = 	move_uploaded_file($foto["tmp_name"], $caminho_imagem);

                      if ($uploaded) {
                         //echo "Image cadastrada com sucesso.";
                         return $caminho_imagem;
                      }
              }

        // Se houver mensagens de erro, exibe-as
              if (count($error) != 0) {
                foreach ($error as $erro) {
                  echo $erro . "<br />";
                }
              }
      }
      return "error";
  }

}

?>
