<script src="common-js/jquery-3.1.1.min.js"></script>
<script src="common-js/tether.min.js"></script>
<script src="common-js/bootstrap.js"></script>
<script src="common-js/scripts.js"></script>
<script src="common-js/typeahead.bundle.js"></script>

<script>
    var states = new Array();
    <?php
    $result = $db->query("SELECT title FROM categories");
    while ($row = $result->fetchArray()) { ?>
    states.push('<?php echo $row['title']; ?>');
    <?php } ?>

    console.log(states);

    var states = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.whitespace,
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        local: states
    });

    $('#bloodhound .typeahead').typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        },
        {
            name: 'states',
            source: states
        });
</script>
