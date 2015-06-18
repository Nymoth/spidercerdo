<div class="container">
    
    <!--table class="table" id="results">
        <thead>
            <th>Anchor</th>
            <th>Status</th>
        </thead>
        <tbody>
        </tbody>
    </table-->
    
</div>

<script>

    var urls = [
    <?php
        foreach($anchors as $anchor) {
            echo "'" . $anchor . "',\n";
        }
    ?>
    null];
    
    function url_info() {
        if (urls.length > 1) {
            url = urls.shift();
            $.get('/crawler/get_url_status/', {url: url}, function(data) {
               console.log(data);
               url_info();
            });
        }
    }
    
    $(document).ready(function() {
        url_info();
    });
</script>