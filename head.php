<meta charset="utf-8">
<meta name="author" content="Fernando Pablo">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="#">

<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css" type="text/css" rel="stylesheet" />
<script src="js/jquery.min.js" type="text/javascript"></script>
<script src="bootstrap/js/bootstrap.js" type="text/javascript"></script>
<script src="js/validaciones.js" type="text/javascript"></script>


<script>
    $(document).ready(function () {
        $(function () {
            $('[rel="popover"]').popover({
                container: 'body',
                html: true,
                content: function () {
                    var clone = $($(this).data('popover-content')).clone(true).removeClass('hide');
                    return clone;
                }
            }).click(function (e) {
                e.preventDefault();
            });
        });
    });
</script>
