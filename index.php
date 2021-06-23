<?php include 'header.php'; ?>
<body>
<header>
  <div class="container">
    <a href="#">About</a>
    <a href="midsummer">A Midsummer Night's Dream</a>
    <a href="#">Romeo and Juliet</a>
  </div>
</header>
<div class="container">
<h1>The Player's Reference</h1>
A quick note before we dive in –The Players’ Reference team and I built this because we couldn’t find an edition of Shakespeare that met our practical needs as actors, directors and dramaturgs.*

We learned that with the right tools we could not only understand the play better, but also practice the skills necessary to put on more accomplished and interesting performances. And, we could get the play on its feet faster, whether in classroom exercises or full productions.
We put these tools into this app, so you could get the kind of help you need, and at the specific time you need it.
</div>
<div class="container">
<hr/>
    <form name="contactform" method="post" action="form.php" id="sendEmail">        
    	<h3>Sign up for Updates</h3>
      <p>Learn when new plays, essays, and tools are released.</p>
    	<label for="firstName">First Name:</label>
    		<input type="text" name="firstName" id="firstName">
    	<label for="lastName">Last Name:</label>
    		<input type="text" name="lastName" id="lastName">
        <label for="email">Email:</label> 
        	<input type="text" name="email" maxlength="80" id="email">
        <label for="university">University/Company:</label> 
        	<input type="text" name="university" maxlength="80" id="university">
        <div class="submit">
            <input type="submit" value="Submit" id="submit" class="button">
        </div>
    </form>
	<footer>We will not distribute or abuse your information in any way.</footer>
</div>
</body>
</html>