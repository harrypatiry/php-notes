<?php
  function updateNote($noteContent) {
      file_put_contents("notes.txt", $noteContent);
    }
    function readNote() {
        return file_get_contents("notes.txt");
    }
    function updatePOST() {
        if(isset($_POST["note"]) && isset($_POST["title"])) {
            $newNote = readNote();
            $newNote = $newNote."<p style='border: 2px dotted black;'>".$_POST["title"]."</p>";
            $newNote = $newNote."<p style='border: 3px solid black;'>".$_POST["note"]."</p>";
            updateNote($newNote);
        }
    }
    updatePOST();
    ?>
    <html>
        <head>
            <title>Notes</title>
        </head>
        <body>
            <h1>Notes</h1>
            <?php
            echo("<p>".readNote()."</p>");
            ?>
        <form action="index.php" method="POST">
          <p>Title</p>
          <textarea name="title" rows="1" cols="50"></textarea><br>
          <p>Note</p>
          <textarea name="note" rows="5" cols="100"></textarea><br>
          <input type="submit"></input>
        </form>
      </body>
    </html>