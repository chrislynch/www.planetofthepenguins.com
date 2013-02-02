<h1>Bubble Dingus</h1>
<p>Enter your <strong>Bubble</strong> formatted text into the text box below and press "Bubble Text" to have your
    text converted into a comic book script by Bubble.</p>
<form action="app/bubble" method="POST" target="_blank">
<textarea name="bubbletext" rows="30" style="width:90%">
<?php if(isset($_POST['bubbletext'])){ print $_POST['bubbletext']; } ?>
</textarea>
<input type="submit" name="submit" value="Bubble Text">
</form>

<?php

if (isset($_POST['submit'])){
    // Convert the appended text into HTML using Bubble syntax
    $bubbletext = Bubble($_POST['bubbletext']);
    print "<hr><font face='Courier'>$bubbletext</font>";
}



?>
