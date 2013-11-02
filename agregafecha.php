<html>
<head>
<title>jQuery add / remove textbox example</title>
 
<script type="text/javascript" src="template/scripts/jquery-1.4.1.min.js"></script>
 
</head>
 
<body>
 
<h1>jQuery add / remove textbox example</h1>
 
<script type="text/javascript">
$(function() {
        var scntDiv = $('#p_scents');
        var i = $('#p_scents p').size() + 1;
        
        $('#addScnt').live('click', function() {
                $('<p><label for="p_scnts"><input type="text" id="p_scnt" size="20" name="p_scnt_' + i +'" value="" placeholder="Input Value" /></label> <input type="button" href="#" id="remScnt" value= "Remove"/></p>').appendTo(scntDiv);
                i++;
                return false;
        });
        
        $('#remScnt').live('click', function() { 
                if( i > 2 ) {
                        $(this).parents('p').remove();
                        i--;
                }
                return false;
        });
});
</script>
</head><body>
 
<input type="button" href="#" id="addScnt" value="Add"/>

<div id="p_scents">
    <p>
        <label for="p_scnts"><input type="text" id="p_scnt" size="20" name="p_scnt" value="" placeholder="Input Value" /></label>
    </p>
</div>
 
</body>
</html>