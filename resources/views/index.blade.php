

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>target-div</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<!-- 1. Define some markup -->
<div class="zxk">1231231sadasd</div>
<button class="btn" data-clipboard-action="copy" data-clipboard-target=".zxk">Copy</button>

<!-- 2. Include library -->
<script src="{{ asset('js/clipboard.min.js') }}"></script>

<!-- 3. Instantiate clipboard -->
<script>
    var clipboard = new Clipboard('.btn');

    clipboard.on('success', function(e) {
        console.log(e);
    });

    clipboard.on('error', function(e) {
        console.log(e);
    });
</script>
</body>
</html>
