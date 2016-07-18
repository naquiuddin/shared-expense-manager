<!DOCTYPE html>
<html lang="en">
<head>
<title>Sample Code</title>
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine&amp;v1" />
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz" />
<link rel="stylesheet" type="text/css" href="/style/style.css" />
<script src="http://code.jquery.com/jquery-latest.js"></script>
</head>
<body>
<div id="main">
<div id="header">
      <div id="logo">
        <h1>
					<a href="/index.php">Shared Expense
						Manager</a>
				</h1>
      </div>
</div>
<div id="site_content">
<div id="content">
<h1>Shared Expense Manager</h1>
<p>I made an application but its incomplete. Here is the core part of the application.</p>
<p>
Shared Expense manager manages shared expenses between 2 or more friends.
For example four friends went to a restaurant. The bill was 400. Ravi and
Priya have some money to pay the bill. where as Arjun and Divya said they will pay later.
Ravi Paid 250 and Priya paid 150. If each person own Rs.100. This app will automatically check
who is how much due to whom. It will show Arjun is Rs.100 due to Ravi and
Divya is Rs.50 due to Ravi and Priya.</p>
<p>
Please try entering some values below.</p>

<div id="result"></div>
<div id="newbill" class="form_settings">
<h2>New Bill</h2><br />

<form action="/newbill.php" method="post" id="newbillfrm">
<p><label>Bill Description</label><input type="text" name="billdesc"/></p>
<h3>Payers :</h3><br />
<p><label>Ravi: </label><input type="hidden" name="name0" value="Ravi"/><input type="text" name="p0"/></p>
<p><label>Priya: </label><input type="hidden" name="name1" value="Priya"/><input type="text" name="p1"/></p>
<p><label>Arjun: </label><input type="hidden" name="name2" value="Arjun"/><input type="text" name="p2"/></p>
<p><label>Divya:</label><input type="hidden" name="name3" value="Divya"/><input type="text" name="p3"/></p>
<h3>Sharers</h3>
<p><label>Ravi:</label><input type="text" name="s0"/></p>
<p><label>Priya:</label><input type="text" name="s1"/></p>
<p><label>Arjun:</label><input type="text" name="s2"/></p>
<p><label>Divya:</label><input type="text" name="s3"/></p>
<p style="padding-top: 15px"><span>&nbsp;</span><input class="submit" type="submit" name="submit"/></p>
</form>

					<script type="text/javascript">
$("#newbillfrm").submit(function(event) {
/* stop form from submitting normally */
event.preventDefault();

/* get some values from elements on the page: */
var $form = $(this),
bd = $form.find('input[name="billdesc"]' ).val(),
pa = $form.find('input[name="p0"]' ).val(),
pb=$form.find('input[name="p1"]').val(),
pc=$form.find('input[name="p2"]').val(),
pd=$form.find('input[name="p3"]').val(),
sa=$form.find('input[name="s0"]').val(),
sb=$form.find('input[name="s1"]').val(),
sc=$form.find('input[name="s2"]').val(),
sd=$form.find('input[name="s3"]').val(),
nama=$form.find('input[name="name0"]').val(),
namb=$form.find('input[name="name1"]').val(),
namc=$form.find('input[name="name2"]').val(),
namd=$form.find('input[name="name3"]').val(),
sub=$form.find('input[name="submit"]').val(),
url = $form.attr('action' );
var p=parseInt(pa)+parseInt(pb)+parseInt(pc)+parseInt(pd);
var s=parseInt(sa)+parseInt(sb)+parseInt(sc)+parseInt(sd);
if(p!=s)
{
	alert("Sum of payers amount should be equal to sum of sharers amount");
}
else
{
/* Send the data using post and put the results in a div */
$.post( url, { name0: nama, name1: namb, name2: namc, name3: namd, p0: pa, p1: pb, p2: pc, p3: pd, s0 : sa, s1 : sb, s2 : sc, s3 : sd, billdesc : bd, submit : sub},

function( data ) {
$('#newbill').hide();
$("#result" ).empty().append(data);
$("#result").append('<br/><a href="/index.php" onclick="func()">Create New bill again</a>');
}
)
}
});
</script></div></div>
</div>
</div>
</body>
</html>
